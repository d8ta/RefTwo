<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Timeline extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'timeline';
	protected static $_label = 'Zeitleiste';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(), 
			FieldHelper::createWYSIWYG('description', 'Beschreibung')->setRequired(),
			FieldHelper::createRepeater('timeline', 'Zeitleiste', ["min" => 1, "max" => ''])
				->addSubfields([
					FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 250, "height" => 250])->setRequired(),
					FieldHelper::createText('year', 'Jahr')->setRequired(), 
					FieldHelper::createText('title', 'Überschrift')->setRequired(), 
					FieldHelper::createWYSIWYG('description', 'Beschreibung')->setRequired(),
				]),
		];
	}
}