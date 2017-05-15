<?php 
$jobs = $block->getJobs();
$title = $block->getTitle();
$subtitle = $block->getSubtitle();
?>
<div class="section section--third">
	<div class="section__content">
		<div class="">
			<div class="hireing">
				<div class="hireing__inner">
						<h2 class="hireing__inner--title h1-inner primary-color">{{$title}}</h2>
						<h3 class="hireing__inner--subtitle h2 subtitle">{{$subtitle}}</h3>
					 <div class="hireing__inner--button">
					 	@foreach ($jobs as $job)
					 	<?php
					 	$button_text = $job['button_text'];
						$button_url = $job['button_url'];
						$jobtitle = $job['jobtitle'];
						$jobdescription = $job['jobdescription'];
						?>

						{{-- Textbox --}}
						<div class="hireing__inner__textbox">
							<h2 class="hireing__inner__textbox__headline h4 js-matchheight">{{$jobtitle}}</h2>
							<div class="hireing__inner__textbox__description">
								<div class="hireing__inner__textbox__description__clamp">{{$jobdescription}}</div>
							</div>
							<button class="hireing__inner__textbox__btn btn btn--icon-text" type="button">
		                        <i class="btn__icon primary-color"></i>
		                        <span class="btn__text">{{$button_text}}</span>
		                    </button>
						</div>
						
						@endforeach
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>      