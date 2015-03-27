<?php

/*
 * Plugin Name: Google Analytics by DN
 * Plugin URI:  https://wordpress.org/plugins/google-analytics-by-dn/
 * Description: Add Google Analytics to your website easily and quickly
 * Version:     1.1.1
 * Author:      Daryl Ng (DN)
 * License:     GPL2 or later
  
    Copyright 2015 Daryl Ng (email : daryl.n.w.k@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'DN_GOOGLE_ANALYTICS_VERSION', '1.0' );
define( 'DN_GOOGLE_ANALYTICS__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'DN_GOOGLE_ANALYTICS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( DN_GOOGLE_ANALYTICS__PLUGIN_DIR . 'class.dn_google_analytics.php' );
$dn_google_analytics = new DN_Google_Analytics();

if ( is_admin() ) {
    require_once( DN_GOOGLE_ANALYTICS__PLUGIN_DIR . 'class.dn_google_analytics_admin.php' );
    $dn_google_analytics_admin = new DN_Google_Analytics_Admin();
}

?>
