<ul class="footer-navigation__list">
    @foreach($items as $item)
        <?php
            $class = "";
        	/*$class = (isset($page) && 
        		($item->object_id == $page->getId() ||
        		(wp_get_post_parent_id($item->object_id) == wp_get_post_parent_id($page->getId()))
        		)) ? 'active' : '';
        	if (isset($page) && $page->getId() == get_option( 'page_on_front' )) {
        		$class = '';
        	}*/
        ?>
        <li class="footer-navigation__list__item {!!$class!!}" data-id='{!!$item->object_id!!}'>
        	@if($item->url == '#')
        		<h3 class="footer-navigation__list__item__headline">{{$item->title}}</h3>
        	@else
       		<a href="{!!$item->url!!}">{{$item->title}}</a>
       		@endif
            
        </li>
    @endforeach
</ul>

