<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class CustomersTeaser extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'customers-teaser';
	protected static $_label = 'Title/Subtitle/Text';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Überschrift')->setRequired(),
				FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
				FieldHelper::createWysiwyg('description', 'Beschreibung')->setRequired(),
		];
	}
}
