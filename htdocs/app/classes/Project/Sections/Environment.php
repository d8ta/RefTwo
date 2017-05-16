<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Environment extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'environment';
	protected static $_label = 'Fullwidth Hintergrund, Textbox rechts';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createImageCrop('background', 'Hintergrund', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 1920, "height" => 800])->setRequired(),
				FieldHelper::createText('title', 'Überschrift')->setRequired(),
				FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
				FieldHelper::createWYSIWYG('description', 'Beschreibung')->setRequired(),	
		];
	}
}