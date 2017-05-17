<?php
	/**
	 * @var \Project\Sections\ContactLocations $block
	 */
	$headline = $block->getHeadline();

	$_ajaxHelper   = A365\Wordpress\Helpers\Ajax::getInstance();
	$keyHoneyPot   = \Project\Ajax\Actions\ContactForm::KEY_HONEYPOT;

	$formHelper = Project\Helpers\FormHelper::getInstance();
?>
	
<section class="section section--margin contact-locations">
	<div class="section__content">
		<h2 class="h1">{{$headline}}</h2>
		
		<div class="contact-form__content">
		
			<form class="form js-ajax-form js-validate" action="{!!$_ajaxHelper->getUrl('contact-form')!!}" method="POST" data-name='Kontaktformular'>
				<div class="form__fields">

					
					<?php
						echo $formHelper->getFormField("firstname", __('First Name'));
						echo $formHelper->getFormField("lastname", __('Last Name'));
						echo $formHelper->getFormField("company", __('Company'));
						echo $formHelper->getFormField("email", __('E-Mail'), ["type" => "email"]);
						echo $formHelper->getFormField("message", __('Message'), ["type" => "textarea", "size" => "full"]);
						echo $formHelper->getHoneyField();
					?>
					

					<input type="hidden" name="form[lang]" value="<?php echo get_locale(); ?>">
					<div class="form__fields__row">
						<div class="form__fields__row__input">
							<button class="btn" type="submit">
								<?php echo __('Send Form'); ?>
							</button>
						</div>
					</div>
				</div>
				<div class="form__success">
					<h3 class="h3"><?php echo __('Thank you for your message.'); ?></h3>
				</div>
			</form>
		</div>

		
	</div>
</section>