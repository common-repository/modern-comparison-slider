<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/kylewetton
 * @since             1.0.0
 * @package           Modern_Comparison_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       Modern Comparison Slider
 * Description:       Compare before and after images, for grading, CGI and other retouching comparisons.
 * Version:           1.0.2
 * Author:            Kyle Wetton
 * Author URI:        https://github.com/kylewetton
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       modern-comparison-slider
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
define( 'MODERN_COMPARISON_SLIDER_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-modern-comparison-slider-activator.php
 */
function activate_modern_comparison_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-modern-comparison-slider-activator.php';
	Modern_Comparison_Slider_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-modern-comparison-slider-deactivator.php
 */
function deactivate_modern_comparison_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-modern-comparison-slider-deactivator.php';
	Modern_Comparison_Slider_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_modern_comparison_slider' );
register_deactivation_hook( __FILE__, 'deactivate_modern_comparison_slider' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-modern-comparison-slider.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_modern_comparison_slider() {

	$plugin = new Modern_Comparison_Slider();
	$plugin->run();

}
run_modern_comparison_slider();
