<?php
$news_items = Project\Models\News::allPublished();
?>

@foreach ($news_items as $item)
<?php
    $image_id = $item->getHomeImage();
    $image = wp_get_attachment_image_src($image_id, 'full');
    $news_item = array();
    $news_item['title'] = $item->getPostTitle();
    $news_item['subtitle'] = $item->getSubline();
    $news_item['description'] = $item->getContent();
    $news_item['icon'] = "vorteile";
    $news_item['button_text'] = __("Mehr erfahren");
    $news_item['button_url'] = get_permalink(pll_get_post($item->getId()));
    $news_item['background'] = $image[0];

    $title = $news_item['title'];
    $subtitle = $news_item['subtitle'];
    $description = $news_item['description'];
    $button_url = $news_item['button_url'];

    $button_text = $news_item['button_text'];
    $sectionimg = $news_item['background'];
    ?>

<div class="section section--news section--margin-xxl">
	<div class="section__content">

		<div class="news">

		{{-- left --}}
		<div class="news__text">
			<h2 class="news__text__title">{{$title}}</h2>
			<h3 class="news__text__subtitle">{!!$subtitle!!}</h3>
			<div class="news__text__description editor-content">
        <div class="news__text__description__clamp editor-content">
          {!!$description!!}
        </div>
			</div>
      <a class="news__btn btn btn--yellow" href="{{$button_url}}">{{$button_text}}</a>
    </div>

			{{-- right --}}
		<div class="news__image">
				<div class="news__image__img">
					<img src="{{$sectionimg}}" alt="Section Image" class="news__image__img" />
				</div>
		</div>
	</div>
</div>
</div>
@endforeach
