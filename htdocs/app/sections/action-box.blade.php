<?php
    $boxes = $block->getBox();
    $mh_group = "technology-boxes-" . rand();

    $news_items = Project\Models\News::allPublished();

    if (!empty($news_items)) {
        $news_item_src = $news_items[1];

        $image_id = $news_item_src->getHomeImage();
        $image = wp_get_attachment_image_src($image_id, 'full');

        $news_item = array();
        $news_item['title'] = $news_item_src->getPostTitle();
        $news_item['description'] = $news_item_src->getIntroHome();
        $news_item['button_text'] = __("Mehr erfahren");
        $news_item['icon'] = "vorteile";
        $news_item['button_url'] = get_permalink(pll_get_post($news_item_src->getId()));
        $news_item['background'] = $image[0];
        $boxes[0] = $news_item;
    }
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
				<a href="{{$button_url}}">
				<div class="action-box__box ">
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
								<div class="action-box__box__text__button">
									{{$buttontext}}
								</div>
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
