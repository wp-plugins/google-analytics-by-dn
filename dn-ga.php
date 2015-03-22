<?php

/**
 * Plugin Name: Google Analytics by DN
 * Description: This plugin allows the user to add Google Analytics easily 
 * Version: 1.0
 * Author: Daryl Ng (DN)
 * License: GPL2 or later
 */

/*  Copyright 2015 Daryl Ng (email : daryl.n.w.k@gmail.com)

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

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'DN_GA_VERSION', '1.0.0' );
define( 'DN_GA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'DN_GA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( DN_GA_PLUGIN_DIR . 'dn-ga-track.php' );

if ( is_admin() ) {
    add_action( 'admin_menu', 'dn_ga_admin' );
    require_once( DN_GA_PLUGIN_DIR . 'dn-ga-admin.php' );
}

function dn_ga_admin() {
    add_menu_page( 'Google Analytics', 'Google Analytics', 'administrator', 'dn-ga-admin', 'dn_ga_admin_display' );
}

?>