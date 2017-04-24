<?php
$items = $section->getItems();
?>
<nav class="">
	<ul class="">
		@each('components.footer.navigation.item', $items, 'item')
	</ul>
</nav>