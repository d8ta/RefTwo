<?php
namespace Project\Ajax\Actions;

use A365\Wordpress\Ajax\Action;
use A365\Wordpress\TemplateEngine;

class Locations extends Action
{
	protected function _action() {

		$data = array();

		$nearest = \Project\Models\Location::getNearest();

		$locations = \Project\Models\Location::allPublished();
		$data["locations"] = array_map(function(\Project\Models\Location $location){ return $location->toArray();}, $locations);

		return $data["locations"];
	}

}