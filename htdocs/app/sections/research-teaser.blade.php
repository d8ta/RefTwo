<div class="section section--fullwidth">
	<div class="section__content">
		<div class="research-teaser">
			<div class="research-teaser__inner">
				<?php 
				$title = $block->getTitle();
				$description = $block->getSubtitle();
				$buttontext = $block->getButtonText();
				?>
				<div class="research-teaser__research">
					<div class="research-teaser__research__image bg-image" style="background-image: url({{$research['background-research']}})"></div>
					<div class="research-teaser__research__image bg-image" style="background-image: url({{$research['background-research1']}})"></div>
					<div class="research-teaser__research__image bg-image" style="background-image: url({{$research['background-research2']}})"></div>
					<div class="research-teaser__research__image bg-image" style="background-image: url({{$research['background-research3']}})"></div>
					<div class="research-teaser__research__text">
						<div class="research-teaser__research__text__table">
							<div class="research-teaser__research__text__table__td">
								<h1 class="h1">{{$title}}</h1>
								<h2 class="h2">{{$description}}</h2>
								<button class="research-teaser__research__text__table__td__button btn btn--icon-text" type="button">
									<i class="btn__icon"></i>
									<span class="btn__text">{{$buttontext}}</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>