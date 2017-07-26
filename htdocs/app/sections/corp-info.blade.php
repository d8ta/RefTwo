<div class="section section--corp-info section--margin">
	<div class="section__content">
		<?php
		$title = $block->getTitle();
		$subtitle = $block->getSubtitle();
		$description = $block->getDescription();
		$logo = $block->getLogo();
		$sectionimg = $block->getSectionimg();
		$file = $block->getFile();
		$image = wp_get_attachment_image_src($logo, 'full');
		$image_mimetype = get_post_mime_type($logo);
		$image_metadata = wp_get_attachment_metadata($logo);
		?>
		<div class="corp-info">

			{{-- left --}}
			<div class="corp-info__text">
				<h2 class="corp-info__text__title">{{$title}}</h2>
				<h3 class="corp-info__text__subtitle">{!!$subtitle!!}</h3>
				<div class="corp-info__text__description editor-content">{!!$description!!}</div>
				<div class="corp-info__text__image">
					@if(!empty($logo))
						<?php
							if($image_mimetype == 'image/svg+xml') {
								$mimetype = 'svg';
							} else {
								$mimetype = 'normal';
							}
						?>
						<a target="_blank" alt="{{$file['title']}}" href="{{$file['url']}}">
							@if($mimetype == 'svg')
								<img src="{{$image[0]}}" class="corp-info__text__logo corp-info__text__logo--{{$mimetype}}" />
							@else
								<div class="corp-info__text__logo-wrapper" style="width: 100%; padding-bottom: {{$image_metadata['height'] / $image_metadata['width'] * 100}}%">
									<img src="{{$image[0]}}" class="corp-info__text__logo corp-info__text__logo--{{$mimetype}}" />
								</div>
							@endif
						</a>
					@endif
				</div>

			</div>

			{{-- right --}}
			<div class="corp-info__images">
				@foreach ($sectionimg as $image)
					<div class="corp-info__images__image-wrapper">
						<img src="{{$image['image']}}" alt="Section Image" class="corp-info__images__image" />
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
