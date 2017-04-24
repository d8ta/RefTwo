<?php
$items = $section->getItems();
?>
<nav class="">
	<ul class="">
		@eaczh('components.footer.navigation.item', $items, 'item')
	</ul>
</nav>