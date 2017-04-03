<?php
$config = [
	'type' => 'cookie'
];
$label_cookie = __('This website uses cookies to ensure you get the best experience on our website. If you continue to use this site we will assume that you are happy with it.');
?>
<div class="website-alert-headerline__container website-alert-headerline__container--cookies js-alert" data-config='{!!json_encode($config)!!}'>
	<div class="website-alert-headerline">
		<div class="website-alert-headerline__inner">
			<span class="website-alert-headerline__text">{{$label_cookie}}</span>
			<button class="website-alert-headerline__btn js-alert-close">OK</button>
		</div>
	</div>
</div>