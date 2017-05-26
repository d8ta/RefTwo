<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Sicozone extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'sicozone';
	protected static $_label = 'Title/Subtitle + Editor';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Überschrift')->setRequired(),
				FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
				FieldHelper::createWYSIWYG('description', 'Beschreibung')->setRequired(),	
		];
	}
}