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
		<div class="techboxes">
			<div class="techboxes__image bg-image" style="background-image: url({{$techbox['background']}})"></div>
			<div class="techboxes__text">
				<h2 class="h1">{{$title}}</h2>
				<br>
					<div class="techboxes__text--description">
						<h2 class="h2">{{$description}}</h2>
					</div>
			</div>
		</div>
		@endforeach
	</div>
</div>