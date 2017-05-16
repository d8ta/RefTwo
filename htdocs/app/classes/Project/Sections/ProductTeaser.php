<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class ProductTeaser extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'product-teaser';
	protected static $_label = 'Produkt Einführung';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [

			FieldHelper::createText('title', 'Überschrift')->setRequired(),
			FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
			FieldHelper::createText('description', 'Beschreibung')->setRequired(),
			FieldHelper::createPageLink('button_url', 'Button Link'),
			FieldHelper::createText('button_text', 'Button Text')->setRequired(),
			FieldHelper::createRepeater('links', 'Links', ["min" => 3, "max" => 3])
				->addSubfields([
					FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 600, "height" => 600])->setRequired(),					
					FieldHelper::createImageCrop('logo', 'Logo', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 140, "height" => 30])->setRequired(),
					FieldHelper::createText('description', 'Beschreibung')->setRequired(),
					FieldHelper::createPageLink('box_url', 'Box Link'),
			]),

		];
	}
}