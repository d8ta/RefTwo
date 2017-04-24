<?php
$navigation = new Project\Sections\Footer\Navigation;
?>
<footer>
	<div class="footer">
		<div class="footer__inner">
			{!!$navigation->toHtml()!!}
		</div>
	</div>
	<div class="footer footer">
		<div class="footer__inner footer__inner--address">
			@include('components.footer.address')
		</div>
	</div>
</footer>