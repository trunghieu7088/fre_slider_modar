<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://enginethemes.com
 * @since      1.0.0
 *
 * @package    Fre_Profile_Slider
 * @subpackage Fre_Profile_Slider/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Fre_Profile_Slider
 * @subpackage Fre_Profile_Slider/includes
 * @author     Hieu Lam <lamtrunghieu366@gmail.com>
 */
class Fre_Profile_Slider_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'fre-profile-slider',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
