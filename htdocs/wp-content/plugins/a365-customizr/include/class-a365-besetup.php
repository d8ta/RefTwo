<?php
if ( !defined( 'ABSPATH' ) ) exit;


use A365\Wordpress\Logger;


class A365BeSetup {

	protected $option_name = 'be-setup';

	public function __construct() {
		add_action('admin_init', [$this, 'admin_init']);
		add_action( 'admin_menu', [$this ,'a365_colors_menu'] );
	}

	public function admin_init() {
    	register_setting('todo_list_options', $this->option_name, array($this, 'validate'));
	}

	public function a365_colors_menu() {
		add_menu_page( 'A365 Backend Colors', 'Backend Setup', 'manage_options', 'a365-customize', [$this ,'define_besetup'], 'dashicons-admin-customizer');
	}

	public function define_besetup() {
		$options = get_option($this->option_name);
    ?>
	    <div class="wrap">
	        <h2>Backend Setup</h2>
	        <form method="post" action="<?php $this->validate();?>">
	            <table class="form-table">
	                <tr valign="top">
	                	<th scope="row">RTE.scss Link:</th>
	                    <td><input type="color" name="<?php echo $this->option_name?>[rte_url]" value="<?php echo $options['rte_url']; ?>" /></td>
	                </tr>
	                <tr valign="top">
	                	<th scope="row">Admin.scss Link:</th>
	                    <td><input type="color" name="<?php echo $this->option_name?>[admin_url]" value="<?php echo $options['admin_url']; ?>" /></td>
	                </tr>
	            </table>
	            <p class="submit">
	                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	            </p>
	        </form>
	    </div>
	<? } 

	public function validate() {
	    $valid = array();
	    $valid['rte_url'] = sanitize_text_field($_POST['rte_url']);
	    $valid['admin_url'] = sanitize_text_field($_POST['admin_url']);

	    if (strlen($valid['rte_url']) == 0) {
	        add_settings_error(
	                'becolor_maincolor',                     
	                'becolor_maincolor_texterror',           
	                'Please enter a valid color',     
	                'error'                         
	        );

	        // Set it to the default value
	        $valid['rte_url'] = $this->data['rte_url'];
	    }
	    if (strlen($valid['admin_url']) == 0) {
	        add_settings_error(
	                'becolor_textcolor',
	                'becolor_textcolor_texterror',
	                'Please enter a valid color',
	                'error'
	        );

	        $valid['admin_url'] = $this->data['admin_url'];
	    }

	    return $valid;
	}

}

new A365BeSetup();