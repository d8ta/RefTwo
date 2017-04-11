<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class CorpInfo extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'corp-info';
	protected static $_label = 'Unternehmens Information';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('title', 'Überschrift')->setRequired(), //getTitle()
			FieldHelper::createText('subtitle', 'Unterüberschrift')->setRequired(),  // getSubtitle()
			FieldHelper::createWYSIWYG('description', 'Beschreibung')->setRequired(), //getDescription()
			FieldHelper::createRepeater('sectionimg', 'Sectionimg', ["min" => 3, "max" => 3]) // getSectionimg() --> $sectionimg['background'];
				->addSubfields([
					FieldHelper::createImageCrop('image', 'Bild', ["crop_type" => "hard", 'target_size' => 'custom', 'force_crop' => 'yes', 'save_format' => 'url', "width" => 200, "height" => 200])->setRequired(),
					]),
		];
	}
}