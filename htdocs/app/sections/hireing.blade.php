<?php 
$jobs = $block->getJobs();
$title = $block->getTitle();
$subtitle = $block->getSubtitle();
?>
<div class="section fifth--third">
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
						$jobtitle = $job['jobtitle'];
						$jobdescription = $job['jobdescription'];
						?>
						<button class="btn--icon-text primary-brand-btn" type="button">
						<i class="btn__icon white-icon"></i>
						<span class="btn__text">{{$jobtitle}}</span>
						<span class="btn__text">{{$jobdescription}}</span>
						<span class="btn__text">{{$button_text}}</span>
						</button>
						@endforeach
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>      