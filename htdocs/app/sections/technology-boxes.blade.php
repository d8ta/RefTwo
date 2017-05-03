<?php 
	$techboxes = $block->getBox();
	$mh_group = "technology-boxes-" . rand();
?>
<div class="section section--technology-boxes">
	<div class="section__content">
		<div class="technology-boxes">
			@foreach ($techboxes as $techbox)
			<?php 
			$title = $techbox['title'];
			$description = $techbox['description'];
			?>
			<div class="technology-boxes__box">
				<a href="" class="technology-boxes__box__inner">
					<div class="technology-boxes__box__image bg-image" style="background-image: url({{$techbox['background']}})">
					</div>
					<div class="technology-boxes__box__text js-matchheight" data-mh="{{ $mh_group }}">
						<div class="technology-boxes__box__text--title">
							<h2 class="h4 primary-color">{{$title}}</h2>
						</div>
						<div class="technology-boxes__box__text--description">
							<p class="h3">
								<div class="technology-boxes__box__text--description__clamp">{{$description}}</div>
							</p>
						</div>
						<div class="technology-boxes__box__text--link btn--icon-text primary-brand-btn">
						<i class="btn__icon white-icon"></i>
						<span class="btn__text">mehr erfahren</span>
						</button>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
