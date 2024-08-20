<?php
function custom_latest_post_widget_init() {
      register_widget( 'Custom_Latest_Post_Widget' );
  }
  add_action( 'widgets_init', 'custom_latest_post_widget_init' );
  
  class Custom_Latest_Post_Widget extends WP_Widget {
  
      public function __construct() {
          parent::__construct(
              'custom_latest_post_widget',
              __( 'Harry Latest Post', 'harry' ),
              array(
                  'description' => __( 'Display the latest post using custom markup.', 'harry' ),
              )
          );
      }
  
      public function widget( $args, $instance ) {
          echo $args['before_widget'];
  
          // Widget title
          $title = apply_filters( 'widget_title', $instance['title'] );
          if ( ! empty( $title ) ) {
              echo $args['before_title'] . $title . $args['after_title'];
          }
  
          // Number of posts to display
          $num_posts = isset( $instance['num_posts'] ) ? absint( $instance['num_posts'] ) : 1;
  
          // Retrieve the latest posts
          $latest_posts = new WP_Query( array(
              'posts_per_page' => $num_posts,
              'post_status'    => 'publish',
          ) );
  
          if ( $latest_posts->have_posts() ) :
              while ( $latest_posts->have_posts() ) : $latest_posts->the_post();
                  ?>
                  <div class="rc__post d-flex align-items-center">
                      <div class="rc__post-thumb">
                          <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></a>
                      </div>
                      <div class="rc__post-content">
                          <h3 class="rc__post-title">
                              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                          </h3>
                          <div class="rc__meta">
                              <span>
                                  <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M7.5 14C11.0899 14 14 11.0899 14 7.5C14 3.91015 11.0899 1 7.5 1C3.91015 1 1 3.91015 1 7.5C1 11.0899 3.91015 14 7.5 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                      <path d="M7.5 3.59961V7.49961L10.1 8.79961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                  </svg><?php echo get_the_date(); ?>
                              </span>
                          </div>
                      </div>
                  </div>
                  <?php
              endwhile;
              wp_reset_postdata();
          endif;
  
          echo $args['after_widget'];
      }
  
      public function form( $instance ) {
          $title     = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Latest Posts', 'harry' );
          $num_posts = isset( $instance['num_posts'] ) ? absint( $instance['num_posts'] ) : 1;
          ?>
          <p>
              <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html( 'Title:' , 'harry'); ?></label>
              <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
          </p>
          <p>
              <label for="<?php echo $this->get_field_id( 'num_posts' ); ?>"><?php echo esc_html( 'Number of posts to show:' , 'harry'); ?></label>
              <input class="widefat" id="<?php echo $this->get_field_id( 'num_posts' ); ?>" name="<?php echo $this->get_field_name( 'num_posts' ); ?>" type="number" min="1" value="<?php echo $num_posts; ?>">
          </p>
          <?php
      }
  
      public function update( $new_instance, $old_instance ) {
          $instance              = array();
          $instance['title']     = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
          $instance['num_posts'] = ( ! empty( $new_instance['num_posts'] ) ) ? absint( $new_instance['num_posts'] ) : 1;
          return $instance;
      }
  }
  