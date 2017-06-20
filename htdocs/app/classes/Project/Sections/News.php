<?php
namespace Project\Sections;

use A365\Wordpress\Helpers\Acf\FieldHelper;

class News extends \A365\Wordpress\Block\AcfBlock {

	protected $_template = 'news';
	protected static $_label = 'News Sektion';
	/**
	 * @inheritdoc
	 */
	public static function getAcfSubfields()
	{
		return [


		];
	}
}
