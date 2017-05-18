<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class CustomerReview extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'customer-review';
	protected static $_label = 'Text + Grosses Bild + 3 Bilder';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
					FieldHelper::createText('title', 'Überschrift')->setRequired(),
					FieldHelper::createText('description', 'Beschreibung')->setRequired(),
					FieldHelper::createText('signature', 'Unterschrift')->setRequired(),
					FieldHelper::createImageCrop('big_image', 'Kundenbild groß', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 620, "height" => 620])->setRequired(),
					FieldHelper::createRepeater('customer_img', 'Kundenbilder', ["min" => 3, "max" => 3])
					->addSubfields([
									FieldHelper::createImageCrop('image', 'Kundenbild klein', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'no', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired()
									]),
				];
	}
}