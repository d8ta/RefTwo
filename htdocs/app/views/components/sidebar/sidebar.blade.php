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
	<div class="sidebar__content sidebar__content--full">
		<nav class="navigation navigation--sidebar js-nested-navigation">
			<?php wp_nav_menu( $options ); ?>
		</nav>
	</div>
</aside>
