<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (class_exists('AE_Plugin_Updater')) {
    class FrE_Profile_Slider_Updater extends AE_Plugin_Updater
    {
        const VERSION = FRE_PROFILE_SLIDER_VERSION;
        const SLUG = 'fre_profile_slider';
        public function __construct()
        {
            $this->product_slug     = plugin_basename(dirname(__FILE__) . 'fre-profile-slider.php');
            $this->slug             = self::SLUG;
            $this->license_key         = get_option('et_license_key', '');
            $this->current_version     = self::VERSION;
            $this->update_path         = 'https://update.enginethemes.com/?do=product-update&product=' . self::SLUG . '&type=plugin';
            parent::__construct();
        }
    }

    new FrE_Profile_Slider_Updater();
}
