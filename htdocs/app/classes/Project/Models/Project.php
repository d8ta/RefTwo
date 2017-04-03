<?php 
namespace Project\Models;

class Project extends \A365\Wordpress\Models\Post {
	protected static $order = 'DESC';
	protected static $orderby = 'meta_value';
	protected static $meta_key = 'sortdate';


	public function toArray() {

		$data = [
			'id' => $this->getId(),
			'post_title' => $this->getPostTitle(),
		];
		$data = array_merge($data, $this->getMetaData());

		foreach ($data as $key => $value) {

			if(strpos($key, '_') === 0) {
				unset($data[$key]);
			}
		}

		return $data;
	}

	public function getList($key, $label = "label") {

		$values = get_field($key, $this->getId());
		$labels = array();
		if (is_array($values)) {
			foreach($values as $value) {
				$labels[] = $value[$label];
			}
		}
		
		return implode($labels, ", ");
	}

	public function getNextProjectId() {

		$args = array(
            'posts_per_page' => -1,
            'post_type'     => 'project',
            'orderby'     => static::$orderby,
            'meta_key'     => static::$meta_key
        );
        $the_query = new \WP_Query($args);
        $projects = $the_query->get_posts();
        $project_key = -1;

        for($i = 0; $i < count($projects); $i++) {
        	if ($projects[$i]->ID == $this->getId()) {
        		$project_key = $i;
        		break;
        	}
        }
        if ($i == -1) {
        	return null;
        }

        $i++;
        if ($i >= count($projects)) {
        	$i = 0;
        }

        return $projects[$i]->ID;
	}
}