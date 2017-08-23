<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;
use Project\Helpers\FooterDownloadHelper;

class DOwnloads extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'download';
	protected static $_label = 'Download Bereich';

	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [
			FieldHelper::createText('headline', 'Titel')->setRequired(),
			FieldHelper::createText('subline', 'Untertitel')->setRequired(),
			FieldHelper::createRepeater('downloads', 'Download', ["min" => 1, "max" => 99])
				->addSubfields([
					FieldHelper::createText('title', 'Titel')->setRequired(), 
					FieldHelper::createText('info', 'Info')->setRequired(),
					array (
						'return_format' => 'array',
						'library' => 'all',
						'min_size' => '',
						'max_size' => 10,
						'mime_types' => '',
						'label' => 'Datei',
						'name' => 'file',
						'type' => 'file',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
					), 
				]),
		];
	}
}