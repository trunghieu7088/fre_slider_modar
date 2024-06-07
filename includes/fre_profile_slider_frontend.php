<?php

add_shortcode('fre_profile_slider', 'fre_profile_slider_init');

function fre_profile_slider_init()
{
    ob_start();   
    $title_slider=carbon_get_theme_option('fre_profile_slider_title_of_slider'); 
    if(!$title_slider || $title_slider=='')    
    {
        $title_slider='Top Talents';
    }
    $fre_profile_slider_list=get_active_profiles_for_slider();
    ?>
    <div class="fre-profile-slider-container">
        <div class="container-fluid fre-profile-slider-list-wrapper">
            <h2 class="fre-profile-slider-title"><?php echo $title_slider; ?></h2>
            <div class="row swiper fre-profile-slider-list">
                <div class="swiper-wrapper">
                    <?php if($fre_profile_slider_list): ?>
                        <?php foreach($fre_profile_slider_list as $fre_profile_item): ?>

                            <!-- card item -->
                            <div class="col-sm-12 col-md-2 fre-profile-slider-card swiper-slide">

                                <!-- card header -->
                                <div class="fre-profile-slider-card-header">

                                    <!-- card header rating -->
                                    <div class="fre-profile-slider-card-header-rating">
                                        <i class="fa fa-star"></i><span><?php echo $fre_profile_item->rating_score; ?></span>
                                        <span class="review-text">(<?php echo $fre_profile_item->review_count; ?>)</span>
                                    </div>

                                    <!-- card header project worked -->                                    
                                    <div class="fre-profile-slider-card-header-project-worked">
                                        <span><i class="fa fa-check-circle"></i> <?php echo $fre_profile_item->total_projects_worked; ?></span>
                                    </div>

                                </div>
                                <!-- end card header -->

                                <!-- card body -->
                                <div class="fre-profile-slider-card-body">

                                    <!-- avatar -->
                                    <div class="fre-profile-slider-card-avatar-container">
                                        <a href="<?php echo $fre_profile_item->author_url; ?>">                                           
                                           <?php echo get_avatar($fre_profile_item->user_id,130); ?>
                                        </a>
                                    </div>

                                    <!-- display name -->
                                    <div class="fre-profile-slider-card-display-name-container">
                                        <a href="<?php echo $fre_profile_item->author_url; ?>"><?php echo $fre_profile_item->name; ?></a>
                                    </div>

                                    <!-- profession -->
                                    <div class="fre-profile-slider-card-profession-container">
                                        <p><?php // echo $fre_profile_item->et_professional_title; ?> Garage</p>
                                    </div>

                                    <!-- bio -->
                                    <div class="fre-profile-slider-card-bio-container">
                                        <?php echo $fre_profile_item->bio; ?>
                                    </div>

                                    <!-- basic info -->
                                    <div class="fre-profile-slider-card-basic-info-container">
                                        <div class="fre-profile-slider-card-location-skills">
                                            <p><strong><i class="fa fa-map-marker"></i></strong> <?php echo $fre_profile_item->location; ?></p>
                                            <p class="list-skill-items"><?php echo $fre_profile_item->skills; ?></p>
                                        </div>
                                    </div>

                                </div>
                                <!--end card body -->

                                <!-- card footer -->
                                <div class="fre-profile-slider-card-footer">
                                   <!-- <div class="custom-rate-hour">
                                       <?php echo $fre_profile_item->hourly_rate; ?>
                                    </div> -->

                                    <div class="custom-year-exp">
                                        <i class="fa fa-briefcase"></i> <?php echo $fre_profile_item->exp; ?>
                                    </div>
                                </div>
                                <!-- end card footer -->

                            </div>
                            <!-- end card item -->

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
               
            </div>

            <!--  Next & Prev button -->
            <div class="fre-profile-slider-next-area">
                <i class="fa fa-chevron-right"></i>
            </div> 
            
            <div class="fre-profile-slider-prev-area">
                <i class="fa fa-chevron-left"></i>
            </div>
            <!-- End  Next & Prev button -->

        </div>    
    </div>
    <?php
    wp_reset_query();
    return ob_get_clean();
}

add_action('wp_head','handle_apply_dark_skin',900);

function handle_apply_dark_skin()
{
    if(carbon_get_theme_option('fre_profile_slider_skin')=='dark')
    {
    ?>
    <style>
        .fre-profile-slider-container
        {
            background-color:#28223f;
        }
        .fre-profile-slider-title
        {
            color:#ffffff;       
        }        
        .fre-profile-slider-list
        {
            background-color: #28223f;   
        }
        
        .fre-profile-slider-card
        {
            background-color: #231e39; 
            border:1px solid rgba(25, 21, 40, 1);
            box-shadow: 0px 4px 8px rgba(25, 21, 40, 1);    
        }
        
        .fre-profile-slider-card-header-rating .review-text
        {    
            color:#ffffff;
        }
        
        .fre-profile-slider-card-header-project-worked
        {
            color:#ffffff;
        }
        .fre-profile-slider-card-avatar-container img
        {
            border:1px solid rgb(31, 189, 189);

            padding:5px;
        }        
        .fre-profile-slider-card-display-name-container a
        {              
            color:#ffffff;
        }
        .fre-profile-slider-card-display-name-container a:hover
        {              
            color:#ffffff;
        }
        .fre-profile-slider-card-location-skills
        {           
            color:#ffffff;
        }
        
        .fre-profile-slider-card-bio-container
        {
            color:#a5aaa5;
        }
        
        .fre-profile-slider-card-footer
        {   
            background-color: #1f1a36;
        }

        .fre-profile-slider-card-footer .custom-year-exp
        {
            color:#ffffff;
        }       
    </style>
    <?php
    }
}

add_action('wp_head','fre_profile_slider_init_settings',999,0);

function fre_profile_slider_init_settings()
{
    $fre_profile_slider_options=get_fre_profile_slider_settings();
    if($fre_profile_slider_options['carousel_navigation_style']=='classic' || $fre_profile_slider_options['carousel_navigation_style']=='both')
    {
        $navigation_button='visible';
    }
    else
    {
        $navigation_button='hidden';
    }
    if($fre_profile_slider_options['carousel_navigation_style']=='newstyle' || $fre_profile_slider_options['carousel_navigation_style']=='both')
    {
        $navigation_slide_newstyle=0.1;
    }
    else
    {
        $navigation_slide_newstyle=0;
    }
    ?>
     <style>
    .fre-profile-slider-next-area, .fre-profile-slider-prev-area
    {
        visibility: <?php echo $navigation_button; ?> !important; 
    }
    </style>
    <script type="text/javascript">
         var carousel_settings={ autoPlay: <?php echo $fre_profile_slider_options['carousel_autoplay']; ?>,
                                    delay: <?php echo $fre_profile_slider_options['carousel_delay']; ?>, 
                                    loop: <?php echo $fre_profile_slider_options['carousel_loop']; ?>, 
                                    navigationStyle: '<?php echo $fre_profile_slider_options['carousel_navigation_style']; ?>', 
                                    newStyle: <?php echo $navigation_slide_newstyle; ?>,
                                    freeMode: <?php echo $fre_profile_slider_options['freeMode']; ?>, 
                                    
                                    };
            
    </script>
    <?php
}

function get_fre_profile_slider_settings()
{
    $fre_profile_slider_settings=array(
         //profile conditions
         'number_profiles'=>carbon_get_theme_option('fre_profile_slider_number_of_profiles'),
         'sort_by'=>carbon_get_theme_option('fre_profile_slider_sort_by'),
         'order'=>carbon_get_theme_option('fre_profile_slider_order'),
         'skin'=>carbon_get_theme_option('fre_profile_slider_skin'),
         

         //carousel settings
         'carousel_autoplay'=> carbon_get_theme_option('fre_profile_slider_autoplay') ? carbon_get_theme_option('fre_profile_slider_autoplay') : 'true',
         'carousel_delay'=>carbon_get_theme_option('fre_profile_slider_delay_autoplay') ? carbon_get_theme_option('fre_profile_slider_delay_autoplay') : 1000,
         'carousel_loop'=>carbon_get_theme_option('fre_profile_slider_loop') ? carbon_get_theme_option('fre_profile_slider_loop') : 'false' ,
         'carousel_navigation_style' =>carbon_get_theme_option('fre_profile_slider_carousel_navigation_style') ? carbon_get_theme_option('fre_profile_slider_carousel_navigation_style') : 'classic',
         'freeMode' =>carbon_get_theme_option('fre_profile_slider_carousel_freemode') ? carbon_get_theme_option('fre_profile_slider_carousel_freemode') : 'true',
         

    );
    return $fre_profile_slider_settings;
}

add_action('wp_head','render_custom_css',999);

function render_custom_css()
{
    $fre_slider_custom_css=carbon_get_theme_option('fre_profile_slider_custom_css');
    ?>
    <style>
        <?php echo $fre_slider_custom_css; ?>
    </style>
    <?php
    
}