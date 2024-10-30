<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://image-compare-viewer.netlify.app/
 * @since      1.0.0
 *
 * @package    Modern_Comparison_Slider
 * @subpackage Modern_Comparison_Slider/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Modern_Comparison_Slider
 * @subpackage Modern_Comparison_Slider/includes
 * @author     Kyle Wetton <kylewetton@me.com>
 */
class Modern_Comparison_Slider_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'modern-comparison-slider',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
