<?php

/**
 *
 * @link              https://www.enginethemes.com
 * @since             1.0.0
 * @package           Fre_Profile_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       FrE Profile Slider
 * Plugin URI:        https://www.enginethemes.com
 * Description:       A FreelanceEngine extension to easily showcase your best talent and boost engagement with a beautiful, customizable homepage slider.
 * Version:           1.0.0
 * Author:            Hieu Lam
 * Author URI:        https://www.enginethemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fre-profile-slider
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('FRE_PROFILE_SLIDER_VERSION', '1.0.0');

//custom code
define('FRE_PROFILE_SLIDER_PATH', dirname(__FILE__));
define('FRE_PROFILE_SLIDER_URL', plugin_dir_url(__FILE__));
//end

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fre-profile-slider-activator.php
 */
function activate_fre_profile_slider()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-fre-profile-slider-activator.php';
	Fre_Profile_Slider_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fre-profile-slider-deactivator.php
 */
function deactivate_fre_profile_slider()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-fre-profile-slider-deactivator.php';
	Fre_Profile_Slider_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_fre_profile_slider');
register_deactivation_hook(__FILE__, 'deactivate_fre_profile_slider');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-fre-profile-slider.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fre_profile_slider()
{

	$plugin = new Fre_Profile_Slider();
	$plugin->run();
}
run_fre_profile_slider();

//custom code
function require_fre_slider_profile_core_files()
{
	require_once FRE_PROFILE_SLIDER_PATH . '/includes/functions.php';
	require_once FRE_PROFILE_SLIDER_PATH . '/admin/settings.php';
	// if (is_admin()) {
	// 	require_once FRE_PROFILE_SLIDER_PATH  . '/update.php';
	// }
}
add_action('after_setup_theme', 'require_fre_slider_profile_core_files'); 

//end