<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class TechnologyTeaser extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'technology-teaser';
	protected static $_label = 'Textbox mit Bild Oben + Text/Link';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(),
			FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),
			FieldHelper::createWysiwyg('description', 'Beschreibung')->setRequired(),
			FieldHelper::createRepeater('box', 'Boxes', ["min" => 5, "max" => 5])
				->addSubfields([
					FieldHelper::createImageCrop('background', 'Hintergrund', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 280, "height" => 220])->setRequired(),
					FieldHelper::createText('title', 'Überschrift')->setRequired(),
					FieldHelper::createWysiwyg('description', 'Beschreibung')->setRequired(),
					FieldHelper::createPageLink('pagelink', 'Link zur Seite')->setRequired(),
					FieldHelper::createText('hash', 'Hash', ['prepend' => '#']),
					FieldHelper::createText('text', 'Text')->setRequired(),
			]),

		];
	}
}
