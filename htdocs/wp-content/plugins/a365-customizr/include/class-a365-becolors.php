<?php
if ( !defined( 'ABSPATH' ) ) exit;


use A365\Wordpress\Logger;


class A365Becolors {

	protected $option_name = 'be-colors';

	protected $data = array(
    	'main_color' => '#000000',
    	'text_color' => '#ffffff'
	);

	public function __construct() {
		add_action('admin_init', [$this, 'admin_init']);
		add_action( 'admin_menu', [$this ,'a365_colors_menu'] );
	}

	public function admin_init() {
    	register_setting('todo_list_options', $this->option_name, array($this, 'validate'));
	}

	public function a365_colors_menu() {
		add_menu_page( 'A365 Backend Colors', 'Backend Setup', 'manage_options', 'a365-customize', [$this ,'define_becolors'], 'dashicons-admin-customizer');
	}

	public function define_becolors() {
		$options = get_option($this->option_name);
    ?>
	    <div class="wrap">
	        <h2>Backend Setup</h2>
	        <form method="post" action="options.php">
	            <?php settings_fields('todo_list_options'); ?>
	            <table class="form-table">
	                <tr valign="top"><th scope="row">Hauptfarbe:</th>
	                    <td><input type="text" name="<?php echo $this->option_name?>[main_color]" value="<?php echo $options['main_color']; ?>" /></td>
	                </tr>
	                <tr valign="top"><th scope="row">Textfarbe:</th>
	                    <td><input type="text" name="<?php echo $this->option_name?>[text_color]" value="<?php echo $options['text_color']; ?>" /></td>
	                </tr>
	            </table>
	            <p class="submit">
	                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	            </p>
	        </form>
	    </div>
	<? } 

	public function validate($input) {

	    $valid = array();
	    $valid['main_color'] = sanitize_text_field($input['main_color']);
	    $valid['text_color'] = sanitize_text_field($input['text_color']);

	    if (strlen($valid['main_color']) == 0) {
	        add_settings_error(
	                'becolor_maincolor',                     
	                'becolor_maincolor_texterror',           
	                'Please enter a valid color',     
	                'error'                         
	        );

	        // Set it to the default value
	        $valid['main_color'] = $this->data['main_color'];
	    }
	    if (strlen($valid['text_color']) == 0) {
	        add_settings_error(
	                'becolor_textcolor',
	                'becolor_textcolor_texterror',
	                'Please enter a valid color',
	                'error'
	        );

	        $valid['text_color'] = $this->data['text_color'];
	    }

	    return $valid;
	}

}

new A365Becolors();