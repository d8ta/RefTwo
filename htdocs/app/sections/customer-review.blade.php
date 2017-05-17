<?php 
$customerimg = $block->getCustomerImg();
$mh_group = "research-teaser-" . rand();
?>
<div class="section section--margin-sm section--yellow">
	<div class="research-teaser__whitebox-top"></div>

	<div class="section__content">
		<div class="research-teaser">
			<?php 
			$bigimage = $block->getBigImage();
			$title = $block->getTitle();
			$description = $block->getDescription();
			$signature = $block->getSignature();
			?>
			{{-- left --}}
			<div class="research-teaser__content research-teaser__content--left js-matchheight" data-mh="{{$mh_group}}">
				<h2 class="research-teaser__content__title">{{$title}}</h2>
				<div class="research-teaser__content__description">
					<img src="/assets/images/layout/quotes.png" alt="Quotes" class="research-teaser__content__quoteimage" />
					{{$description}}
				</div>
				<h3 class="research-teaser__content__signature">{{$signature}}</h3>
			</div>
			{{-- right --}}
			<div class="research-teaser__content research-teaser__content--right js-matchheight" data-mh="{{$mh_group}}">
				<div class="research-teaser__content__image-container">
					<div class="research-teaser__content__images research-teaser__content__images--big">
						<img alt="{{$title}}" src="{{$bigimage}}" class="research-teaser__content__images__image">
						@foreach ($customerimg as $img )
					</div>
					<div class="research-teaser__content__images research-teaser__content__images--small">
						<?php 
						$customerimg = $img['image'];
						?>
						<img src="{{$customerimg}}" alt="Kundenbild klein" class="research-teaser__content__images__smallimg" />
						@endforeach
					</div>
				</div>	
			</div>
		</div>
	</div>
	<div class="research-teaser__whitebox-bottom"></div>
</div>
				