<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Terms extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'terms';
	protected static $_label = '4  x Titel + Text';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('ceo', 'Name CEO')->setRequired(), 	
				FieldHelper::createText('president', 'Name Präsident')->setRequired(), 	
				FieldHelper::createText('companyname', 'Gmbh Name')->setRequired(), 
				FieldHelper::createWYSIWYG('companyaddress', 'Adresse/VAT/Legal')->setRequired(), 
				FieldHelper::createWYSIWYG('bankdata', 'Bankdaten')->setRequired(), 
				FieldHelper::createPageLink('button_url', 'Button Link'),
				FieldHelper::createText('button_text', 'Button Text')->setRequired(),
		];
	}
}