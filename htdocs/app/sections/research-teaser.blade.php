<?php 
$researchimg = $block->getResearchImg();
?>

<?php 
$bigimage = $block->getBigImage();
$title = $block->getTitle();
$description = $block->getDescription();
$buttontext = $block->getButtonText();
?>

<div class="section-research">
	<div class="section section--yellow">
		<div class="section__inner">
			<div class="research-teaser">
				<div class="research-teaser__content research-teaser__content--left" js-match-height>
					<h2 class="h1">{{$title}}</h2>
					<p class="h2">{{$description}}</p>
             		<button class="simple-text__link icon-link btn btn--icon-text" type="button">
                        <i class="btn__icon primary-color"></i>
                        <span class="btn__text">{{$buttontext}}</span>
                    </button>
				</div>
				<div class="research-teaser__content research-teaser__content--right" js-match-height>
					<img alt="{{$title}}" src="{{$bigimage}}" class="research-teaser__content__image">
					<img src="assets/images/icons/entwicklung.svg" class="research-teaser__content__icon" alt="{{$title}} icon" />
					@foreach ($researchimg as $img)
					<?php 
					$smallimg = $img['image'];
					?>
					<div class="research-teaser__content__smallimg">
						<img src="{{$smallimg}}" alt="Forschungsbild klein" class="research-teaser__content__smallimg--inner" />
					</div>
					@endforeach
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



<div class="section-research" style="display: none;">
	<div class="section section--yellow">
		<div class="section__content">
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






				