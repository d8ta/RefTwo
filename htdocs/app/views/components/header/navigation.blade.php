<?php
$menuHelper = \Project\Helpers\MenuHelper::getInstance();
$nav_items  = $menuHelper->getMenuItems('primary', ["with_submenu_div" => true]);
?>
{{-- Navigation --}}
<nav class="navigation header-navigation js-site-navigation">
    <ul class="level-1">
	    @each("components.navigation.item", $nav_items, 'nav_item')
	</ul>
</nav>