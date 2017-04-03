<?php
/**
 * @var \A365\Wordpress\Helpers\MenuHelper $menuHelper
 * @var array $items Menu items to process
 * @var string $view Current view
 * @var int $level
 */

$nextLevel = $level + 1;
?>
<ul class="navigation__list navigation__list--level-{!!$level!!}">
    @foreach($items as $item)
        <?php
        $page_id = get_the_ID();
        $class = ($item->object_id == $page_id) ? 'active' : '';
        ?>
        <li class="navigation__item navigation__item--level-{!!$level!!} {!!$class!!}" data-id='{!!$item->object_id!!}'>
        	@if($item->url == '#')
        		<h3 class="navigation__item__headline">{{$item->title}}</h3>
        	@else
       		<a href="{!!$item->url!!}">{{$item->title}}</a>
       		@endif
            @if($item->children)
                {!!$menuHelper->generateHtml($view, $item->children, $nextLevel)!!}
            @endif
        </li>
    @endforeach
</ul>
