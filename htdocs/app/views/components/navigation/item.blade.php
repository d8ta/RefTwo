<li>
	<a href="{{ get_permalink(pll_get_post($nav_item->object_id)) }}">{{$nav_item->title}}</a>

	@if (array_key_exists("submenu", $nav_item))
		<ul class="level-{{$nav_item->level + 1}}">
			@each("components.navigation.item", $nav_item->submenu, 'nav_item')
		</ul>
	@endif
</li>