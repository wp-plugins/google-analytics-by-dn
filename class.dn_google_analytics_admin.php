<?php

class DN_Google_Analytics_Admin {

    private $options;

    function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function add_plugin_page() {
        add_options_page( 'Settings Admin',
                          'Google Analytics',
                          'manage_options',
                          'settings_section',
                          array( $this, 'create_admin_page' ) 
        );
    }

    function create_admin_page() {
        // set class property
        $this->options = get_option( 'dn_google_analytics_settings_option' );
        ?>
            <div class="wrap">
                <h2>Google Analytics by DN</h2>
                <form method="post" action="options.php">
                <?php
                    settings_fields( 'dn_google_analytics_settings_option_group' );
                    do_settings_sections( 'settings_section' );

                    submit_button();
                ?>
                </form>
            </div>
        <?php
    }

    public function page_init() {
        register_setting( 'dn_google_analytics_settings_option_group',   // Option group
                          'dn_google_analytics_settings_option',         // Option name
                          array( $this, 'sanitize')                      // Sanitize
        );

        add_settings_section( 'page_section',                            // Section ID
                              'Settings',                                // Title
                              array( $this, 'print_plugin_info' ),       // Callback
                              'settings_section'                         // Page
        );

        // Tracking ID
        add_settings_field( 'tracking_id',                               // ID
                            'Tracking ID',                               // Title
                            array( $this, 'tracking_id_callback' ),      // Callback
                            'settings_section',                          // Page
                            'page_section'                               // Section ID
        );

        // Anonymize IP
        add_settings_field( 'anonymize_ip',                              // ID
                            'Anonymize IP',                              // Title
                            array( $this, 'anonymize_ip_callback' ),     // Callback
                            'settings_section',                          // Page
                            'page_section'                               // Section ID
        );
    }

    public function print_plugin_info() {
        $html = 'Note: Google Analytics will not appear when Tracking ID is empty';
        echo $html;
    }

    public function tracking_id_callback() {
        printf('
        <label for="tracking_id_input" style="display:none;"><b>Tracking ID: </b></label>
        <input type="text" placeholder="Eg. UA-XXXXX-XX" id="tracking_id" name="dn_google_analytics_settings_option[tracking_id]" value="%s" />',
        isset( $this->options['tracking_id'] ) ? esc_attr( $this->options['tracking_id'] ) : ''
        );
    }

    public function anonymize_ip_callback() {
        $this->options = get_option( 'dn_google_analytics_settings_option' );
        // $html = '<p>Anonymize your users\' ip to protect their privacy</p>';
        $html = '<input type="checkbox" id="anonymize_ip" name="dn_google_analytics_settings_option[anonymize_ip]" value="1" ' . checked( 1, $this->options['anonymize_ip'], false ) . '/>';
        $html .= '<label for="anonymize_ip">check to activate</label>';
        
        echo $html;
    }

    public function sanitize( $input ) {
        $output = array();
         
        foreach( $input as $key => $value ) {
            // Check to see if the current option has a value. If so, process it.
            if( isset( $input[$key] ) ) {
                $output[$key] = strip_tags( stripslashes( $input[ $key ] ) );  // Strip all HTML and PHP tags and properly handle quoted strings
            }
        }
         
        // Return the array processing any additional functions filtered by this action
        return apply_filters( 'sanitize', $output, $input );
    }
}

?>