<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class TechnologyTeaser extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'technology-teaser';
	protected static $_label = 'Technology Teaser';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Überschrift')->setRequired(),
				FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
				FieldHelper::createText('description', 'Beschreibung')->setRequired(),

		];
	}
}