<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://image-compare-viewer.netlify.app/
 * @since      1.0.0
 *
 * @package    Modern_Comparison_Slider
 * @subpackage Modern_Comparison_Slider/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="frame">

<h1 style="margin-top: 0;"><img src="<?php echo plugin_dir_url(__FILE__) . 'assets/mcs.png'; ?>" alt="<?php echo esc_html( get_admin_page_title() ); ?>" /></h1>

	<form action="options.php" method="post">
	        <?php
	            settings_fields( $this->plugin_name );
	            do_settings_sections( $this->plugin_name );
	            submit_button();
	        ?>
	    </form>


	    

	 
	</div>