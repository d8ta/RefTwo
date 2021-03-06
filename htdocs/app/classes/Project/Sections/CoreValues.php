<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class CoreValues extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'core-values';
	protected static $_label = 'Icons + Liste';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createRepeater('corevalues', 'Unternehmenswerte', ["min" => 3, "max" => 4]) 
				->addSubfields([
					FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 120, "height" => 120])->setRequired(),
					FieldHelper::createText('title', 'Überschrift')->setRequired(), 
					FieldHelper::createWysiwyg('description', 'Beschreibung')->setRequired(), 
					]),
		];
	}
}