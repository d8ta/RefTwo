<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Process extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'process';
	protected static $_label = 'Editor + Logo/Liste';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createText('title', 'Titel')->setRequired(),
				FieldHelper::createRepeater('sections', 'Sektionen', ["min" => 1, "max" => 3])
				->addSubfields([
					FieldHelper::createImageCrop('image', 'Anwendungsbild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 280, "height" => 60])->setRequired(),
					FieldHelper::createPageLink('url', 'Link'),
					FieldHelper::createWysiwyg('left', 'Editor 1', ['media_upload' => 1]),
					FieldHelper::createWysiwyg('middle', 'Editor 2', ['media_upload' => 1]),
					FieldHelper::createWysiwyg('right', 'Editor 3', ['media_upload' => 1]),
					FieldHelper::createWysiwyg('rightright', 'Editor 4', ['media_upload' => 1]),
				])
		];
	}
}
