<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class ImagesSection extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'images-section';
	protected static $_label = 'Bilder Sektion';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
	
			FieldHelper::createImageCrop('image1', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 550, "height" => 270])->setRequired(),									
			FieldHelper::createImageCrop('image2', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 550, "height" => 270])->setRequired(),		
			FieldHelper::createImageCrop('image3', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 550, "height" => 550])->setRequired(),									
			FieldHelper::createImageCrop('image4', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 550, "height" => 550])->setRequired(),					
					
		];
	}
}