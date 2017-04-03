<div class="section__content">
    <div class="site-navigation__toggler">
    	<div class="site-navigation__toggler__item js-site-navigation-toggler">
    		Menu
    	</div>
    	
    </div>
	<nav class="site-navigation__nav navigation navigation--main">
		<ul class="navigation__list navigation__list--level-{!!$level!!}">
		    @foreach($items as $item)
		        <?php
		        	$class = (isset($page) && 
		        		($item->object_id == $page->getId() ||
		        		(wp_get_post_parent_id($item->object_id) == wp_get_post_parent_id($page->getId()))
		        		)) ? 'active' : '';
		        	if (isset($page) && $page->getId() == get_option( 'page_on_front' )) {
		        		$class = '';
		        	}
		        ?>
		        <li class="navigation__item {!!$class!!}" data-id='{!!$item->object_id!!}'>
		        	@if($item->url == '#')
		        		<h3 class="navigation__item__headline">{{$item->title}}</h3>
		        	@else
		       		<a href="{!!$item->url!!}">{{$item->title}}</a>
		       		@endif
		            
		        </li>
		    @endforeach
		</ul>

	</nav>
</div>