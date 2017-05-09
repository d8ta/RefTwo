<?php
$menuHelper = \A365\Wordpress\Helpers\MenuHelper::getInstance();
$items      = $menuHelper->getMenuItems('primary');
?>
{{-- Navigation --}}
<div class="site-navigation js-site-navigation">
    @include("components.header.navigation-inner")
</div>