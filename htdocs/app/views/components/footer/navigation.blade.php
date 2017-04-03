<?php
/**
 * @var \A365\Wordpress\Helpers\MenuHelper $menuHelper
 * @var array $items Menu Items
 */

$menuHelper = \A365\Wordpress\Helpers\MenuHelper::getInstance();
$items      = $menuHelper->getMenuItems('footer');

?>
<nav class="navigation navigation--footer">
	{!!$menuHelper->generateHtml('components.navigation.items', $items, 1)!!}
</nav>