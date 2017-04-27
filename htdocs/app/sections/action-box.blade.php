<?php 
$boxes = $block->getBox();
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
				$icon = $box['icon'];
				?>
				<div class="action-box__box">
					<div class="action-box__box__image bg-image" style="background-image: url({{$box['background']}})">
						<img src="assets/images/icons/{{$icon}}.svg" class="action-box__box__image--icon" alt="Icon" />
					</div>
						<div class="action-box__box__text">
							<div class="action-box__box__text__table">
							<div class="action-box__box__text__table__td">
								<h2 class="action-box__box__text__headline">{{$title}}</h2>
								<div class="action-box__box__text__description">
									<div class="action-box__box__text__description__clamp">{{$description}}</div>
								</div>
								<button class="action-box__box__text__table__td__button btn btn--icon-text" type="button">
								<i class="btn__icon primary-color icon icon-{{$icon}}"></i>
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