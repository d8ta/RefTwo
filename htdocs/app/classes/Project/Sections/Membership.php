<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class Membership extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'membership';
	protected static $_label = 'Title/Subtitle + Logos';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(),
			FieldHelper::createRepeater('logo', 'Logo', ["min" => 4, "max" => 4])
				->addSubfields([
					FieldHelper::createImageCrop('image', 'Logo', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),

			]),

		];
	}
}
