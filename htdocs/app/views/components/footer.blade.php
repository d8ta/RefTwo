<?php
$navigation = new Project\Sections\Footer\Navigation;
?>
	
<footer>
	<div class="section__content">
		<div class="footer">
			<div class="footer__inner">
				{{-- {!!$navigation->toHtml()!!} --}}
			</div>
		</div>
		<div class="footer footer">
			<div class="footer__inner footer__inner--address">
				@include('components.footer.address')
			</div>
		</div>
	</div>
	<div class="footer__inner--waveimage">	
		<img src="/assets/images/layout/wave@2x.png" width="100%" alt="wave">
	</div>
</footer>