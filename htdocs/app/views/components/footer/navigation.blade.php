<?php
$menuHelper = \Project\Helpers\MenuHelper::getInstance();
$nav_items      = $menuHelper->getMenuItems('footer', ["with_submenu_div" => false]);
?>
{{-- Navigation --}}
<nav class="navigation footer-navigation">
    <ul class="level-1">
	    @each("components.navigation.item", $nav_items, 'nav_item')
	</ul>
</nav>