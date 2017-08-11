<div class="section section--images-section section--margin">
	<div class="section__content">
		<?php 
		$image1 = $block->getImage1();
		$image2 = $block->getImage2();
		$image3 = $block->getImage3();
		$image4 = $block->getImage4();
		?>
		<div class="images-section">
			<div class="images-section__images">
				<!-- left -->
				<div class="images-section__images__left">
					<div class="images-section__images__left__img">
						<img src="{{$image1}}" alt="Image" class="" />
					</div>				
					<div class="images-section__images__left__img">
						<img src="{{$image2}}" alt="Image" class="" />
					</div>
				</div>
				<!-- right -->
				<div class="images-section__images__right">
					<div class="images-section__images__right__img">
						<img src="{{$image3}}" alt="Image" class="" />
					</div>				
					<div class="images-section__images__right__img images-section__images__right__img--last">
						<img src="{{$image4}}" alt="Image" class="" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>