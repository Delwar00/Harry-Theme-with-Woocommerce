<?php if(is_single()) : ?>
      <article id="<?php the_ID(); ?>" <?php post_class("harry-post-standard"); ?> >  
            <div class="postbox__thumb w-img mb-30 csearch">
                  <?php the_post_thumbnail(); ?>
            </div>

                         <!-- post meta -->
             <?php echo get_template_part('template-parts/blog/meta'); ?>
              <div class="postbox__details-content-wrapper mb-60">
                  <h3 class="postbox__details-title"><?php the_title(); ?></h3>
                  <?php the_content(); ?>
            </div>
            <div class="postbox__share-wrapper mb-60">
                                       <div class="row align-items-center">
                                          <div class="col-xl-7">
                                             <div class="tagcloud tagcloud-sm">
                                                <span><?php echo esc_html__('Tags:','harry'); ?></span>
                                                <?php harry_tags() ?>
                                             </div>
                                          </div>
                                          <div class="col-xl-5">
                                             <div class="postbox__share text-xl-end">
                                                <span><?php echo esc_html__('Share On:','harry'); ?></span>
                                               <?php harry_social_share(); ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                      
      </article>
<?php else : ?>
<article id="<?php the_ID(); ?>" <?php post_class("harry-post-format-standard postbox__item format-image mb-50 transition-3 csearch"); ?> >
      <div class="postbox__thumb w-img">
             <a href="<?php the_permalink() ?>">
                   <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo the_post_thumbnail_caption(); ?>">
                   
             </a>
      </div>
      <div class="postbox__content">
            <!-- post meta -->
            <?php echo get_template_part('template-parts/blog/meta'); ?>
            <h3 class="postbox__title">
                  <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            </h3>
            <div class="postbox__text">
                  <?php the_excerpt(); ?>
            </div>
            <div class="postbox__read-more">
                  <a href=<?php the_permalink() ?>" class="tp-btn"><?php echo esc_html__('Read More','harry'); ?></a>                               
            </div>
      </div>
</article>
<?php endif; ?>