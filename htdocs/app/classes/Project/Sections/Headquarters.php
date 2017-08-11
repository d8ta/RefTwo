<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Headquarters extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'headquarters';
	protected static $_label = 'Standortliste';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('headline', 'Überschrift')->setRequired(),
			FieldHelper::createText('subline', 'Unterüberschrift')->setRequired(),
		];
	}
}
