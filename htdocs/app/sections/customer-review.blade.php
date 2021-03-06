<?php
    $slides = $block->getSlides();
    $customerimg = $block->getCustomerImg();
    $bigimage = $block->getBigImage();
    $noquote = $block->getNo_quote();
    $rand = rand(5, 10000);
?>
<div class="section section--margin-sm section--yellow">
	<div class="section__content">
		<div class="customer-review__whitebox-top">
			<div class="customer-review__whitebox-helper"></div>
		</div>
		<div class="customer-review">
			<div class="customer-review__content customer-review__content--left js-matchheight" data-mh="{{$rand}}">
				<div class="customer-review__slider @if(count($slides) > 1) js-owl-carousel owl-carousel @endif">
					@foreach ($slides as $slide)
						<?php
					    $title = $slide['title'];
					    $description = $slide['description'];
					    $signature = $slide['signature'];
					    ?>

					<div class="table table--fullheight js-owl-item">
						<div class="table__td">
						{{-- left --}}
						<div class="customer-review__text customer-review__text--quote">
							<div class="customer-review__text__inner">
								<h2 class="customer-review__text__title">{!!$title!!}</h2>
								<div class="customer-review__text__description @if($noquote)customer-review__text__description--no-quote @endif">
									<div class="editor-content editor-content--white">
										{!!$description!!}
									</div>
								</div>
								<div class="customer-review__text__author">{{$signature}}</div>
							</div>
						</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			{{-- right --}}
			<div class="customer-review__content customer-review__content--right js-matchheight" data-mh={{$rand}}">
				<div class="table table--fullheight">
					<div class="table__td">
						<div class="customer-review__images">
							<div class="customer-review__images__big">
								<img src="{{$bigimage}}" class="customer-review__images__img" alt="{{$title}}">
							</div>
								@foreach ($customerimg as $img )
									@if($img['image'])
									<div class="customer-review__images__small">
										<img src="{{$img['image']}}" class="customer-review__images__img" alt="{{$title}}">
									</div>
									@endif
								@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="customer-review__whitebox-bottom">
			<div class="customer-review__whitebox-helper"></div>
		</div>
	</div>
</div>
