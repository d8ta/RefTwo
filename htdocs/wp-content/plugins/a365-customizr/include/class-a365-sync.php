<?php

use A365\Wordpress\Logger;

class A365Sync {

	private static $_sync_types = array("checkbox", "image", "gallery", "true_false", "radio", "color_picker", "date_picker", "date_time_picker", "time_picker", "oembed", "select", "google_map", "taxonomy");
	private static $_sync_types_post = array("post_object", "page_link", "relationship");
	private static $_sync_types_flexible = array("flexible_content");
	private static $_sync_types_repeater = array("repeater");

    public static $KEY_ID = "acf_sync_id";


	public function __construct() {
		add_action(
			'acf/save_post',
			[$this, 'syncAcf'],
			15
		);
	}


	public function syncAcf($id)
	{	
		$languages  = pll_languages_list();
		
		foreach ($languages as $lang) {
			$transId = pll_get_post($id, $lang);

			if($id == $transId || !$transId) {
				continue;
			}

			$post_fields = get_field_objects($id);
			
			$this->syncFields($post_fields, $id, $transId, $lang, false, false);
			
		}
	}



	public function syncFields($post_fields, $id, $transId, $lang, $context = false, $values = false) {

		foreach ($post_fields as $key => $post_field) {

			if (in_array($post_field["type"], A365Sync::$_sync_types)) {

				$this->syncField($post_field, $id, $transId, $lang, $context, $values);

			} else if (in_array($post_field["type"], A365Sync::$_sync_types_post)) {

				$this->syncPostObject($post_field, $id, $transId, $lang, $key);

			} else if (in_array($post_field["type"], A365Sync::$_sync_types_flexible)) {

				// FLEXIBLE CONTENT

				$this->syncFields($post_field["layouts"][0]["sub_fields"], $id, $transId, $lang, $post_field["name"], $post_field["value"]);


			} else if (in_array($post_field["type"], A365Sync::$_sync_types_repeater)) {

				// REPEATER
				$this->syncRepeater($post_field["sub_fields"], $id, $transId, $lang, $post_field["name"], $post_field["value"]);

			}

		}
	}


	public function getRepeaterEdits($post_field, $id, $transId, $context = false, $values = false) {

		$obj_trans = get_field_objects($transId);
		$values_trans = $obj_trans[$context]["value"];

		
		$edits = array();

		if (is_array($values)) {
			foreach ($values as $row => $v) {
				if (array_key_exists(A365Sync::$KEY_ID, $v)) {

					if (!strlen($v[A365Sync::$KEY_ID])) {

						$new_id = uniqid();
						update_sub_field( array($context, $row + 1, A365Sync::$KEY_ID), $new_id, $id );

						$edits[] = array("id" => $new_id); // new row

					} else {

						$found = false;
						foreach ($values_trans as $r => $v_t) {
							if ($v_t[A365Sync::$KEY_ID] == $v[A365Sync::$KEY_ID]) {
								$edits[] = array("id" => $v[A365Sync::$KEY_ID], "data" => $v_t);
								$found = true;
							}
							if ($found) {
								break;
							}
						}

						if (!$found) {
							$edits[] = array("id" => $v[A365Sync::$KEY_ID]);
						}

					}

				}

			}
		}

		if (!sizeof($edits)) {
			return false;
		}

		return $edits;
	}



	public function syncRepeater($post_field, $id, $transId, $lang, $context = false, $values = false) {

		$obj_trans = get_field_objects($transId);

		if (!array_key_exists($context, $obj_trans)) {
			return false;
		}
		
		$values_trans = $obj_trans[$context]["value"];

		$repeater_edits = $this->getRepeaterEdits($post_field, $id, $transId, $context, $values);


		if (!$repeater_edits) { // no id synchronisation
			
			$values_count = is_array($values) ? sizeof($values) : 0;

			for ($i = $values_trans_count; $i > $values_count; $i--) {
				delete_row($context, $i, $transId);
			}

			if (is_array($values)) {

				foreach($values as $row => $value) {
					$data = $values[$row][$post_field["name"]];

					if ($row >= $values_trans_count) { // row not exists
						add_row( $context, $data, $transId );
					}

					update_sub_field( array($context, $row + 1, $post_field["name"]), $data, $transId );
					
				}
			}


		} else { // with id synchronisation

			$new_rows = array();

			foreach ($repeater_edits as $r_edit) {
				if (!is_array($r_edit)) continue;
				$new_row = array();
				if (array_key_exists("data", $r_edit) && is_array($r_edit["data"])) {
					$new_row = $r_edit["data"];
				}
				$new_row['id'] = $r_edit["id"];
				$new_rows[] = $new_row;
			}
			for ($i = sizeof($values_trans); $i >= 0; $i--) {
				delete_row($context, $i, $transId);
			}
			foreach ($new_rows as $r => $new_row) {
				add_row( $context, $new_row, $transId );
			}
		}

		$this->syncFields($post_field, $id, $transId, $lang, $context, $values);

	}


	public function syncField($post_field, $id, $transId, $lang, $context = false, $values = false) {

		if ($context) { // field is in flexible content or repeater

			$obj_trans = get_field_objects($transId);
			$values_trans = $obj_trans[$context]["value"];
			$values_trans_count = is_array($values_trans) ? sizeof($values_trans) : 0;

			$values_count = is_array($values) ? sizeof($values) : 0;


			if (is_array($values)) {

				foreach($values as $row => $value) {
					$data = $values[$row][$post_field["name"]];

					update_sub_field( array($context, $row + 1, $post_field["name"]), $data, $transId );
					
				}
			}

			
		} else { // normal field
			$data = get_field($post_field["name"], $id);
			update_field($post_field["key"], $data, $transId);
		}
	}


	public function syncPostObject($post_field, $id, $transId, $lang, $key) {

		$post_obj_ids = get_field($key, $id);

		if (is_array($post_obj_ids)) {
			$transPostId = array();
			foreach($post_obj_ids as $post_obj_id) {
				$transPostId[] = pll_get_post($post_obj_id, $lang);
			}
		} else {
			$transPostId = pll_get_post($post_obj_ids, $lang);
		}
		
		$data = $transPostId ? $transPostId : $post_obj_id;

		update_field($post_field["key"], $data, $transId);
	}
}

new A365Sync();