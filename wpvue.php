<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              wpvue
 * @since             1.0.0
 * @package           Wpvue
 *
 * @wordpress-plugin
 * Plugin Name:       wpvue
 * Plugin URI:        wpvue
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sherif
 * Author URI:        wpvue
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpvue
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPVUE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpvue-activator.php
 */
function activate_wpvue() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpvue-activator.php';
	Wpvue_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpvue-deactivator.php
 */
function deactivate_wpvue() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpvue-deactivator.php';
	Wpvue_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpvue' );
register_deactivation_hook( __FILE__, 'deactivate_wpvue' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpvue.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

add_action('admin_menu', 'test_plugin_setup_menu');
 
function test_plugin_setup_menu(){
    add_menu_page( 'WPVUE', 'wpvue', 'manage_options', 'wpvue', 'test_init' );
}
 
function test_init(){
    echo "<div id='app'></div>";
}

function run_wpvue() {

	$plugin = new Wpvue();
	$plugin->run();

}
run_wpvue();
