<!doctype html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
      <?php endif;?>
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      

      <?php wp_head(); ?> 


   </head>
   <body <?php body_class(); ?>>
      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->
      <!-- pre loader area start -->


      <!-- <div id="loading">
         <div id="loading-center">
            <div id="loading-center-absolute">
               <div class="preloader__content text-center">
                  <div class="preloader__logo">
                     <img src="assets/img/logo/logo-preloader.svg" alt="">
                  </div>
                  <div id="tp-loading-bar" class="preloader__bar">
                     <div id="tp-loading-line" class="preloader__bar-inner"></div>
                  </div>
                  <h3 class="preloader__title">harry</h3>
                  <div class="preloader__with-text ">
                     <div class="preloader__with-text-wrapper">
                         <span data-text-preloader="h" class="preloader__title-2">h</span>
                         <span data-text-preloader="a" class="preloader__title-2">a</span>
                         <span data-text-preloader="r" class="preloader__title-2">r</span>
                         <span data-text-preloader="r" class="preloader__title-2">r</span>
                         <span data-text-preloader="y" class="preloader__title-2">y</span>
                     </div>
                 </div>
                  <p class="preloader__loading">Loading</p>
               </div>
            </div>
         </div>  
      </div> -->
      <!-- pre loader area end -->

      <!-- back to top start -->
      <div class="back-to-top-wrapper">
         <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>               
         </button>
      </div>
      <!-- back to top end -->
      <?php harry_header(); ?>
      <?php harry_breadcrumb(); ?>