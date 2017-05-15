<?php 
	$headline = $block->getTitle();
	$description = $block->getDescription();
	$timeline = $block->getTimeline();
?>

<div class="section section--yellow section--padding">
	<div class="section__content">
		<div class="timeline">
			<div class="timeline__wrapper">
				<h2 class="h2">{{$headline}}</h2>
				<div class="timeline__intro">
					{!!$description!!}
				</div>
			</div>
		</div>
		<div class="timeline__horizontal">
			<div class="timeline__horizontal__line">
				<div class="events-wrapper">
					<div class="events">
						<ol>
							@foreach($timeline as $key => $value)
								<li><a href="#0" data-date="{{$key}}/01/{{$value['year']}}" @if($key == 0) class="selected" @endif><span>{{$value['year']}}<span></a></li>
							@endforeach
						</ol>
						<span class="filling-line" aria-hidden="true"></span>
					</div> 
				</div> 
				<ul class="timeline__horizontal__navigation">
					<li><a href="#0" class="prev inactive">Prev</a></li>
					<li><a href="#0" class="next">Next</a></li>
				</ul> 
			</div> 
			<div class="events__content">
				<ol>
					@foreach($timeline as $key => $value)
						<li @if($key == 0) class="selected" @endif data-date="{{$key}}/01/{{$value['year']}}">
							<h2>{{$value['title']}}</h2>
							<p>	
								{!!$value['description']!!}
							</p>
						</li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
</div>
