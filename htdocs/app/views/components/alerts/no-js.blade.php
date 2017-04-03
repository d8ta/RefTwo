<?php
$label_headline = __('JavaScript inactive');
$label_text = __('Please activate JavaScript.');
$label_btn = __('I understand');
?>

@if (!isset($_COOKIE['js_alert']))
<noscript>
	<div class="website-alert website-alert--no_script">
		<div class="table">
			<div class="table__td">
				<div class="logo">
					<img src="assets/images/logo/rieder-logo-negativ.png" alt="{{get_bloginfo()}}">
				</div>
				<div class="h2">{{$label_headline}}</div>
				<p>{{$label_text}}</p>
				<br><br>
				<a href="/js-hide.php?url={{$_SERVER["REQUEST_URI"]}}" class="website-alert__btn">{{$label_btn}}</a>
			</div>
		</div>
	</div>
</noscript>
@endif