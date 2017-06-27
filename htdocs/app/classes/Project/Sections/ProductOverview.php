<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class ProductOverview extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'product-overview';
	protected static $_label = 'Einleitungstext und Produktbilder';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(),
			FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
			FieldHelper::createText('text', 'Beschreibung')->setRequired(),

			FieldHelper::createRepeater('products', 'Produkte', ["min" => 3, "max" => 3])
				->addSubfields([
					FieldHelper::createImage('image', 'Produktbild',["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 554, "height" => 450])->setRequired(),
					FieldHelper::createImage('logo', 'Produktlogo')->setRequired(),
					FieldHelper::createTextarea('description', 'Beschreibung')->setRequired(),
	    			FieldHelper::createPageLink('link', 'Link'),
		            FieldHelper::createText('linktext', 'Link Text'),
				]),
		];
	}
}
