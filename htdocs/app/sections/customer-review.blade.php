<?php
    $slides = $block->getSlides();
    $customerimg = $block->getCustomerImg();
    $bigimage = $block->getBigImage();
?>
<div class="section section--margin-sm section--yellow">
	<div class="section__content">
		<div class="customer-review">
      <div class="customer-review__slider @if(count($slides) > 1) js-owl-carousel owl-carousel @endif">

      @foreach ($slides as $slide)
			<?php
            $title = $slide['title'];
            $description = $slide['description'];
            $signature = $slide['signature'];
            ?>

			{{-- left --}}
			<div class="customer-review__content customer-review__content--left">
				<div class="customer-review__text customer-review__text--quote">
					<div class="customer-review__text__inner">
						<h2 class="customer-review__text__title">{{$title}}</h2>
						<div class="customer-review__text__description">
							{{$description}}
							<!-- <div class="customer-review__text__description__quote"></div> -->
						</div>
						<div class="customer-review__text__author">{{$signature}}</div>
					</div>
				</div>
			</div>
      @endforeach
    </div>

			{{-- right --}}
			<div class="customer-review__content customer-review__content--right">
				<div class="customer-review__images">
					<div class="customer-review__images__big">
						<img src="{{$bigimage}}" class="customer-review__images__img" alt="{{$title}}">
						@foreach ($customerimg as $img )
					</div>
					<div class="customer-review__images__small">
						<img src="{{$img['image']}}" class="customer-review__images__img" alt="{{$title}}">
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="customer-review__whitebox-top">
			<div class="customer-review__whitebox-helper"></div>
		</div>
		<div class="customer-review__whitebox-bottom">
			<div class="customer-review__whitebox-helper"></div>
		</div>
	</div>
</div>
