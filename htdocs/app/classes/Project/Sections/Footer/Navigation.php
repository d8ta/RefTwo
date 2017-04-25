<?php
namespace Project\Sections\Footer;

use Project\Sections\Abstracts\Navigation as AbstractNavigation;

class Navigation extends AbstractNavigation
{
	protected $cacheKey = __CLASS__;
	protected $template = 'components.footer.navigation';

}
