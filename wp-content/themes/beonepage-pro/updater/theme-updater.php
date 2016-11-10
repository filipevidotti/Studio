<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package BeOnePage
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://betheme.me',
		'item_name'      => 'BeOnePage',
		'theme_slug'     => get_template(),
		'version'        => beonepage_get_version(),
		'author'         => 'BeTheme',
		'download_id'    => '',
		'renew_url'      => ''
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'beonepage' ),
		'enter-key' => __( 'Enter your theme license key.', 'beonepage' ),
		'license-key' => __( 'License Key', 'beonepage' ),
		'license-action' => __( 'License Action', 'beonepage' ),
		'deactivate-license' => __( 'Deactivate License', 'beonepage' ),
		'activate-license' => __( 'Activate License', 'beonepage' ),
		'status-unknown' => __( 'License status is unknown.', 'beonepage' ),
		'renew' => __( 'Renew?', 'beonepage' ),
		'unlimited' => __( 'unlimited', 'beonepage' ),
		'license-key-is-active' => __( 'License key is active.', 'beonepage' ),
		'lifetime' => __( 'Lifetime', 'beonepage' ),
		'expires%s' => __( 'Expiration: %s.', 'beonepage' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'beonepage' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'beonepage' ),
		'license-key-expired' => __( 'License key has expired.', 'beonepage' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'beonepage' ),
		'license-is-inactive' => __( 'License is inactive.', 'beonepage' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'beonepage' ),
		'site-is-inactive' => __( 'Site is inactive.', 'beonepage' ),
		'license-status-unknown' => __( 'License status is unknown.', 'beonepage' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'beonepage' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'beonepage' )
	)

);