<?php 
	$techboxes = $block->getBox();
?>
<div class="section section">
	<div class="section__content">
		<div class="test"></div>
		@foreach ($techboxes as $techbox)
		<?php 
		$title = $techbox['title'];
		$description = $techbox['description'];
		?>
		<div class="technology-boxes">
		<div href="" class="technology-boxes__inner">
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
		</div>
		</div>
		@endforeach
	</div>
</div>
