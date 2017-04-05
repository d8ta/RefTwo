<?php 
$boxes = $block->getBox();
	// $title = $block->getTitle();
	// $description = $block->getDescription();
	// $links = $block->getImages();
?>
<div class="section section--action-box">
	<div class="section__content">
		<div class="action-box">
			<div class="action-box__inner">
				@foreach ($boxes as $box)
				<?php 
				$title = $box['title'];
				$description = $box['description'];
				$buttontext = $box['button_text'];
				?>
				<div class="action-box__box">
					<div class="action-box__box__image bg-image" style="background-image: url({{$boxes['background']}})"></div>
						<div class="action-box__box__text">
							<div class="action-box__box__text__table">
							<div class="action-box__box__text__table__td">
								<h1 class="h1">{{$title}}</h1>
								<br>
								<h2 class="h2">{{$description}}</h2>
								<br>
								<button class="action-box__box__text__table__td__button btn btn--icon-text" type="button">
								<i class="btn__icon primary-color"></i>
								<span class="btn__text">{{$buttontext}}</span>
								</button>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>