<?php
namespace Project\Ajax\Actions;

use A365\Wordpress\Ajax\Action;

abstract class AbstractProject extends Action
{

	protected function _thisProject()
	{
		$project_id = $_GET["id"];

		return \Project\Models\Project::find($project_id);
	}

	protected function _getProject($project_id)
	{
		return \Project\Models\Project::find($project_id);
	}

	protected function _renderView($view, $data = [])
	{
		$templateEngine = \A365\Wordpress\TemplateEngine::getInstance();

		$data['project'] = $this->_thisProject();

		return $templateEngine->renderView($view, $data);
	}

}