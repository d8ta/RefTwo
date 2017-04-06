<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class ResearchTeaser extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'research-teaser';
	protected static $_label = 'Research Teaser';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
					FieldHelper::createImageCrop('background-research', 'Hintergrund Entwicklung', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 580, "height" => 580])->setRequired(),
					FieldHelper::createImageCrop('background-research1', 'Hintergrund Entwicklung 1', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),				
					FieldHelper::createImageCrop('background-research2', 'Hintergrund Entwicklung 2', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),				
					FieldHelper::createImageCrop('background-research3', 'Hintergrund Entwicklung 3', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),
					FieldHelper::createText('title', 'Überschrift')->setRequired(),
					FieldHelper::createText('description', 'Beschreibung')->setRequired(),
					FieldHelper::createPageLink('button_url', 'Button Link'),
					FieldHelper::createText('button_text', 'Button Text')->setRequired(),
		];
	}
}