<?php
	/**
	 * @var \Project\Sections\Download $block
	 */
	$downloads = $block->getDownloads();
	$headline = $block->getHeadline();
	$subline = $block->getSubline();
?>
<div class="section section--margin-xl">
	<div class="section__content">
		<div class="download">
		 	<div class="download__wrapper">
		 		<h2 class="h1">{{$headline}}</h2>
		 		<h3 class="h2">{{$subline}}</h3>
		 		<div class="download__content">
		 			<div class="download__list">
						@foreach($downloads as $download)
		 					<a class="download__list__elem" target="_blank" href="{{$download['file']['url']}}">
		 						<div class="download__list__elem__content download__list__elem__content--info ">
		 							<h4 class="download__list__elem__content__headline h4">{{$download["title"]}}</h4>
		 							<div class="download__list__elem__content__text">{{$download["info"]}}</div>
		 						</div>
		 						<div class="download__list__elem__content download__list__elem__content--link ">
		 							<div class="table table--fullheight">
		 								<div class="table__td">
		 									<div class="btn">
												<?php
												echo __('PDF Download');
												?>
											</div>
		 								</div>
		 							</div>
		 						</div>
		 					</a>
						@endforeach
		 			</div>
		 		</div>

		 	</div>
		</div>
	</div>
</div>
