<?php 
	$links = $block->getLinks();
?>
<div class="section section--fullwidth">
	<div class="section__content">
		<div class="product-links">
			<div class="product-links__inner">
				@foreach ($links as $link)
				<?php 
				$description = $link['description'];
				$background = $link['background'];
				?>
				<div class="product-links__slide">
					<div class="product-links__slide__image bg-image" style="background-image: url({{$background}})"></div>
						<h2 class="h2">{{$description}}</h2>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>