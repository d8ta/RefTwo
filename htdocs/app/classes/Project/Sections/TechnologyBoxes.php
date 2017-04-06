<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class TechnologyBoxes extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'technology-boxes';
	protected static $_label = 'Technology Boxes';

	/**
	 * @inheritdocIR
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createRepeater('box', 'Boxes', ["min" => 5, "max" => 5])
				->addSubfields([
					FieldHelper::createImageCrop('background', 'Hintergrund', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 1600, "height" => 760])->setRequired(),
					FieldHelper::createText('title', 'Überschrift')->setRequired(),
					FieldHelper::createText('description', 'Beschreibung')->setRequired(),
			])
		];
	}
}