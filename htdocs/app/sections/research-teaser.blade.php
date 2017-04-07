<div class="section section--fullwidth">
	<div class="section__content">
		<div class="research-teaser">
			<div class="research-teaser__inner">
				<?php 
				$title = $block->getTitle();
				$description = $block->getDescription();
				$buttontext = $block->getButtonText();
				?>
				<div class="research-teaser__content">

					<img src="/assets/images/layout/Research_big.png" alt="Research Image big" class="research-teaser__content__image--main" />

					<div class="research-teaser__content__image--featured">

						<img src="/assets/images/layout/Research_small1.png" alt="Research Image small" class="research-teaser__content image--featured-img1" />

						<img src="/assets/images/layout/Research_small2.png" alt="Research Image small" class="research-teaser__content image--featured-img2" />

						<img src="/assets/images/layout/Research_small3.png" alt="Research Image small" class="research-teaser__content image--featured-img3" />

					</div>

					<div class="research-teaser__content__text">
						<div class="research-teaser__content__text__table">
							{{-- <div class="research-teaser__content__text__table__td"> --}}
								<h1 class="h1">{{$title}}</h1>
								<br>
								<h2 class="h2">{{$description}}</h2>
								<br>
								<button class="research-teaser__content__text__table__button btn btn--icon-text" type="button">
									<i class="btn__icon"></i>
									<span class="btn__text">{{$buttontext}}</span>
								</button>
							{{-- </div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				