<?php

function harry_breadcrumb(){
    global $post;  
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','harry'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','harry'));
        $breadcrumb_show = 0;
    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) {
      $title = get_the_title();
    } 
    elseif ( is_single() && 'service' == get_post_type() ) {
      $title = get_the_title();
    } 
    elseif ( is_single() && 'product' == get_post_type() ) {
        $title = get_theme_mod( 'breadcrumb_product_details', __( 'Shop', 'harry' ) );
    } 
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'harry' ) . get_search_query();
    } 
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'harry' );
    } 
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    } 
    else {
        $title = get_the_title();
    }



    $breadcrumb_bg_img = get_theme_mod('breadcrumb_banner_mage');
    $breadcrumb_switch = function_exists('get_field') ? get_field('breadcrum_on_of') : null;
// var_dump($breadcrumb_switch);
    ?>
 <!-- breadcrumb area start -->
<?php if($breadcrumb_switch) : ?>
 <section class="breadcrumb__area pt-130 pb-115 breadcrumb__style-10 black-bg p-relative z-index-1">
            <div class="breadcrumb__bg-4 breadcrumb__bg-overlay m-img include-bg" data-background="<?php echo esc_url($breadcrumb_bg_img); ?>"></div>
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-xl-10">
                        <div class="breadcrumb__content text-center">
                           <h3 class="breadcrumb__title"><?php echo $title; ?></h3>
                           <div class="breadcrumb__list">
                           <?php if(function_exists('bcn_display'))
                                {
                                    bcn_display();
                                }
                            ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </section>
         <!-- breadcrumb area end -->
<?php endif; ?>
<?php
}


