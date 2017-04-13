<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class ProductLinks extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'product-links';
	protected static $_label = 'Produkt Links';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createRepeater('links', 'Links', ["min" => 3, "max" => 3])
				->addSubfields([
					FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 254, "height" => 254])->setRequired(),					
					FieldHelper::createImageCrop('logo', 'Logo', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 140, "height" => 30])->setRequired(),
					FieldHelper::createText('description', 'Beschreibung')->setRequired(),
					FieldHelper::createPageLink('box_url', 'Box Link'),
			])
		];
	}
}