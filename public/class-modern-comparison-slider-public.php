<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://image-compare-viewer.netlify.app/
 * @since      1.0.0
 *
 * @package    Modern_Comparison_Slider
 * @subpackage Modern_Comparison_Slider/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Modern_Comparison_Slider
 * @subpackage Modern_Comparison_Slider/public
 * @author     Kyle Wetton <kylewetton@me.com>
 */
class Modern_Comparison_Slider_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $globalSettings ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->globalSettings = $globalSettings;
		
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Modern_Comparison_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Modern_Comparison_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/modern-comparison-slider-public.css', array(), $this->version, 'all' );

	}

	public function build_view($atts = [], $content = null, $tag = '') {
		// normalize attribute keys, lowercase
		$atts = array_change_key_case((array)$atts, CASE_LOWER);
 
		// override default attributes with user attributes

		$o = '<div class="image-compare-viewer" ';

		foreach($atts as $key=>$opt){
			$o .= 'data-' . $key . '="' . $opt . '"';
		  }

		// $o .= 'data-shadow="' . $compare_atts['shadow'] . '"';
		// $o .= ' data-circle="' . $compare_atts['circle'] . '"';
		// $o .= ' data-color="' . $compare_atts['color'] . '"';
		// $o .= ' data-startingpoint="' . $compare_atts['starting-point'] . '"';
		// $o .= ' data-hoverstart="' . $compare_atts['hover-start'] . '"';
		// $o .= ' data-smoothing="' . $compare_atts['smoothing'] . '"';
		// $o .= ' data-smoothingamount="' . $compare_atts['smoothing-amount'] . '"';

		$o .= '>';
		$o .= $content ;
		$o .= '</div>';
									 
		return $o;
	}


	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Modern_Comparison_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Modern_Comparison_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		wp_enqueue_script( $this->plugin_name . '_base', plugin_dir_url( __FILE__ ) . 'js/image-compare-viewer.min.js', array( ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_public', plugin_dir_url( __FILE__ ) . 'js/modern-comparison-slider-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name . '_public', 'mcswp', $this->globalSettings);
	}

}
