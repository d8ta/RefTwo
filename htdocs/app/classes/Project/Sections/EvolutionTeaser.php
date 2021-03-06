<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class EvolutionTeaser extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'evolution-teaser';
	protected static $_label = 'Title + Text zentriert';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Überschrift')->setRequired(),
				FieldHelper::createWysiwyg('description', 'Beschreibung')->setRequired(),
		];
	}
}

