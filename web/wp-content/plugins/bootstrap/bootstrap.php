<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.cargocollective.com/daogilles
 * @since             1.0.0
 * @package           Bootstrap
 *
 * @wordpress-plugin
 * Plugin Name:       bootstrap
 * Plugin URI:        cordiva.dev
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Dao Duc Gilles
 * Author URI:        www.cargocollective.com/daogilles
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bootstrap
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bootstrap-activator.php
 */
function activate_bootstrap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bootstrap-activator.php';
	Bootstrap_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bootstrap-deactivator.php
 */
function deactivate_bootstrap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bootstrap-deactivator.php';
	Bootstrap_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bootstrap' );
register_deactivation_hook( __FILE__, 'deactivate_bootstrap' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bootstrap.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bootstrap() {

	$plugin = new Bootstrap();
	$plugin->run();

}
run_bootstrap();
