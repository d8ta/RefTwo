<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class HeaderImage extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'header-image';
	protected static $_label = 'Kopfzeilen Bild';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
				FieldHelper::createImageCrop('background', 'Hintergrund', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 1920, "height" => 400])->setRequired(),
				];
	}
}