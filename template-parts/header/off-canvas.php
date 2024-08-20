<?php 
   $off_canvas_button=get_theme_mod('off_canvas_button','Get Started');
   $off_canvas_button_url=get_theme_mod('off_canvas_button_url','#');
   $off_canvas_email=get_theme_mod('off_canvas_email','info@example.com');
   $off_canvas_phone=get_theme_mod('off_canvas_phone','+964 742 44 712');
   $button_off_on=get_theme_mod('button_off_on',true);
   $off_canvas_shape_off_on=get_theme_mod('off_canvas_shape_off_on',true);
   $harry_social_off_on_btn = get_theme_mod( 'harry_social_off_on_btn', true );
   // var_dump($harry_social_off_on_btn);
?>
<div class="offcanvas__area offcanvas__area-1">
       <div class="offcanvas__wrapper">
            <div class="offcanvas__shape">
               <?php if($off_canvas_shape_off_on) : ?>
                     <img class="offcanvas__shape-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/offcanvas-shape-1.png" alt="">
               <?php endif; ?>
            </div>
            <div class="offcanvas__close">
               <button class="offcanvas__close-btn offcanvas-close-btn">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                 </svg>
               </button>
            </div>
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo logo">
                    <?php harry_off_canvas_logo(); ?>
                  </div>
               </div>
               <div class="mobile-menu fix d-lg-none"></div>
               <div class="offcanvas__menu offcanvas__menu-ff-space d-none d-lg-block">
                  <nav>
                    <?php main_off_canvas_menu(); ?>
                  </nav>
               </div>
               <?php if(!empty($button_off_on)) : ?>
                  <?php if(!empty($off_canvas_button)) : ?>
                     <div class="offcanvas__btn">
                        <a href="<?php echo $off_canvas_button_url; ?>" class="tp-btn-offcanvas"><?php echo $off_canvas_button; ?> <i class="fa-regular fa-chevron-right"></i></a>
                     </div>
                  <?php endif; ?>
               <?php endif; ?>
               <?php if(!empty($harry_social_off_on_btn)) : ?>
                  <div class="offcanvas__social">
                     <h3 class="offcanvas__social-title"> <?php echo esc_html__('Follow : ', 'harry'); ?></h3>
                     <?php harry_off_canvas_all_social(); ?>
                  </div>
               <?php endif; ?>
               <div class="offcanvas__contact">
                  <?php if(!empty($off_canvas_phone)): ?>
                     <p class="offcanvas__contact-call">
                        <a href="tel:<?php echo esc_url($off_canvas_phone); ?>"><?php echo esc_html($off_canvas_phone); ?></a>
                     </p>
                  <?php endif; ?>
                  <?php if(!empty($off_canvas_email)): ?>
                     <p class="offcanvas__contact-mail">
                        <a href="mailto:<?php echo esc_html($off_canvas_email); ?>"><?php echo esc_html($off_canvas_email); ?></a>
                     </p>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>