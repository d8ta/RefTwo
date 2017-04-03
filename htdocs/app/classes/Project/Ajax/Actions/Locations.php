<?php
namespace Project\Ajax\Actions;

use A365\Wordpress\Ajax\Action;
use A365\Wordpress\TemplateEngine;

class Locations extends Action
{
	protected function _action() {

		$data = array();

		$locations = \Project\Models\Location::allPublished();
		$data["locations"] = array_map(function(\Project\Models\Location $location){ return $location->toArray();}, $locations);

		//$type = $_GET['type'];

		/*if ($type == "html-grid") {
			return $this->_renderView('components.location.grid', $data);
		}*/

		return $data["locations"];
	}

}