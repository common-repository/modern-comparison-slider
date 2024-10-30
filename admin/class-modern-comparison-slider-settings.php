<?php

/**
 * The admin settings functionality of the plugin.
 *
 * @link       http://
 * @since      1.0.0
 *
 * @package    Modern_Comparison_Slider
 * @subpackage Modern_Comparison_Slider/admin
 */

/**
 * The admin settings functionality of the plugin.
 *
 *
 * @package    Modern_Comparison_Slider
 * @subpackage Modern_Comparison_Slider/admin
 * @author     Kyle Wetton <kylewetton@me.com>
 */

class Modern_Comparison_Slider_Settings
{

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
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
    private $option_name = 'mcs';
    
    /**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

    }
    
    	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Modern Comparsion Slider', 'mcs' ),
			__( 'Modern Comparsion Slider', 'mcs' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}

	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/modern-comparison-slider-admin-display.php';
    }
    
    public function register_setting()
	{
	
	/**
	 * add_settings_section(
	 * $id:string,
	 * $title:string,
	 * $callback:callable,
	 * $page:string )	
	 */

	add_settings_section(
		$this->option_name . '_general',
		__( 'Global Settings', 'mcs' ),
		array( $this, $this->option_name . '_general_cb' ),
		$this->plugin_name
	);

	
	/**
	 * add_settings_field(
	 * $id:string,
	 * $title:string,
	 * $callback:callable,
	 * $page:string,
	 * $section:string,
	 * $args:array )
	 * */ 

	add_settings_field(
		$this->option_name . '_shadow',
		__( 'Control has shadow?', 'mcs' ),
		array( $this, $this->option_name . '_shadow_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_shadow' )
    );
    

    add_settings_field(
		$this->option_name . '_theme',
		__( 'Control theme', 'mcs' ),
		array( $this, $this->option_name . '_theme_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_theme' )
    );

    add_settings_field(
		$this->option_name . '_color',
		__( 'Control color', 'mcs' ),
		array( $this, $this->option_name . '_color_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_color' )
    );
    
    add_settings_field(
		$this->option_name . '_startingpoint',
		__( 'Starting point', 'mcs' ),
		array( $this, $this->option_name . '_startingpoint_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_startingpoint' )
    );

    add_settings_field(
		$this->option_name . '_hoverstart',
		__( 'Start on hover?', 'mcs' ),
		array( $this, $this->option_name . '_hoverstart_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_hoverstart' )
    );
    
    add_settings_field(
		$this->option_name . '_smoothing',
		__( 'Smoothing', 'mcs' ),
		array( $this, $this->option_name . '_smoothing_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_smoothing' )
    );

    add_settings_field(
		$this->option_name . '_smoothingamount',
		__( 'Smoothing amount', 'mcs' ),
		array( $this, $this->option_name . '_smoothingamount_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_smoothingamount' )
    );
    

	/**
	 *
	 * register_setting(
	 * $option_group:string,
	 * $option_name:string,
	 * $args:array ) 
	 */

	 
	register_setting( $this->plugin_name, $this->option_name . '_shadow');
    register_setting( $this->plugin_name, $this->option_name . '_theme', array( $this, $this->option_name . '_sanitize_theme' ) );
    register_setting( $this->plugin_name, $this->option_name . '_color');
    register_setting( $this->plugin_name, $this->option_name . '_startingpoint');
    register_setting( $this->plugin_name, $this->option_name . '_hoverstart');
    register_setting( $this->plugin_name, $this->option_name . '_smoothing');
    register_setting( $this->plugin_name, $this->option_name . '_smoothingamount');
	
	}

	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */

    public function mcs_general_cb() {
		echo '<p>' . __( 'These settings affect all comparison sliders. They can be overwritten using the shortcode options.', 'mcs' ) . '</p>';
    }
    

	public function mcs_shadow_cb() {
		/**
		 * get_option(
		 * $option:string,
		 * $default:mixed)
		 */
        $shadow = get_option( $this->option_name . '_shadow', 'on' );
        echo '<p class="default" style="margin-bottom: 1rem; font-style: italic">' . __( 'Default: Enabled', 'mcs' ) . '</p>';
		?>
			<label>
			<input type="checkbox" name="<?php echo $this->option_name . '_shadow' ?>" <?php checked( $shadow, 'on' ); ?>>
				<?php _e( 'Enable shadow', 'mcs' ); ?>
			</label>

		<?php
	}

	/**
	 * Render the radio input field for position option
	 *
	 * @since  1.0.0
	 */
	public function mcs_theme_cb() {
		/**
		 * get_option(
		 * $option:string,
		 * $default:mixed)
		 */
        $theme = get_option( $this->option_name . '_theme', 'standard' );
        echo '<p class="default" style="margin-bottom: 1rem; font-style: italic">' . __( 'Default: Standard', 'mcs' ) . '</p>';
		?>
			<fieldset>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_theme' ?>" id="<?php echo $this->option_name . '_theme' ?>" value="standard" <?php checked( $theme, 'standard' ); ?>>
					<?php _e( 'Standard', 'mcs' ); ?>
				</label>
				<br>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_theme' ?>" value="circle" <?php checked( $theme, 'circle' ); ?>>
					<?php _e( 'Circle', 'mcs' ); ?>
				</label>
			</fieldset>
		<?php
    } 

    public function mcs_color_cb() {
		/**
		 * get_option(
		 * $option:string,
		 * $default:mixed)
		 */
		$color = get_option( $this->option_name . '_color', '#FFFFFF' );
		
        echo '<p style="margin-bottom: 1rem;">' . __( 'The colour of the control', 'mcs' ) . '</p>';
        echo '<p class="default" style="margin-bottom: 1rem; font-style: italic">' . __( 'Default: #FFFFFF', 'mcs' ) . '</p>';
		echo '<input style="border: 4px solid ' . $color . '" type="text" name="' . $this->option_name . '_color' . '" id="' . $this->option_name . '_color' . '" value="' . $color . '"> ';
    }
    
    public function mcs_startingpoint_cb() {
		/**
		 * get_option(
		 * $option:string,
		 * $default:mixed)
		 */
		$startingpoint = get_option( $this->option_name . '_startingpoint', '50' );
		
        echo '<p style="margin-bottom: 1rem;">' . __( 'How much of the <em>before</em> image to initially show', 'mcs' ) . '</p>';
        echo '<p class="default" style="margin-bottom: 1rem; font-style: italic">' . __( 'Default: 50', 'mcs' ) . '</p>';
		echo '<input style="max-width: 50px; text-align: center" type="text" name="' . $this->option_name . '_startingpoint' . '" id="' . $this->option_name . '_startingpoint' . '" value="' . $startingpoint . '">%';
    }
    
    public function mcs_hoverstart_cb() {
		/**
		 * get_option(
		 * $option:string,
		 * $default:mixed)
		 */
        $hoverstart = get_option( $this->option_name . '_hoverstart', false );
        echo '<p class="default" style="margin-bottom: 1rem; font-style: italic">' . __( 'Default: Disabled', 'mcs' ) . '</p>';
		?>
			<label>
			<input type="checkbox" name="<?php echo $this->option_name . '_hoverstart' ?>" <?php checked( $hoverstart, 'on' ); ?>>
				<?php _e( 'Enable start on hover', 'mcs' ); ?>
			</label>

		<?php
	}

    public function mcs_smoothing_cb() {
		/**
		 * get_option(
		 * $option:string,
		 * $default:mixed)
		 */
        $smoothing = get_option( $this->option_name . '_smoothing', 'on' );
        echo '<p style="margin-bottom: 1rem;">' . __( 'Smoothing dampens the slider slightly to create a smoother experience. Note: This is automatically disabled on mobile and Safari', 'mcs' ) . '</p>';
        echo '<p class="default" style="margin-bottom: 1rem; font-style: italic">' . __( 'Default: Enabled', 'mcs' ) . '</p>';
		?>
            
			<label>
			<input type="checkbox" name="<?php echo $this->option_name . '_smoothing' ?>" <?php checked( $smoothing, 'on' ); ?>>
				<?php _e( 'Enable smoothing', 'mcs' ); ?>
			</label>

		<?php
    }
    
    public function mcs_smoothingamount_cb() {
		/**
		 * get_option(
		 * $option:string,
		 * $default:mixed)
		 */
		$smoothingamount = get_option( $this->option_name . '_smoothingamount', '100' );
		
        echo '<p style="margin-bottom: 1rem;">' . __( 'A higher number causes more dampening', 'mcs' ) . '</p>';
        echo '<p class="default" style="margin-bottom: 1rem; font-style: italic">' . __( 'Default: 100', 'mcs' ) . '</p>';
		echo '<input style="max-width: 50px; text-align: center" type="text" name="' . $this->option_name . '_smoothingamount' . '" id="' . $this->option_name . '_smoothingamount' . '" value="' . $smoothingamount . '">ms';
	}

	/**
	 * Sanitize the text position value before being saved to database
	 *
	 * @param  string $position $_POST value
	 * @since  1.0.0
	 * @return string           Sanitized value
	 */
	public function mcs_sanitize_theme( $theme ) {
		if ( in_array( $theme, array( 'standard', 'circle' ), true ) ) {
	        return $theme;
	    }
	}
}