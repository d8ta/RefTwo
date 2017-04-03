<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class WelcomeSlider extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'welcome-slider';
	protected static $_label = 'Welcome Slider';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createRepeater('slides', 'Slides', ["min" => 1])
				->addSubfields([
					FieldHelper::createImageCrop('background', 'Hintergrund', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 1600, "height" => 760])->setRequired(),
					FieldHelper::createText('pretitle', 'Überschrift klein'),
					FieldHelper::createText('title', 'Überschrift')->setRequired(),
					FieldHelper::createText('description', 'Beschreibung')->setRequired(),
					FieldHelper::createPageLink('button_url', 'Button Link'),
					FieldHelper::createText('button_text', 'Button Text')->setRequired(),
			])
		];
	}
}