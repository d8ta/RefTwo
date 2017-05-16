<?php 
$corevalues = $block->getCorevalues();
?>
<div class="section section--second-corp">
	<div class="section__content">
		{{-- <div class="margin"> --}}
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
						<h2 class="h4 primary-color core-values__info__text core-values__info__text--title">{{$title}}</h2>
						<div class="core-values__info__text core-values__info__text--description editor-content">{!!$description!!}</div>
					</div>
				</div>
				@endforeach
			</div>
		{{-- </div> --}}
	</div>
</div>