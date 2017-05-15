<?php 
$customerimg = $block->getCustomerImg();
$slides = $block->getSlides();
var_dump($slides)
?>

<div class="section--fifth section--yellow">
	<div class="customer-review__content customer-review__content--whitebox-top"></div>
	<div class="section section__content">
		<div class="section__inner">
			<div class="customer-review @if(count($slides) > 1) js-owl-carousel owl-carousel @endif">
				@foreach ($slides as $slide)
				<?php 
				$bigimage = $slide['big_image'];
				$title = $slide['title'];
				$description = $slide['description'];
				$signature = $slide['signature'];
				?>
				<div>
					{{-- left --}}
					<div class="customer-review__content customer-review__content--left js-matchheight" >
						<h2 class="h1-inner">{{$title}}</h2>
						<p class="h2">{{$description}}</p>
						<h3 class="h4">{{$signature}}</h3>
					</div>
					{{-- right --}}
					<div class="customer-review__content customer-review__content--right js-matchheight" >
						<div class="customer-review__content__image-container">
							<div class="customer-review__content__images customer-review__content__images--big">
								<img alt="{{$title}}" src="{{$bigimage}}" class="customer-review__content__images__image">
								@foreach ($customerimg as $img)
							</div>
							<div class="customer-review__content__images customer-review__content__images--small">
								<?php 
								$customerimg = $img['image'];
								?>
								<img src="{{$customerimg}}" alt="Kundenbild klein" class="customer-review__content__images__smallimg" />
								@endforeach
							</div>
						</div>	
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="customer-review__content customer-review__content--whitebox-bottom"></div>
</div>
				