<?php
add_action('wp_enqueue_scripts', 'addAssetsFiles',9999);
function addAssetsFiles()
{
    wp_enqueue_script('fre-profile-slider-swiper-js', FRE_PROFILE_SLIDER_URL.'assets/js/swiper.js', array(), FRE_PROFILE_SLIDER_VERSION );

    wp_enqueue_script('fre-profile-slider-js', FRE_PROFILE_SLIDER_URL.'assets/js/fre-profile-slider.js', array(), FRE_PROFILE_SLIDER_VERSION);
    
    wp_enqueue_style('fre-swiper-css', FRE_PROFILE_SLIDER_URL.'assets/css/swiper.css', array(), FRE_PROFILE_SLIDER_VERSION);

    wp_enqueue_style( 'fre-profile-slider-style', FRE_PROFILE_SLIDER_URL. 'assets/css/fre-profile-slider.css', array(), FRE_PROFILE_SLIDER_VERSION ) ;
 
}
