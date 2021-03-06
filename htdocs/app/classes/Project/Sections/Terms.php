<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Terms extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'terms';
	protected static $_label = 'Editor zweispaltig';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Titel')->setRequired(), 	
				FieldHelper::createWysiwyg('left', 'Editor links')->setRequired(), 
				FieldHelper::createWysiwyg('right', 'Editor rechts')->setRequired(), 
		];
	}
}