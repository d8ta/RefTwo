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

				<div class="site-footer__socialmedia">
					<a href="https://www.facebook.com/Siconnex-Customized-Solutions-GmbH-127255930706487/" target="_blank" class="site-footer__socialmedia__facebook">
					</a>
					<a href="https://www.linkedin.com/company/siconnex/" target="_blank" class="site-footer__socialmedia__linkedin">
					</a>				
					<a href="https://www.xing.com/companies/siconnexcustomizedsolutionsgmbh" target="_blank" class="site-footer__socialmedia__xing">
					</a>
				</div>

			</div>
			<div class="site-footer__table__col">
				@include('components.footer.navigation')
			</div>
		</div>
	</div>
	<div class="site-footer__img"></div>
</footer>