<?php 
	$techboxes = $block->getBox();
?>
<div class="section section--fullwidth">
	<div class="section__content">
		<div class="technology-techboxes">
			<div class="technology-techboxes__inner">
				@foreach ($techboxes as $techbox)
				<?php 
				$title = $techbox['title'];
				$description = $techbox['description'];
				$buttontext = $techbox['button_text'];
				?>
				<div class="technology-techboxes__techboxes">
					<div class="technology-techboxes__techboxes__image bg-image" style="background-image: url({{$techbox['background']}})"></div>
					<div class="technology-techboxes__techboxes__text">
						<div class="technology-techboxes__techboxes__text__table">
							<div class="technology-techboxes__techboxes__text__table__td">
								<h1 class="h1">{{$title}}TEST</h1>
								<h2 class="h2">{{$description}}</h2>
								<button class="technology-techboxes__techboxes__text__table__td__button btn btn--icon-text" type="button">
									<i class="btn__icon"></i>
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