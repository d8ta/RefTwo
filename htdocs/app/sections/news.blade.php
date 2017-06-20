<?php
$news_items = Project\Models\News::allPublished();

$news_item_src = $news_items[0];

$image_id = $news_item_src->getHomeImage();
$image = wp_get_attachment_image_src($image_id, 'full');

$news_item = array();
$news_item['title'] = $news_item_src->getPostTitle();
$news_item['subtitle'] = $news_item_src->getSubline();
$news_item['description'] = $news_item_src->getContent();
$news_item['button_text'] = __("Mehr erfahren");
$news_item['icon'] = "vorteile";
$news_item['button_url'] = get_permalink(pll_get_post($news_item_src->getId()));
$news_item['background'] = $image[0];
$boxes[0] = $news_item;
?>
<div class="section section--news section--margin">
	<div class="section__content">
		<?php
        $title = $news_item['title'];
        $subtitle = $news_item['subtitle'];
        $description = $news_item['description'];
        $sectionimg = $news_item['background'];
        ?>
		<div class="news">

			{{-- left --}}
			<div class="news__text">
				<h2 class="news__text__title">{{$title}}</h2>
				<h3 class="news__text__subtitle">{!!$subtitle!!}</h3>
				<div class="news__text__description editor-content">{!!$description!!}</div>

			</div>

			{{-- right --}}
			<div class="news__images">
					<div class="news__images__image">
						<img src="{{$sectionimg}}" alt="Section Image" class="news__images__image" />
					</div>
			</div>
		</div>
	</div>
</div>
