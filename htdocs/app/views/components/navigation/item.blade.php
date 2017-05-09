<?php
$has_submenu = $nav_item->level == 1 && $nav_item->menu_name == "primary";
?>
<li class="{{$nav_item->class}}">
	<a href="{{ get_permalink(pll_get_post($nav_item->object_id)) }}">{{$nav_item->title}}</a>
	@if (array_key_exists("submenu", $nav_item))
		@if ($has_submenu)
			<div class="nav-submenu">
			<div class="nav-submenu__table">
				<div class="nav-submenu__nav">
		@endif
				<ul class="level-{{$nav_item->level + 1}}">
					@each("components.navigation.item", $nav_item->submenu, 'nav_item')
				</ul>
		@if ($has_submenu)
				</div>
				<div class="nav-submenu__content">
					<div class="nav-submenu__box">
					</div>
				</div>
			</div>
			</div>
		@endif
	@endif
</li>