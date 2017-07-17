<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Intro extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'intro';
	protected static $_label = 'Text Einführungen';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			array (
				'key' => 'field_596cb27b22f43',
				'label' => 'Textausrichtung',
				'name' => 'align',
				'type' => 'radio',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'left' => 'linksbündig',
					'center' => 'zentriert',
				),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
				'return_format' => 'value',
			),
			array (
				'key' => 'field_596cb27sfaf43',
				'label' => 'Titel Schriftgröße',
				'name' => 'fontsize',
				'type' => 'radio',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'big' => 'groß',
					'medium' => 'mittel',
				),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
				'return_format' => 'value',
			),
			FieldHelper::createText('headline', 'Überschrift')->setRequired(),			
			FieldHelper::createTextarea('text', 'Beschreibung'),			
		];
	}
}