<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class ResearchTeaser extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'research-teaser';
	protected static $_label = 'Slider: Fullwidth Hintergrund + Textbox/Bilder';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Überschrift')->setRequired(),
				FieldHelper::createText('description', 'Beschreibung')->setRequired(),
				FieldHelper::createPageLink('button_url', 'Button Link'),
                FieldHelper::createText('button_text', 'Button Text')->setRequired(),
				FieldHelper::createImageCrop('big_image', 'Forschungsbild groß', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 620, "height" => 620])->setRequired(),
				FieldHelper::createRepeater('research_img', 'Forschungsbilder', ["min" => 3, "max" => 3])
				->addSubfields([
								FieldHelper::createImageCrop('image', 'Forschungsbild klein', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired()
								]),
				];
	}
}