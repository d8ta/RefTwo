<?php
$has_submenu_div = $nav_item->level == 1 && $nav_item->with_submenu_div;




?>
<li class="{{$nav_item->class}}">
	<a href="{{ $nav_item->link }}">{!!$nav_item->title!!}</a>
	@if (isset($nav_item->submenu))
		@if ($has_submenu_div)
			<div class="nav-submenu">
			<div class="nav-submenu__table">
				<div class="nav-submenu__nav">
		@endif

		<ul class="level-{{$nav_item->level + 1}}">
			@each("components.navigation.item", $nav_item->submenu, 'nav_item')
		</ul>

		@if ($has_submenu_div)
				</div>
				<div class="nav-submenu__content">
					<?php $post_id = pll_get_post($nav_item->post_id, 'de'); ?>
					@includeIf("components.navigation.submenu-" . $post_id)
				</div>
			</div>
			</div>
		@endif
	@endif
</li>
