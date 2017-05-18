<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Terms extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'terms';
	protected static $_label = 'editor';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Titel')->setRequired(), 	
				FieldHelper::createWYSIWYG('left', 'Editor links')->setRequired(), 
				FieldHelper::createWYSIWYG('right', 'Editor rechts')->setRequired(), 
		];
	}
}