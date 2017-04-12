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
				<div class="customer-review__content__text">
					<h2 class="h1">{{$title}}</h2>
					<h3 class="h2">{{$description}}</h3>
					<h3 class="h2">{{$signature}}</h3>
				</div>
				<div class="customer-review__content__images">
					<div class="customer-review__content__images--big">
						<img src="{{$bigimage}}" alt="Forschungsbild groß" class="customer-review__content__images--big__inner" />
					</div>
					<div class="customer-review__content__images--small">
					@foreach ($links as $link)
					<?php 
					$featuredimage = $link['image'];
					?>
					<img src="{{$featuredimage}}" alt="Forschungsbild klein" class="customer-review__content__images--small__inner" />
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				