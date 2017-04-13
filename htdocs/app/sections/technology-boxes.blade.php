<?php 
	$techboxes = $block->getBox();
?>
<div class="section section--fullwidth">
	<div class="section__content">
		@foreach ($techboxes as $techbox)
		<?php 
		$title = $techbox['title'];
		$description = $techbox['description'];
		?>
		<div class="technology-boxes">
		<a href="" class="technology-boxes__inner">
			<div class="technology-boxes__inner__image bg-image" style="background-image: url({{$techbox['background']}})">
			</div>
			<div class="technology-boxes__inner__text">
				<h2 class="h4 primary-color">{{$title}}</h2>
				<div class="technology-boxes__inner__text--description">
					<h3 class="h3">
						<div class="technology-boxes__inner__text--description__clamp">{{$description}}</div>
					</h3>
				</div>
			</div>
		</a>
		</div>
		@endforeach
	</div>
</div>