<?php 
	$links = $block->getLinks();
?>
<div class="section section--fullwidth">
	<div class="section__content">
		<div class="customer-review">
			<div class="customer-review__content">
				<?php 
				$bigimage = $block->getBigImage();
				$title = $block->getTitle();
				$description = $block->getDescription();
				$signature = $block->getSignature();
				?>
				@foreach ($links as $link)
				<?php 
				$batchimage = $link['image'];
				?>
				<div class="customer-review__content__image--featured">
					<img src="{{$batchimage}}" alt="Forschungsbild klein" class="" />
				</div>
				@endforeach
				<div class="customer-review__content__image--main">
					<img src="{{$bigimage}}" alt="Forschungsbild groß" class="customer-review__content__image--main" />
				</div>
				<div class="customer-review__content__text">
					<div class="customer-review__content__text--elements">
						<h1 class="h1">{{$title}}</h1>
						<h2 class="h2">{{$description}}</h2>
						<h2 class="h2">{{$signature}}</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				