<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class BatchsprayDetail extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'batchspray-detail';
	protected static $_label = 'Bild und Detailtext';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(),
			FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),	
			FieldHelper::createWysiwyg('description_left', 'Beschreibung links')->setRequired(),
			FieldHelper::createWysiwyg('description_middle', 'Beschreibung mitte')->setRequired(),
			FieldHelper::createWysiwyg('description_right', 'Beschreibung rechts')->setRequired(),
			FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),
		];
	}
}