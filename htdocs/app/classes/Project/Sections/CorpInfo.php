<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class CorpInfo extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'corp-info';
	protected static $_label = 'Textbox + 3 Bilder';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(),
			FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),  
			FieldHelper::createWYSIWYG('description', 'Beschreibung')->setRequired(),
			FieldHelper::createText('logo', 'Logo'),  
			FieldHelper::createRepeater('sectionimg', 'Sectionimg', ["min" => 3, "max" => 3]) 
				->addSubfields([
					FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),
					]),
		];
	}
}