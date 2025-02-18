<?php
//shop page 
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action( 'woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

//sidebar shop
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


// for single products
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


add_filter( 'woosw_button_position_archive', '__return_false' );
add_filter( 'woosw_button_position_single', '__return_false' );
add_filter( 'woosq_button_position', '__return_false' );

// harry_sale_percentage
function harry_sale_percentage(){
   global $product;
   $output = '';
   $icon = esc_html__("-",'harry');

   if ( $product->is_on_sale() && $product->is_type( 'variable' ) ) {
      $percentage = ceil(100 - ($product->get_variation_sale_price() / $product->get_variation_regular_price( 'min' )) * 100);
      $output .= '<div class="product-percentage-badges"><span class="tp-product-details-offer">'. $icon . $percentage.'%</span></div>';

   } elseif( $product->is_on_sale() && $product->get_regular_price()  && !$product->is_type( 'grouped' )) {
      $percentage = ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);
      $output .= '<div class="product-percentage-badges">';
      $output .= '<span class="tp-product-details-offer">'.$icon . $percentage.'%</span>';
      $output .= '</div>';
   }
   return $output;
}

// woocommerce mini cart content
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
   ob_start();
   ?>
   <div class="mini_shopping_cart_box">
       <?php woocommerce_mini_cart(); ?>
   </div>
   <?php $fragments['.mini_shopping_cart_box'] = ob_get_clean();
   return $fragments;
});

// woocommerce mini cart count icon
if ( ! function_exists( 'harry_header_add_to_cart_fragment' ) ) {
   function harry_header_add_to_cart_fragment( $fragments ) {
       ob_start();
       ?>
       <span class="tp-item-count cart__count" id="tp-cart-item">
           <?php echo esc_html( WC()->cart->cart_contents_count ); ?>
       </span>
       <?php
       $fragments['#tp-cart-item'] = ob_get_clean();

       return $fragments;
   }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'harry_header_add_to_cart_fragment' );

// harry_shopping_cart
function harry_shopping_cart(){
   ob_start();
   ?>
 <!-- cart mini area start -->
 <div class="cartmini__area">
         <div class="cartmini__wrapper d-flex justify-content-between flex-column">
            <div class="cartmini__top-wrapper ">
               <div class="cartmini__top p-relative">
                  <div class="cartmini__title">
                     <h4><?php print esc_html('Shopping cart','harry'); ?></h4>
                  </div>
                  <div class="cartmini__close">
                     <button type="button" class="cartmini__close-btn cartmini-close-btn"><i class="fal fa-times"></i></button>
                  </div>
               </div>
               <div class="cartmini__widget">
               <div class="mini_shopping_cart_box"><?php woocommerce_mini_cart(); ?></div>
                 
               </div>
            <div class="header-mini-cart"></div>
            </div>
         </div>
      </div>
      <!-- cart mini area end -->


   <?php
   return ob_get_clean();
}

function harry_custom_product_grid(){
      global $post;
      global $product;
      global $woocommerce;
      ?>

<div class="product__item p-relative transition-3 mb-50">
                                          <div class="product__thumb w-img p-relative fix">
                                             <a href="<?php the_permalink(); ?>">
                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                             </a>
                                             
                                             <div class="product__badge d-flex flex-column flex-wrap">
                                                <?php woocommerce_show_product_loop_sale_flash(); ?>
                                             </div>
                                             
                                             <div class="product__action d-flex flex-column flex-wrap">
                                                <div type="button" class="product-action-btn">
                                                <?php echo do_shortcode( '[woosw]' ); ?>                                      
                                                   <span class="product-action-tooltip">Add To Wishlist</span>
                                                </div>
                                                <div type="button" class="product-action-btn">
                                                   <?php echo do_shortcode( '[woosc]' ); ?>                                    
                                                   <span class="product-action-tooltip">Add To Compare</span>
                                                </div>
                                                <div type="button" class="product-action-btn" data-bs-toggle="modal" data-bs-target="#productModal">
                                                <?php echo do_shortcode( '[woosq]' ); ?> 
                                                      
                                                   <span class="product-action-tooltip">Quick view</span>
                                                   
                                                </div>
                                                
                                               
                                             </div>
                                             <div class="product__add transition-3">
                                                <?php harry_wooc_add_to_cart(); ?>
                                                </button>
                                             </div>
                                          </div>
                                          <div class="product__content">
                                             <div class="product__rating d-flex">
                                               <?php woocommerce_template_loop_rating(); ?>
                                             </div>
                                             <h3 class="product__title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                             </h3>
                                             <div class="product__price">
                                                <span class="product__ammount"><?php woocommerce_template_loop_price(); ?></span>
                                             </div>
                                          </div>
                                       </div>
      <?php
}

add_action('woocommerce_before_shop_loop_item','harry_custom_product_grid');
// harry_pro_widget_sidebar_before
function harry_pro_widget_sidebar_before($class){
   $class = "<div class='harry-pro-list-sidebar'>";
   return $class; 
}

add_filter('woocommerce_before_widget_product_list','harry_pro_widget_sidebar_before'); 

// harry_pro_widget_sidebar_after
function harry_pro_widget_sidebar_after($class){
   $class = "</div>";
   return $class; 
}

add_filter('woocommerce_after_widget_product_list','harry_pro_widget_sidebar_after');
// product add to cart button
function harry_wooc_add_to_cart( $args = array() ) {
   global $product;

       if ( $product ) {
           $defaults = array(
               'quantity'   => 1,
               'class'      => implode(
                   ' ',
                   array_filter(
                       array(
                           'product-add-cart-btn w-100 cart-button icon-btn button',
                           'product_type_' . $product->get_type(),
                           $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                           $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                       )
                   )
               ),
               'attributes' => array(
                   'data-product_id'  => $product->get_id(),
                   'data-product_sku' => $product->get_sku(),
                   'aria-label'       => $product->add_to_cart_description(),
                   'rel'              => 'nofollow',
               ),
           );

           $args = wp_parse_args( $args, $defaults );

           if ( isset( $args['attributes']['aria-label'] ) ) {
               $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
           }
       }


        // check product type 
        if( $product->is_type( 'simple' ) ){
           $btntext = esc_html__("Add to Cart",'harry');
        } elseif( $product->is_type( 'variable' ) ){
           $btntext = esc_html__("Select Options",'harry');
        } elseif( $product->is_type( 'external' ) ){
           $btntext = esc_html__("Buy Now",'harry');
        } elseif( $product->is_type( 'grouped' ) ){
           $btntext = esc_html__("View Products",'harry');
        }
        else{
           $btntext = esc_html__("Add to Cart",'harry');
        } 

       echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
           esc_url( $product->add_to_cart_url() ),
           esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
           esc_attr( isset( $args['class'] ) ? $args['class'] : 'cart-button icon-btn button' ),
           isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
           '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd" clip-rule="evenodd" d="M3.54431 4.80484L4.08701 11.2487C4.12661 11.7447 4.53251 12.1167 5.02841 12.1167H5.03201H14.8519H14.8537C15.3227 12.1167 15.7232 11.7681 15.7898 11.3053L16.6448 5.41221C16.6646 5.27205 16.6295 5.13189 16.544 5.01868C16.4594 4.90457 16.3352 4.8309 16.1948 4.81113C16.0067 4.81832 8.20092 4.80754 3.54431 4.80484ZM5.02647 13.4642C3.84117 13.4642 2.83766 12.5405 2.74136 11.359L1.91696 1.57098L0.560653 1.33738C0.192551 1.27269 -0.0531497 0.924974 0.00985058 0.557495C0.0746508 0.190017 0.430152 -0.0489788 0.790154 0.00852392L2.66216 0.331977C2.96366 0.384987 3.19316 0.634765 3.21926 0.940248L3.43076 3.45689C16.2792 3.46228 16.3206 3.46857 16.3827 3.47576C16.884 3.54854 17.325 3.80999 17.6256 4.21251C17.9262 4.61413 18.0522 5.1092 17.9802 5.60516L17.1261 11.4974C16.965 12.6187 15.9894 13.4642 14.8554 13.4642H14.8509H5.03367H5.02647Z" fill="currentColor"/>
                   <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4079 8.12567H10.9131C10.5396 8.12567 10.2381 7.82379 10.2381 7.45181C10.2381 7.07984 10.5396 6.77795 10.9131 6.77795H13.4079C13.7805 6.77795 14.0829 7.07984 14.0829 7.45181C14.0829 7.82379 13.7805 8.12567 13.4079 8.12567Z" fill="currentColor"/>
                   <path fill-rule="evenodd" clip-rule="evenodd" d="M4.63943 15.9048C4.91033 15.9048 5.12903 16.1235 5.12903 16.3944C5.12903 16.6653 4.91033 16.8849 4.63943 16.8849C4.36763 16.8849 4.14893 16.6653 4.14893 16.3944C4.14893 16.1235 4.36763 15.9048 4.63943 15.9048Z" fill="currentColor"/>
                   <path fill-rule="evenodd" clip-rule="evenodd" d="M4.63859 16.2097C4.53689 16.2097 4.45409 16.2925 4.45409 16.3942C4.45409 16.5985 4.82399 16.5985 4.82399 16.3942C4.82399 16.2925 4.74029 16.2097 4.63859 16.2097ZM4.6386 17.5569C3.996 17.5569 3.474 17.0349 3.474 16.3933C3.474 15.7518 3.996 15.2307 4.6386 15.2307C5.28121 15.2307 5.80411 15.7518 5.80411 16.3933C5.80411 17.0349 5.28121 17.5569 4.6386 17.5569Z" fill="currentColor"/>
                   <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7918 15.9048C15.0627 15.9048 15.2823 16.1235 15.2823 16.3944C15.2823 16.6653 15.0627 16.8849 14.7918 16.8849C14.52 16.8849 14.3013 16.6653 14.3013 16.3944C14.3013 16.1235 14.52 15.9048 14.7918 15.9048Z" fill="currentColor"/>
                   <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7906 16.2098C14.6898 16.2098 14.607 16.2926 14.607 16.3943C14.6079 16.6004 14.9769 16.5986 14.976 16.3943C14.976 16.2926 14.8923 16.2098 14.7906 16.2098ZM14.7909 17.5569C14.1483 17.5569 13.6263 17.0349 13.6263 16.3933C13.6263 15.7518 14.1483 15.2307 14.7909 15.2307C15.4344 15.2307 15.9573 15.7518 15.9573 16.3933C15.9573 17.0349 15.4344 17.5569 14.7909 17.5569Z" fill="currentColor"/>
               </svg>'.$btntext.' '
       );
}

function woo_single_product_info(){
   global $post;
   global $product;
   global $woocommerce;
   $rating_count = $product->get_rating_count();
   $review_count = $product->get_review_count();
   $average      = $product->get_average_rating();
   $stock_woo= $product->get_stock_status()=='instock' ? ' In Stock' : '';
   // var_dump($product);
   ?>
   <div class="product__details-wrapper">

      <div class="product__details-stock">
         <span><?php echo $product->get_stock_quantity(); ?><?php echo esc_html( $stock_woo ); ?></span>
      </div>
      <h3 class="product__details-title"><?php the_title(); ?> </h3>

      <div class="product__details-rating d-flex align-items-center">
         <div class="product__rating product__rating-2 d-flex">
           <?php woocommerce_template_single_rating(); ?>
         </div>
         <div class="product__details-rating-count">
            <span>(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'harry' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</span>
         </div>
      </div>

     <?php woocommerce_template_single_excerpt(); ?>

      <div class="product__details-price">
         <?php woocommerce_template_single_price(); ?>
         <span class="product__details-offer"><?php echo harry_sale_percentage(); ?></span>
      </div>

      <div class="product__details-action d-flex flex-wrap align-items-center">
   
         <?php woocommerce_template_single_add_to_cart(); ?>
         <div type="button" class="product-action-btn">
            <?php echo do_shortcode( '[woosw]' ); ?>                                    
            <span class="product-action-tooltip">Add To Wishlist</span>
         </div>
         <div type="button" class="product-action-btn">
            <?php echo do_shortcode( '[woosc]' ); ?>                                        
            <span class="product-action-tooltip">Add To Compare</span>
         </div>
      </div>
    
      
      <?php woocommerce_template_single_meta(); ?>
      <div class="product__details-share">
        <?php do_action('harry_product_social_share_share'); ?>
      </div>
      </div>
   <?php
}
add_filter('woocommerce_single_product_summary','woo_single_product_info');