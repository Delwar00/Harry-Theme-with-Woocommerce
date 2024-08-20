<?php 
   get_header(); 
?>
 <!-- postbox area start -->
 <section class="page-area grey-bg-4 pt-120 pb-120">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12 col-lg-12">
                     <div class="postbox__wrapper">
                     <?php if ( have_posts() ) :  ?>
                              <?php while ( have_posts() ) :  the_post(); ?>
                                       <?php echo get_template_part('template-parts/content','page'); ?>
                            <?php endwhile; ?>
                            <?php else: ?>
                              <?php echo get_template_part('template-parts/content-none') ?>
                     <?php endif; ?>
                        
                        <div class="tp-pagination tp-pagination-style-2 mt-20">
                           <?php harry_pagination(); ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- postbox area end -->
<?php get_footer(); ?>