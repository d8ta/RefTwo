<?php
$options = array(
	'container' => '',
	'theme_location' => 'primary',
	'menu_class' => 'list-unstyled',
	'depth'           => 2,
	// 'walker'=> new MFC_Walker_Nav_Menu()
);
?>
<aside class="sidebar">
	<div class="sidebar__content">

		@include('components.sidebar.navigation')

		<div class="sidebar__lang-switch">
    		@include('components.header.language-switch')
    	</div>
	</div>
</aside>
