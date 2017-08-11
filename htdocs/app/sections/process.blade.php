<?php
$sections = $block->getSections();
$title = $block->getTitle();
?>
<div class="section section--margin-xl">
	<div class="section__content">
		<div class="process">
			<h2 class="h1">{{$title}}</h2>
			@foreach ($sections as $section)
			<?php
            $image = $section['image'];
            $url = $section['url'];
            $left = $section['left'];
            $middle = $section['middle'];
            $right = $section['right'];
            $rightright = $section['rightright'];
            ?>
			<div class="process__info">
				<a class="process__info__link" href="{{$url}}">
					<img src="{{$image}}" alt="application Image" class="process__info__link__image" />
				</a>
				<div class="process__info__text">
					
					<div class="process__info__text__col editor-content">{!!$left!!}</div>
					<div class="process__info__text__col editor-content">{!!$middle!!}</div>
                    <div class="process__info__text__col editor-content">{!!$right!!}</div>
                    @if ($rightright)
					   <div class="process__info__text__col editor-content">{!!$rightright!!}</div>
                    @endif
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
