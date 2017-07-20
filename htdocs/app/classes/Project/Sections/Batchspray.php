<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Batchspray extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'batchspray';
	protected static $_label = 'Textbox + Liste + Bild/Logo';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(),
			FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
			FieldHelper::createWYSIWYG('description', 'Beschreibung')->setRequired(),
			FieldHelper::createFile('button_url', 'Button Link'),
			FieldHelper::createText('button_text', 'Button Text'),
			FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 600, "height" => 600])->setRequired(),				
			FieldHelper::createImageCrop('logo', 'Logo', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 280, "height" => 60])->setRequired(),					
					
		];
	}
}