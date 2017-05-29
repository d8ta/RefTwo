<?php 
$corevalues = $block->getCorevalues();
?>
<div class="section section--margin-xl">
	<div class="section__content">
		<div class="core-values">
			@foreach ($corevalues as $value)
			<?php 
			$image = $value['image'];
			$title = $value['title'];
			$description = $value['description'];
			?>
			<div class="core-values__info">
				<img src="{{$image}}" alt="Section Image" class="core-values__info__image" />
				<div class="core-values__info__text">
					<h3 class="core-values__info__text core-values__info__text__title">{{$title}}</h3>
					<div class="core-values__info__text core-values__info__text__description editor-content">{!!$description!!}</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>