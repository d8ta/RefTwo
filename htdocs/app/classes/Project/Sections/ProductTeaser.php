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

		];
	}
}