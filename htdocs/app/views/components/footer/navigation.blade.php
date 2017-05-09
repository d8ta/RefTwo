<?php
$menuHelper = \A365\Wordpress\Helpers\MenuHelper::getInstance();
$items      = $menuHelper->getMenuItems('footer');
?>
{{-- Navigation --}}
<nav class="footer-navigation">
    @include("components.footer.navigation-inner")
</nav>