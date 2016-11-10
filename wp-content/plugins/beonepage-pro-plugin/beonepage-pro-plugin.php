<?php
/*
Plugin Name: BeOnePage Pro Plugin
Description: This plugin is required for BeOnePage Pro theme.
Author:      BeTheme
Version:     1.1.2
Author URI:  http://betheme.me/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: beonepage
*/

class beOnePageProPlugin {
    public static function init() {
        $class = __CLASS__;

        new $class;
    }

    public function __construct() {
		// Add Custom Menu plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/custom-menu/array-column.php';
		require_once plugin_dir_path( __FILE__ ) . 'inc/custom-menu/menu-item-custom-field.php';

		// Add Custom Post Type plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/cpt/CPT.php';
		require_once plugin_dir_path( __FILE__ ) . 'inc/cpt/portfolio-post-type.php';

		// Add Custom Meta Box 2 plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/cmb2/CMB.php';

		// Add TwitterOAuth plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/twitteroauth/autoload.php';

		// Add MailChimp plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/mailchimp/mailchimp.php';
    }
}
add_action( 'plugins_loaded', array( 'beOnePageProPlugin', 'init' ) );

?>