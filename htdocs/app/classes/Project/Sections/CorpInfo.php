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
			FieldHelper::createWysiwyg('description', 'Beschreibung')->setRequired(),
			FieldHelper::createImage('logo', 'Bild', ['wrapper' => array('width' => 50,)]),
			array (
				'key' => 'field_596cc87f3f536',
				'label' => 'Datei',
				'name' => 'file',
				'type' => 'file',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => 50,
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'library' => 'all',
				'min_size' => '',
				'max_size' => '',
				'mime_types' => '',
			),  
			FieldHelper::createRepeater('sectionimg', 'Sectionimg', ["min" => 3, "max" => 3]) 
				->addSubfields([
					FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),
					]),
		];
	}
}