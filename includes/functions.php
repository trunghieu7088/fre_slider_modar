<?php
require('import_assets_files.php');
require('fre_profile_slider_frontend.php');
require('fre_profile_slider_backend.php');


add_action( 'after_setup_theme', 'fre_profile_slider_crb_load',999,0 );
function fre_profile_slider_crb_load() {    
    if ( ! function_exists( 'carbon_get_post_meta' ) ) {
    require_once FRE_PROFILE_SLIDER_PATH . '/includes/carbon/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
    }
}