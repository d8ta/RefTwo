<?php
$config = [
	'type' => 'outdated_browser'
];
$label_old_browser = __('You are using an outdated browser.');
?>
<div class="website-alert-headerline__container website-alert-headerline__container--browser js-alert" data-config='{!!json_encode($config)!!}'>
	<div class="website-alert-headerline">
		<div class="website-alert-headerline__inner">
			<span class="website-alert-headerline__text">{{$label_old_browser}}</span>
			<button class="website-alert-headerline__btn js-alert-close">OK</button>
		</div>
	</div>
</div>