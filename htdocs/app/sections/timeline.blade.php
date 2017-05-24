<?php 
	$headline = $block->getTitle();
	$description = $block->getDescription();
	$timeline = $block->getTimeline();

	$rand_active = rand(0,count($timeline)-1);
?>

<div class="section section--yellow section--margin">
	<div class="section__content">
		<div class="timeline">
			<div class="timeline__wrapper">
				<h2 class="h2">{{$headline}}</h2>
				<div class="timeline__intro">
					{!!$description!!}
				</div>
			</div>
			<div class="timeline__horizontal">
				<div class="timeline__horizontal__line">
					<div class="timeline__horizontal__line__content table">
						@foreach($timeline as $key => $elem)
						<div class="timeline__horizontal__line__content__inner table__td table__td--center @if($key === $rand_active) active @endif" data-id="id-{{$key}}">
							<div class="timeline__horizontal__line__content__inner__image">
								<img src="{{$elem['image']}}" alt="{{$elem['title']}}">
							</div>
							<div class="timeline__horizontal__line__content__inner__dot"></div>
							<div class="timeline__horizontal__line__content__inner__year">
								<h3 class="h3">{{$elem['year']}}</h3>
							</div>
						</div>
						@endforeach
					</div>
				</div> 
				<div class="timeline__horizontal__content">
					@foreach($timeline as $key => $elem)
						<div class="timeline__horizontal__content__text @if($key === $rand_active) active @endif" data-id="id-{{$key}}">
							<div class="timeline__horizontal__content__inner timeline__horizontal__content__inner--left">
								<h2 class="h2">{{$elem['title']}}</h2>
							</div>
							<div class="timeline__horizontal__content__inner timeline__horizontal__content__inner--right">
								{!!$elem['description']!!}
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
