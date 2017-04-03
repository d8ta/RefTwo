<?php
namespace Project\Ajax\Actions;


class Project extends AbstractProject
{
	protected function _action() {

		$view = $_GET['view'];

		return $this->_renderView('components.' . $view);
	}
}