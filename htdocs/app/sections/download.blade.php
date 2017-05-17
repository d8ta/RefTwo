<?php
	/**
	 * @var \Project\Sections\Download $block
	 */
	$downloads = $block->getDownloads();
	$title = $block->getHeadline();
	$subtitle = $block->getSubline();
?>
<div class="section section--margin-xl">
	<div class="section__content">
		<div class="download">
		 	<div class="download__wrapper">
		 		<h2 class="h2">{{$title}}</h2>
		 		<h2 class="h3">{{$subtitle}}</h3>
		 		<div class="download__content">
		 			<div class="download__list">
						@foreach($downloads as $download)
		 					<a class="download__list__elem" href="{{$download['file']['url']}}">
		 						<div class="download__list__elem__content download__list__elem__content--info js-matchheight">
		 							<h2 class="h2">{{$download["title"]}}</h2>
		 							<p>{{$download["info"]}}<p>
		 						</div>
		 						<div class="download__list__elem__content download__list__elem__content--link js-matchheight">
		 							<div class="table table--fullheight">
		 								<div class="table__td">
		 									<div class="btn">PDF herunterladen</div>
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

