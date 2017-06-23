<?php
    $slides = $block->getSlides();
?>
<div class="section section--margin-sm section--yellow">
	<div class="section__content">
		<div class="js-owl-carousel owl-carousel">

		<div class="research-teaser">
			@foreach ($slides as $slide)

			<?php
            $customerimg = $slide['customer_img'];
            $bigimage = $slide['big_image'];
            $title = $slide['title'];
            $description = $slide['description'];
            $signature = $slide['signature'];
            ?>
			{{-- left --}}
			<div class="research-teaser__content research-teaser__content--left">
				<div class="research-teaser__text research-teaser__text--quote">
					<div class="research-teaser__text__inner">
						<h2 class="research-teaser__text__title">{{$title}}</h2>
						<div class="research-teaser__text__description">
							{{$description}}
							<div class="research-teaser__text__description__quote"></div>
						</div>
						<div class="research-teaser__text__author">{{$signature}}</div>
					</div>
				</div>
			</div>
			{{-- right --}}
			<div class="research-teaser__content research-teaser__content--right">
				<div class="research-teaser__images">
					<div class="research-teaser__images__big">
						<img src="{{$bigimage}}" class="research-teaser__images__img" alt="{{$title}}">
						@foreach ($customerimg as $img )
					</div>
					<div class="research-teaser__images__small">
						<img src="{{$img['image']}}" class="research-teaser__images__img" alt="{{$title}}">
						@endforeach
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>

		<div class="research-teaser__whitebox-top">
			<div class="research-teaser__whitebox-helper"></div>
		</div>
		<div class="research-teaser__whitebox-bottom">
			<div class="research-teaser__whitebox-helper"></div>
		</div>
	</div>
</div>
