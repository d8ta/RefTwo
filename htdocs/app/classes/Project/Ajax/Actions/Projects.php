<?php
namespace Project\Ajax\Actions;

class Projects extends AbstractProject
{
	protected function _action() {

		$data = array();

		$projects = \Project\Models\Project::allPublished();
		$data["projects"] = array_map(function(\Project\Models\Project $project){ return $project->toArray();}, $projects);

		$type = $_GET['type'];

		if ($type == "html-grid") {
			return $this->_renderView('components.project.grid', $data);
		}

		return $data["projects"];
	}

}