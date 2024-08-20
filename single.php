<?php 
   get_header(); 
   $post_col=is_active_sidebar( 'blog-sidebar' ) ? 'col-xxl-8 col-lg-8' : 'col-xxl-12 col-lg-12';
?>
 <!-- postbox details area start -->
 <section class="tp-standard-post-format postbox__area grey-bg-4 pt-120 pb-120">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="postbox__wrappers">
                        <div class="postbox__mains">
                           <div class="row">
                              <div class="<?php echo esc_attr( $post_col ); ?>">
                                 <div class="postbox__main-wrapper">
                                 <?php if ( have_posts() ) : ?>
                              <?php while ( have_posts() ) : the_post(); ?> 
                              <?php echo get_template_part( 'template-parts/content' , get_post_format() ); 
                                 $prev_post = get_previous_post();
                                 $next_post = get_next_post();
                           
                              ?>

                             <?php if(!empty($prev_post) && !empty($next_post))  : ?>
                                     <div class="postbox__more-navigation white-bg d-none d-md-flex justify-content-between flex-wrap mb-40">
                                       <div class="postbox__more-left d-flex align-items-center">
                                          <div class="postbox__more-icon">
                                             <a href="<?php echo get_the_permalink( $prev_post ); ?>">
                                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M7 12.9718L2.06061 8.04401C1.47727 7.46205 1.47727 6.50975 2.06061 5.92778L7 1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                             </a>
                                          </div>
                                          <div class="postbox__more-content">
                                             <p>Previous Article</p>
                                             <h4>
                                                <a href="<?php echo get_the_permalink( $prev_post ); ?>"><?php echo get_the_title( $prev_post ); ?></a>
                                             </h4>
                                          </div>
                                       </div>
                                       <div class="postbox__more-right d-flex align-items-center">
                                          <div class="postbox__more-content">
                                             <p>Next Article</p>
                                             <h4>
                                                <a href="<?php echo get_the_permalink( $next_post ); ?>"><?php echo get_the_title( $next_post ); ?></a>
                                             </h4>
                                          </div>
                                          <div class="postbox__more-icon">
                                             <a href="<?php echo get_the_permalink( $next_post ); ?>">
                                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M1 12.9718L5.93939 8.04401C6.52273 7.46205 6.52273 6.50975 5.93939 5.92778L1 1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>                                                      
                                             </a>
                                          </div>
                                       </div>
                                    </div> 
                                    <?php echo get_template_part('template-parts/biography'); ?>
                                    
                                    <?php endif; ?>

                                    <?php endwhile; ?>
                                    <?php else: ?>
                                    <?php echo get_template_part('template-parts/content-none') ?>
                                    <?php endif; ?>

                                    <div class="postbox__related mb-65">
                                       <h3 class="postbox__related-title">You may also like</h3>

                                       <div class="row">
                                       <?php
                                    // Get the current post ID
                                    $current_post_id = get_the_ID();

                                    // Get the categories of the current post
                                    $categories = get_the_category($current_post_id);


                                    // If the post has categories, get related posts based on the first category
                                    if ($categories) :
                                       // $category_id = $categories[0]->term_id;

                                       $related_cat = [];
                                       foreach ($categories as $category) {
                                          $related_cat[] = $category->term_id;
                                       }

                                       // Define custom query parameters
                                       $args = array(
                                             'post_type' => 'post', // Adjust post type if needed
                                             'posts_per_page' => 2, // Number of related posts to display
                                             'post__not_in' => array($current_post_id), // Exclude the current post
                                             'category__in' => $related_cat, // Include posts from the current post's category
                                             'orderby' => 'rand', // Order by random; you can adjust this based on your preference
                                       );



                                       $related_posts_query = new WP_Query($args);

                                       if ($related_posts_query->have_posts()) :
                                             while ($related_posts_query->have_posts()) :
                                                $related_posts_query->the_post();

                                                $author_id = get_the_author_meta('ID');
                                                // Get the author's avatar
                                                $author_avatar =  25;
                                                $categories = get_the_category();
                                               
                                    ?>
                                          <div class="col-xl-6 col-lg-12 col-md-6">
                                             <div class="blog__grid-item">
                                                <div class="blog__item-10 white-bg transition-3 mb-30 fix">
                                                   <div class="blog__thumb-10 w-img fix">
                                                      <a href="<?php the_permalink( ); ?>">
                                                      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo the_post_thumbnail_caption(); ?>">
                                                      </a>
                                                      <?php if (!empty($categories)) : ?>
                                                      <div class="blog__tag-10">
                                                          <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a>
                                                      </div>
                                                      <?php endif; ?>
                                                   </div>
                                                   <div class="blog__content-10">
                                                      <div class="blog__content-10-top">
                                                         <div class="blog__meta-10-wrapper d-flex align-items-center">
                                                            <div class="blog__meta-10 has-date">
                                                               <span>
                                                                  <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                     <path d="M7.5 14C11.0899 14 14 11.0899 14 7.5C14 3.91015 11.0899 1 7.5 1C3.91015 1 1 3.91015 1 7.5C1 11.0899 3.91015 14 7.5 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                     <path d="M7.5 3.59961V7.49961L10.1 8.79961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  </svg> <?php echo get_the_date(); ?>
                                                               </span>
                                                            </div>
                                                         </div>
                                                         <h3 class="blog__title-10">
                                                            <a href="<?php the_permalink( ); ?>"><?php the_title(); ?></a>
                                                         </h3>
                           
                                                         <p><?php echo wp_trim_words( get_the_content(), 9, '...' );?></p>
                                                      </div>
                                                      <div class="blog__content-10-bottom d-flex align-items-center justify-content-between">
                                                         <div class="blog__meta-author-10 d-flex align-items-center">
                                                            <div class="blog__meta-author-thumb-10">
                                                                <a href="<?php echo get_author_posts_url( $author_id ); ?>">
                                                                  <?php echo get_avatar( get_the_author_meta( 'user_email' ), $author_avatar, '', '', [ 'class' => 'media-object img-circle' ] );?> 
                                                               </a>
                                                            </div>
                                                            <div class="blog__meta-author-content-10">
                                                               <span>By<a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>"> <?php echo get_the_author(); ?></a></span>
                                                            </div>
                                                         </div>
                                                         <div class="blog__meta-10 blog-meta-10-2">
                                                            <span>
                                                               <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M12.9718 6.66668C12.9741 7.54659 12.769 8.4146 12.3732 9.20001C11.9039 10.1412 11.1825 10.9328 10.2897 11.4862C9.39697 12.0396 8.36813 12.3329 7.31844 12.3333C6.4406 12.3356 5.57463 12.13 4.79106 11.7333L1 13L2.26369 9.20001C1.86791 8.4146 1.66281 7.54659 1.6651 6.66668C1.66551 5.61452 1.95815 4.58325 2.51025 3.68838C3.06236 2.79352 3.85211 2.0704 4.79106 1.60002C5.57463 1.20331 6.4406 0.997725 7.31844 1.00002H7.65099C9.03729 1.07668 10.3467 1.66319 11.3284 2.64726C12.3102 3.63132 12.8953 4.94378 12.9718 6.33334V6.66668Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg><?php echo get_comments_number( ); ?>
                                                            </span>
                                                            <span>
                                                               <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M11.0443 7.00397C11.0443 8.43962 9.88694 9.59974 8.45466 9.59974C7.02238 9.59974 5.86499 8.43962 5.86499 7.00397C5.86499 5.56832 7.02238 4.4082 8.45466 4.4082C9.88694 4.4082 11.0443 5.56832 11.0443 7.00397Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  <path d="M8.45466 13C11.0082 13 13.3881 11.4918 15.0446 8.88157C15.6956 7.85921 15.6956 6.14078 15.0446 5.11843C13.3881 2.50816 11.0082 1 8.45466 1C5.90115 1 3.52126 2.50816 1.86474 5.11843C1.21371 6.14078 1.21371 7.85921 1.86474 8.88157C3.52126 11.4918 5.90115 13 8.45466 13Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg><?php display_post_views(); ?>
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <?php endwhile; ?>
                                          <?php endif; ?>
                                          <?php endif; ?>   
                                       </div>
                                    </div>
                                    <?php if ( have_posts() ) : ?>
                                             <?php while ( have_posts() ) : the_post(); ?>    
                  
                                             <?php if ( comments_open() || get_comments_number() ) :
                                                comments_template();
                                             endif; ?>
                                             <?php endwhile; ?>
                                          <?php endif; ?>
                                   
                                 </div>
                              </div>
                              <?php if(is_singular() && is_active_sidebar( 'blog-sidebar' )) : ?>
                           <div class="col-xxl-4 col-lg-4">
                              <div class="sidebar__wrapper pl-40">
                                 
                                 <?php get_sidebar(); ?>
                              </div>
                           </div>
                           <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- postbox details area end -->

         <?php get_footer(); ?>