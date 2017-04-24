<?php
$items = $section->getItems();
?>
<nav class="footer__inner__navigation navigation navigation--floated navigation--footer">
	<ul class="navigation__level-1">
		@each('components.footer.navigation.item', $items, 'item')
	</ul>
</nav>