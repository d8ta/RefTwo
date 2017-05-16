<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Batchspray extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'batchspray';
	protected static $_label = 'Batchspray Information';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(),
			FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
			FieldHelper::createWYSIWYG('description', 'Beschreibung')->setRequired(),
			FieldHelper::createPageLink('button_url', 'Button Link'),
			FieldHelper::createText('button_text', 'Button Text')->setRequired(),
			FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 600, "height" => 600])->setRequired(),					
					
		];
	}
}