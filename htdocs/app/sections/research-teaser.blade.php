<?php 
$researchimg = $block->getResearchImg();
?>

<?php 
$bigimage = $block->getBigImage();
$title = $block->getTitle();
$description = $block->getDescription();
$buttontext = $block->getButtonText();
?>

<div class="section-research section--yellow">
	<div class="research-teaser__content research-teaser__content--whitebox-top"></div>
		<div class="section section__content">
			<div class="section__inner">
				<div class="research-teaser">

					
					{{-- left --}}
					<div class="research-teaser__content research-teaser__content--left js-matchheight" >
						<h2 class="h1-inner">{{$title}}</h2>
						<p class="h2">{{$description}}</p>
	             		<button class="btn btn--icon-text" type="button">
	                        <i class="btn__icon primary-color"></i>
	                        <span class="btn__text">{{$buttontext}}</span>
	                    </button>
					</div>

					
					{{-- right --}}
					<div class="research-teaser__content research-teaser__content--right js-matchheight" >
						<div class="research-teaser__content__images">
							<div class="research-teaser__content__images research-teaser__content__images--big">
								<img alt="{{$title}}" src="{{$bigimage}}" class="research-teaser__content__images__image">
								<img src="assets/images/icons/entwicklung.svg" class="research-teaser__content__images__icon" alt="{{$title}} icon" />
								@foreach ($researchimg as $img)
							</div>
							<div class="research-teaser__content__images research-teaser__content__images--small">
								<?php 
								$smallimg = $img['image'];
								?>
								<img src="{{$smallimg}}" alt="Forschungsbild klein" class="research-teaser__content__images__smallimg" />
								@endforeach
							</div>
						</div>	
					</div>

				</div>
			</div>
		</div>
		<div class="research-teaser__content research-teaser__content--whitebox-bottom"></div>
	</div>
</div>






				