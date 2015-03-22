<?php

function dn_ga_admin_display() {

?>

<div class="wrap">
<h2>Google Analytics by DN</h2>
<form method="post" action="options.php">

<?php

settings_fields( 'dn_ga_settings_option' );
do_settings_sections( 'dn_ga_settings_section' );

if (get_option( 'dn_ga_tracking_id' ) != null) {
	submit_button( 'Change' , 'primary', 'submit', false, 'NULL' );
} else {
	submit_button( 'Submit' , 'primary', 'submit', false, 'NULL' );
}

?>

</form>
</div>

<?php

}

function dn_ga_settings() {
	register_setting( 'dn_ga_settings_option', 
                      'dn_ga_tracking_id', 
                      'sanitize_input' );

	add_settings_section( 'dn_ga_settings_main_section', 
		                  'Tracking ID', 
		                  'dn_ga_settings_text', 
		                  'dn_ga_settings_section' );
} 

if ( is_admin() ) {
	add_action( 'admin_init', 'dn_ga_settings' );
}

function dn_ga_settings_text() {

?>

<p>Note: Google Analytics will not appear when input field is blank.</p>
<label for="dn-ga-tracking-id-input" style="display:none;"><b>Tracking ID: </b></label>
<input type="text" placeholder="Eg. UA-XXXXX-XX" id="dn-ga-tracking-id-input" name="dn_ga_tracking_id" value="<?php esc_attr( get_option( 'dn_ga_tracking_id' ) ) ?>" />

<?php

}

function sanitize_input( $input ) {
	$input = sanitize_text_field( $input );
	return $input;
}

?>