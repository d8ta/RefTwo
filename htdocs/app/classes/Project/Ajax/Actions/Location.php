<?php
namespace Project\Ajax\Actions;

use A365\Wordpress\Ajax\Action;
use A365\Wordpress\TemplateEngine;

class Location extends Action
{
	protected function _action() {
		$data = array();
		$location_id = $_GET['id'];

		$data["location"] = \Project\Models\Location::find($location_id);
	

		$view = $_GET['view'];
		
		return TemplateEngine::getInstance()->renderView('components.' . $view, $data);
	}
}