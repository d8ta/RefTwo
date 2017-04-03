<?php
namespace Project\Ajax\Actions;

use A365\Wordpress\Ajax\Action;
use A365\Wordpress\TemplateEngine;

class LocationNearest extends Action
{
	protected function _action() {
		$data = array();

		$location_default = \Project\Models\Location::getDefault();
		$location_nearest = \Project\Models\Location::getNearest();

		if ($location_nearest->getId() !== $location_default->getId()) {
			 $data["location"] = $location_nearest;
		}

		$render_view = "components.footer.address";
		$view = $_GET['view'];

		if (isset($view) && strlen($view) > 0) {
			if (!$data["location"]) {
				$data["location"] = $location_default;
			}
			$render_view = "components.ajax." . $view;
			if ($view == "contact-page-address") {
				$data["location"] = $this->parseForRender($data["location"]);
			}
		}
		
		return TemplateEngine::getInstance()->renderView($render_view, $data);
	}

	private function parseForRender($location) {

		if (!$location) return null;

		$location_new = $location->toArray();
		$location_new["headline"] = __('Infrastructure');

		return $location_new;
	}
}