<?php 
$researchimg = $block->getResearchImg();
$bigimage = $block->getBigImage();
$title = $block->getTitle();
$description = $block->getDescription();
$buttontext = $block->getButtonText();
$button_url = $block->getButtonUrl();
?>

<div class="section section--margin-sm section--yellow">
	<div class="section__content">
		<div class="research-teaser">
			{{-- left --}}
			<div class="research-teaser__content research-teaser__content--left">
				<div class="research-teaser__text">
					<div class="research-teaser__text__inner">
						<h2 class="research-teaser__text__title">{{$title}}</h2>
						<div class="research-teaser__text__description">{{$description}}</div>
		         		<a class="btn" href="{{$button_url}}">
		                    {{$buttontext}}
		                </a>
	                </div>
                </div>
			</div>

			{{-- right --}}
			<div class="research-teaser__content research-teaser__content--right">
				<div class="research-teaser__images">
					<div class="research-teaser__images__big">
						<div class="research-teaser__images__img">
							<img src="{{$bigimage}}" alt="{{$title}}">
						</div>
					</div>
					<div class="research-teaser__images__small">
						@foreach ($researchimg as $img)
							<div class="research-teaser__images__img">
								<img src="{{$img['image']}}" alt="{{$title}}">
							</div>
						@endforeach
					</div>
					<div class="research-teaser__icon">
						<i class="icon"></i>
					</div>
				</div>	
			</div>
			
		</div>
		<div class="research-teaser__whitebox-top">
			<div class="research-teaser__whitebox-helper"></div>
		</div>
		<div class="research-teaser__whitebox-bottom">
			<div class="research-teaser__whitebox-helper"></div>
		</div>
	</div>
	
</div>






				