<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'fre_profile_slider_settings', 999, 0);

function fre_profile_slider_settings()
{
  Container::make('theme_options', __('FrE Profile Slider Settings', 'crb'))
    ->set_icon('dashicons-admin-generic')
    ->set_page_menu_title('FrE Profile Slider Settings')
    ->set_page_menu_position(6)
    ->add_tab('General', array(
      Field::make('text', 'fre_profile_slider_number_of_profiles', __('Number of profiles to show'))->set_default_value(10)->set_width(25),
      Field::make('select', 'fre_profile_slider_sort_by', __('Sort by'))->set_options(array('createdDate' => 'Created date', 'highrating' => 'High Rating', 'number_project_completed' => 'Number of completed projects','number_of_bid' => 'Number of bidding'))->set_width(25),
      Field::make('select', 'fre_profile_slider_order', __('Order'))->set_options(array('asc' => 'Asc', 'desc' => 'Desc'))->set_width(25),
      Field::make('select', 'fre_profile_slider_skin', __('Skin'))->set_options(array('light' => 'light', 'dark' => 'dark'))->set_width(25),
      Field::make('radio', 'fre_profile_slider_autoplay', __('Sider Autoplay'))
        ->set_options(array(
          'true' => 'yes',
          'false' => 'no',

        ))->set_width(20),
      Field::make('text', 'fre_profile_slider_delay_autoplay', __('Slider Autoplay delay time'))->set_default_value(1000)->set_width(20),

      Field::make('radio', 'fre_profile_slider_loop', __('Slider Loop'))
        ->set_options(array(
          'true' => 'yes',
          'false' => 'no',

        ))->set_width(20),
      Field::make('select', 'fre_profile_slider_carousel_navigation_style', __('Slider Navigation Style'))->set_options(array('classic' => 'Button Navigation', 'newstyle' => 'New Style', 'both' => 'Both'))->set_width(20),

      Field::make('radio', 'fre_profile_slider_carousel_freemode', __('Fast mode'))->set_options(array('true' => 'Yes', 'false' => 'No'))->set_width(20),
      Field::make('html', 'fre_profile_slider_display_shortcode', __('Shortcode'))->set_html('<p> <strong> Shortcode </strong> </p>[fre_profile_slider]'),
      Field::make('html', 'fre_profile_slider_display_button_submit_0', __('Shortcode'))->set_html('<input type="submit" value="Save Changes" name="publish" id="publish" class="button button-primary button-large">'),
    ))

    ->add_tab('Replacing text', array(
      Field::make('text', 'fre_profile_slider_title_of_slider', __('Title of Slider'))->set_default_value('Top Talents'),
      Field::make('text', 'fre_profile_slider_pj_worked_text', __('pj worked'))->set_default_value('PJ Worked'),      
      Field::make('text', 'fre_profile_slider_skill_text', __('Skills'))->set_default_value('Skills'),
      Field::make('text', 'fre_profile_slider_expyear_text', __('Years'))->set_default_value('Years'),
      Field::make('text', 'fre_profile_slider_hourly_rate_text', __('Hourly Rate'))->set_default_value('/hr'),
      Field::make('html', 'fre_profile_slider_display_button_submit_1', __('Shortcode'))->set_html('<input type="submit" value="Save Changes" name="publish" id="publish" class="button button-primary button-large">'),
    ))

    ->add_tab('Custom CSS', array(
      Field::make('textarea', 'fre_profile_slider_custom_css', __('CSS Code'))
        ->set_rows(10),
      Field::make('html', 'fre_profile_slider_display_button_submit_2', __('Shortcode'))->set_html('<input type="submit" value="Save Changes" name="publish" id="publish" class="button button-primary button-large">'),
    ))

    ->add_tab('Support', array(
      Field::make('html', 'display_document_guide', __('Shortcode'))
        ->set_html('<h4>You can read the documentation <a target="_blank" href="https://docs.enginethemes.com/article/603-how-to-use-fre-slider-profile"> here.</a> </h4> <h4>Drop us a support ticket <a href="https://www.enginethemes.com/help/i-have-a-basic-question/" target="_blank"> here!</a></h4>'),
    ));
}

add_action('admin_head', 'hide_default_submit_button');

function hide_default_submit_button()
{
?>
  <style>
    #post-body-content #carbon_fields_container_mje_profiles_list_settings {
      width: 100% !important;
    }

    #postbox-container-1 {
      display: none !important;
    }
  </style>
<?php
}
