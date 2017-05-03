<?php 
	$researchimg = $block->getResearchImg();
?>
<div class="section section--fullwidth">
	<div class="section__content">
		<div class="margin-research">
			<div class="research-teaser">
				<div class="research-teaser__content">
					<?php 
					$bigimage = $block->getBigImage();
					$title = $block->getTitle();
					$description = $block->getDescription();
					$buttontext = $block->getButtonText();
					?>
					<div class="research-teaser__content__text">
						<div class="research-teaser__content__text__title">
							<h2 class="h1">{{$title}}</h2>
						</div>
						<div class="research-teaser__content__text__description">
							<p class="h2">{{$description}}</p>
						</div>
	                    <button class="research-teaser__content__text__button btn btn--icon-text" type="button">
	                        <i class="btn__icon primary-color"></i>
	                        <span class="btn__text">{{$buttontext}}</span>
	                    </button>
					</div>
					<div class="research-teaser__content__images">
						<div class="research-teaser__content__images--big">
							<img src="{{$bigimage}}" alt="Forschungsbild groß" class="research-teaser__content__images--big__inner" />
							<img src="assets/images/icons/entwicklung.svg" class="research-teaser__content__images--big__icon" alt="Icon" />
							<div class="research-teaser__whitebox"></div>
						</div>
						<div class="research-teaser__content__images--small">
						@foreach ($researchimg as $img)
						<?php 
						$smallimg = $img['image'];
						?>
						<img src="{{$smallimg}}" alt="Forschungsbild klein" class="research-teaser__content__images--small__inner" />
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				