<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Hireing extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'hireing';
	protected static $_label = 'Offene Stellen';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Überschrift')->setRequired(),
				FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
				FieldHelper::createRepeater('jobs', 'Jobs', ["min" => 1, "max" => 12])
		        ->addSubfields([
					FieldHelper::createText('jobtitle', 'Jobtitel')->setRequired(),
					FieldHelper::createText('jobdescription', 'Jobbeschreibung')->setRequired(),
					FieldHelper::createPageLink('button_url', 'Button Link'),
					FieldHelper::createText('button_text', 'Button Text')->setRequired(),
				])
		];
	}
}