<?php 
$boxes = $block->getBox();
	$mh_group = "technology-boxes-" . rand();
?>
<div class="section section--margin-xs">
	<div class="section__content">
		<div class="action-box">
			<div class="action-box__inner">
				@foreach ($boxes as $box)
				<?php 
				$title = $box['title'];
				$description = $box['description'];
				$buttontext = $box['button_text'];
				$icon = $box['icon'];
				$button_url = $box['button_url'];
				?>
				<div class="action-box__box">
					<div class="action-box__box__image bg-image" style="background-image: url({{$box['background']}})">
						<img src="assets/images/icons/{{$icon}}.svg" class="action-box__box__image--icon" alt="Icon" />
					</div>
						<div class="action-box__box__text">
							<div class="action-box__box__text__table">
							<div class="action-box__box__text__table__td">
								<div class="action-box__box__text__wrapper js-matchheight" data-mh="{{ $mh_group }}">
									<h2 class="action-box__box__text__headline">{{$title}}</h2>
									<div class="action-box__box__text__description">
										<div class="action-box__box__text__description__clamp">{{$description}}</div>
									</div>
								</div>
								<a class="action-box__box__text__button" href="{{$button_url}}">
									{{$buttontext}}
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>