<footer class="section site-footer">
	<div class="section__content">
		<div class="site-footer__table">
			<div class="site-footer__table__col site-footer__table__col--address">
				<div class="site-footer__address">
					@include('components.footer.address')
				</div>
				<div class="site-footer__copy">
					&copy; {{date("Y")}} Siconnex GmbH
				</div>
			</div>
			<div class="site-footer__table__col">
				@include('components.footer.navigation')
			</div>
		</div>
	</div>
	<div class="site-footer__img"></div>
</footer>