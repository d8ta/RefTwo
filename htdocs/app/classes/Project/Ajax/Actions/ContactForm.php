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

	const KEY_HONEYPOT = 't_NT2GxLPEkcNmZ';

	protected function _action()
	{

		$data     = $_POST['form'];
		var_dump($data);
		$response = new \stdClass;

		if (strlen($data[self::KEY_HONEYPOT]) > 0) {
			$response->code = 1;
			return $response;
		}

		load_theme_textdomain( 'default', ABSPATH . 'app/langs' );
		
		$label_subject = __('Your Request');

		$companySubject = 'Siconnex - Neue Kontaktanfrage';
		$companyView = 'ajax.contact-form.company';
		$feedbackSubject = 'Siconnex - ' . $label_subject;
		$feedbackView = 'ajax.contact-form.feedback';

		try {

			$_config = Config::getInstance();

			$v = new Validator( $data );

			$v->rule('required', ['firstname', 'lastname', 'company', 'email', 'phone', 'message']);
			$v->rule('email', 'email');


			// if ($data['mail'] = "sales") {
			// 	$sendto = $_config->getItem('mail.to_sales');
			// }


			if (!$v->validate()) {throw new Exception('Form not correct', 10);}


			$customer_name = $data['firstname'] . ' ' . $data['lastname'];


			$templateEngine = TemplateEngine::getInstance();
			$email = Email::getInstance();
			$sendto = $_config->getItem('mail.to');

			if (preg_match("/\@a365\.at$/", $data['email'])) {
				$sendto = array($data['email'] => $customer_name);
			}

			$response->sent = $email->send(
				$sendto,
				$companySubject,
				$templateEngine->renderView( $companyView , $data)
			);

			if (isset($data['email']) && strlen($data['email'])) {
				$response->feedback = new stdClass;
				$response->feedback->sent = $email->send(
					array($data['email'] => $customer_name),
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
