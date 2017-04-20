<?php 
$corevalues = $block->getCorevalues();
?>
<div class="section section--core-values">
	<div class="section__content">
		<div class="margin">
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
						<h2 class="h2 primary-color">{{$title}}</h2>
						<h3 class="core-values__info__text__description">{!!$description!!}</h3>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>