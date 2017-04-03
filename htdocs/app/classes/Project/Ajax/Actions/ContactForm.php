<?php
namespace Project\Ajax\Actions;

use A365\Wordpress\Ajax\Action;
use A365\Wordpress\Ajax\Response;
use A365\Wordpress\Config;
use A365\Wordpress\Email;
use A365\Wordpress\TemplateEngine;

use Exception;
use stdClass;

use Valitron\Validator;

class ContactForm extends Action
{

	const KEY_HONEYPOT = 't_NT2GxLPEkcNmV';

	protected function _action()
	{
		$data     = $_POST['form'];
		$response = new \stdClass;

		if (strlen($data[self::KEY_HONEYPOT]) > 0) {
			$response->code = 1;
			return $response;
		}

		load_theme_textdomain( 'default', ABSPATH . 'app/langs' );
		
		$label_subject = __('Your Request');

		$companySubject = 'EAS - Neue Kontaktanfrage';
		$companyView = 'ajax.contact-form.company';
		$feedbackSubject = 'EAS - ' . $label_subject;
		$feedbackView = 'ajax.contact-form.feedback';
		

		try {

			$_config = Config::getInstance();

			$v = new Validator( $data );

			$v->rule('required', ['name', 'email', 'message']);
			$v->rule('email', 'email');

			if (!$v->validate()) {throw new Exception('Form not correct', 10);}
			

			$templateEngine = TemplateEngine::getInstance();
			$email = Email::getInstance();
			$sendto = $_config->getItem('mail.to');

			if (preg_match("/\@a365\.at$/", $data['email'])) {
				$sendto = array($data['email'] => $data['name']);
			}

			$response->sent = $email->send(
				$sendto,
				$companySubject,
				$templateEngine->renderView( $companyView , $data)
			);

			if (isset($data['email']) && strlen($data['email'])) {
				$response->feedback = new stdClass;
				$response->feedback->sent = $email->send(
					array($data['email'] => $data['name']),
					$feedbackSubject,
					$templateEngine->renderView( $feedbackView , $data)
				);
			}

			$response->code = 1;

		} catch (Exception $e) {
			$response->code = $e->getCode();
			$response->errors = $v->errors();
			$response->error = $e->getMessage();
		}

		return $response;
	}

	
}
