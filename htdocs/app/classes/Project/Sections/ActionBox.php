<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class ActionBox extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'action-box';
	protected static $_label = 'Box (Text/Bild/Icon)';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createTrueFalse('shownews', 'News in der ersten Box einblenden'),
			FieldHelper::createRepeater('box', 'Boxes', ["min" => 3, "max" => 3])
				->addSubfields([
					FieldHelper::createImageCrop('background', 'Hintergrund', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),
					FieldHelper::createText('title', 'Überschrift')->setRequired(),
					FieldHelper::createText('description', 'Beschreibung')->setRequired(),
					FieldHelper::createText('icon', 'Icon Name')->setRequired(),
					FieldHelper::createPageLink('button_url', 'Button Link'),
					FieldHelper::createText('button_text', 'Button Text')->setRequired(),
				])
		];
	}
}
