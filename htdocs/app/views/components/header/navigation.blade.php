<?php
$menuHelper = \Project\Helpers\MenuHelper::getInstance();
$nav_items  = $menuHelper->getMenuItems('primary');
?>
{{-- Navigation --}}
<nav class="header-navigation js-site-navigation">
    <ul class="level-1">
	    @each("components.navigation.item", $nav_items, 'nav_item')
	</ul>
</nav>