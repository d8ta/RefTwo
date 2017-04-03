<?php
$config = [
	'type' => 'incompatible_browser'
];
$label_old_browser = __('You are using an incompatible browser.');
$label_modern = __('Modern Browsers are');
?>


<div class="website-alert website-alert--browser js-alert" data-config='{!!json_encode($config)!!}'>
	<div class="table">
		<div class="table__td">
			<div class="logo">
				<img src="assets/images/logo/rieder-logo.png" alt="{{get_bloginfo()}}">
			</div>
			<div class="h2">{{$label_old_browser}}</div>
			<p>{{$label_modern}}:</p>

			<table>
				<tr>
					<td>
						<a href="http://www.firefox.com/" target="_blank">
							<div class="website-alert__image">
								<img src="assets/images/browser/firefox.png" alt="Mozilla Firefox"/>
							</div>
							<p>Mozilla Firefox</p>
						</a>
					</td>
					<td>
						<a href="http://www.google.com/chrome" target="_blank">
							<div class="website-alert__image">
								<img src="assets/images/browser/chrome.png" alt="Mozilla Firefox"/>
							</div>
							<p>Google Chrome</p>
						</a>
					</td>
				</tr>
			</table>

		</div>
	</div>
</div>