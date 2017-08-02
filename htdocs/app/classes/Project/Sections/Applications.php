<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Applications extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'applications';
	protected static $_label = 'Editor Zwei-/Dreispaltig + Bild';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [	
				FieldHelper::createRepeater('sections', 'Sektionen', ["min" => 1, "max" => 5])
				->addSubfields([
					FieldHelper::createText('title', 'Titel')->setRequired(), 	
					FieldHelper::createWysiwyg('description', 'Text')->setRequired(), 	
					FieldHelper::createImageCrop('image', 'Anwendungsbild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),
					FieldHelper::createWysiwyg('left', 'Editor links', ['media_upload' => 1]), 
					FieldHelper::createWysiwyg('middle', 'Editor mitte', ['media_upload' => 1]), 
					FieldHelper::createWysiwyg('right', 'Editor rechts', ['media_upload' => 1]), 
				])
		];
	}
}