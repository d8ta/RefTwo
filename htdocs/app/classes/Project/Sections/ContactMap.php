<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class ContactMap extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'contact-map';
	protected static $_label = 'Kontakt Maps';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('headline', 'Überschrift')->setRequired(),
		];
	}
}