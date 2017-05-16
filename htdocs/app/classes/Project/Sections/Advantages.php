<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Advantages extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'advantages';
	protected static $_label = 'Textbox + Bild';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Überschrift')->setRequired(),
				FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
				FieldHelper::createText('description', 'Beschreibung')->setRequired(),
				FieldHelper::createImageCrop('big_image', 'Bild groß', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 620, "height" => 620])->setRequired(),
				];
	}
}