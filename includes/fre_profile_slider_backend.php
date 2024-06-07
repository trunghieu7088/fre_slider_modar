<?php

function convert_fre_profile_slider($fre_profile)
{
    $profile_owner=get_userdata($fre_profile->post_author);

    $converted_fre_profile['user_id']=$profile_owner->ID;
    $converted_fre_profile['avatar']=get_avatar_url($profile_owner->ID,['size'=>'130']);
    $converted_fre_profile['name']=$profile_owner->display_name;
    $converted_fre_profile['et_professional_title']=get_post_meta($fre_profile->ID,'et_professional_title',true) ? get_post_meta($fre_profile->ID,'et_professional_title',true) : 'None';
    
    $total_project_works=get_post_meta($fre_profile->ID,'total_projects_worked',true) ? get_post_meta($fre_profile->ID,'total_projects_worked',true) : '0';
    $converted_fre_profile['total_projects_worked']=$total_project_works.' '.carbon_get_theme_option('fre_profile_slider_pj_worked_text');
    $converted_fre_profile['total_projects_worked_count']=(int)$total_project_works;
    
    $converted_fre_profile['bio']=wp_trim_words($fre_profile->post_content,18,'..');

    $location=wp_get_post_terms($fre_profile->ID,'country',array( 'fields' => 'names'));
    $converted_fre_profile['location']=$location[0];

    $skills=wp_get_post_terms($fre_profile->ID,'skill',array( 'fields' => 'names'));
    $converted_fre_profile['skills']=implode(', ',$skills);

    $currency = ae_get_option('currency', array(
        'align' => 'left',
        'code'  => 'USD',
        'icon'  => '$'
    ));
    $hourly_rate=get_post_meta($fre_profile->ID,'hour_rate',true) ? get_post_meta($fre_profile->ID,'hour_rate',true) : '0';
    $hourly_rate_label=carbon_get_theme_option('fre_profile_slider_hourly_rate_text');    
    $converted_fre_profile['hourly_rate']='<strong>'.fre_price_format($hourly_rate).'</strong>'.$hourly_rate_label;

    $year_exp=get_post_meta($fre_profile->ID,'et_experience',true) ? get_post_meta($fre_profile->ID,'et_experience',true) : '0';
    $converted_fre_profile['exp']=$year_exp.' '.carbon_get_theme_option('fre_profile_slider_expyear_text');

    $converted_fre_profile['author_url']=get_author_posts_url($fre_profile->post_author);

    $rating = array('rating_score' => 0, 'review_count' => 0);
    $rating = Fre_Review::freelancer_rating_score($fre_profile->post_author);
    $converted_fre_profile['rating_score']= $rating['rating_score'] ? $rating['rating_score'] : 0 ;
    $converted_fre_profile['review_count']= $rating['review_count'] ? $rating['review_count'] : 0;
       
    
    
    return (object)$converted_fre_profile;
}

function get_active_profiles_for_slider()
{
    global $post;    
    $fre_profile_slider=get_fre_profile_slider_settings();

    $number_of_profiles=$fre_profile_slider['number_profiles'];
    
    $sort_by=$fre_profile_slider['sort_by'];    
    $order=$fre_profile_slider['order'];
    if(!$order)
    {
        $order='desc';
    }
    if(!$sort_by)
    {
        $sort_by='createdDate';
    }

    $args_profiles=array('post_type' => 'fre_profile',
                        'posts_per_page' =>  $number_of_profiles,           
                        'post_status'   => 'publish',
                        'order'=>  $order,
                        'orderby'=> 'date',
                         //add this meta query to make sure only get freelancers and complete profiles
                        'meta_query'=> array(
                                    array(
                                        'key'=>'et_professional_title',
                                        'compare'=>'EXISTS'
                                    ),
                            ),                         
                        );
    
   

    $profiles_query=new WP_Query($args_profiles);

    $fre_profile_list=array();

    if($profiles_query->have_posts())
    {
        while($profiles_query->have_posts())
        {
            $profiles_query->the_post();
            $converted_profile=convert_fre_profile_slider($post);
            $fre_profile_list[]=$converted_profile;
        }          
    }
    wp_reset_postdata();

    if($sort_by=='highrating')
    {
        if($order=='asc')
        {
            usort($fre_profile_list,'compareRatingScoreASC');
        }
        if($order=='desc')
        {
            usort($fre_profile_list,'compareRatingScoreDESC');
        }
        
    }
    if($sort_by=='number_project_completed')    
    {
        if($order=='asc')
        {
            usort($fre_profile_list,'compareNumberPJ_Worked_ASC');
        }
        if($order=='desc')
        {
            usort($fre_profile_list,'compareNumberPJ_Worked_DESC');
        }
       
    }
    
    return $fre_profile_list;
}

function compareRatingScoreASC($item1,$item2)
{
    return $item1->rating_score - $item2->rating_score;
   
}

function compareRatingScoreDESC($item1,$item2)
{
    return $item2->rating_score - $item1->rating_score;
   
}

function compareNumberPJ_Worked_ASC($item1,$item2)
{
    return $item1->total_projects_worked_count - $item2->total_projects_worked_count;
}

function compareNumberPJ_Worked_DESC($item1,$item2)
{
    return $item2->total_projects_worked_count - $item1->total_projects_worked_count;
}
