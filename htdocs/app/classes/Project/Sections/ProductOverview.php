<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class ProductOverview extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'product-overview';
	protected static $_label = 'Bild + Logo / Text + Button';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(),
			FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
			FieldHelper::createText('text', 'Beschreibung')->setRequired(),
			FieldHelper::createPageLink('button_url', 'Button Link'),
			FieldHelper::createText('button_text', 'Button Text')->setRequired(),
			
			FieldHelper::createRepeater('products', 'Produkte', ["min" => 3, "max" => 3])
				->addSubfields([
					FieldHelper::createImage('image', 'Produktbild')->setRequired(),
					FieldHelper::createImage('logo', 'Produktlogo')->setRequired(),
					FieldHelper::createTextarea('description', 'Beschreibung')->setRequired(),
	    			FieldHelper::createPageLink('link', 'Link'),
		            FieldHelper::createText('linktext', 'Link Text'),
				]),
		];
	}
}