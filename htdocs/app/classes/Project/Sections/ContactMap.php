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
			FieldHelper::createRepeater('maps', 'Map', ["min" => 1, "max" => 10])
				->addSubfields([
					// fieldgroup Google Maps
					array (
						'label' => 'Google Maps',
						'name' => 'Google Maps',
						'type' => 'google_map',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'center_lat' => '',
						'center_lng' => '',
						'zoom' => '',
						'height' => '',
					),					
					FieldHelper::createText('title', 'Überschrift')->setRequired(),
					FieldHelper::createText('address', 'Adresse')->setRequired(),
					FieldHelper::createText('phone', 'Telefon')->setRequired(),
					FieldHelper::createText('fax', 'Fax')->setRequired(),
					FieldHelper::createText('country', 'Länderauswahl')->setRequired(),
					FieldHelper::createPageLink('button_url', 'Button Link'),
					FieldHelper::createText('button_text', 'Button Text')->setRequired(),
			]),
		];
	}
}