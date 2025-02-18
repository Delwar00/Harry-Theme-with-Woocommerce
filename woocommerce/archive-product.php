<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<div class="shop__top mb-50">
                  <div class="row align-items-center">
                     <div class="col-lg-6 col-md-5">
                        <div class="shop__result">
                           <p><?php woocommerce_result_count(); ?></p>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-7">
                        <div class="shop__sort d-flex flex-wrap justify-content-md-end align-items-center">
                           <div class="shop__sort-item">
                              <div class="shop__sort-tab tp-tab">
                                 <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true">
                                       <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M19.65 6.868V2.782C19.65 1.513 19.074 1 17.643 1H14.007C12.576 1 12 1.513 12 2.782V6.859C12 8.137 12.576 8.641 14.007 8.641H17.643C19.074 8.65 19.65 8.137 19.65 6.868Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M19.65 17.643V14.007C19.65 12.576 19.074 12 17.643 12H14.007C12.576 12 12 12.576 12 14.007V17.643C12 19.074 12.576 19.65 14.007 19.65H17.643C19.074 19.65 19.65 19.074 19.65 17.643Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M8.65 6.868V2.782C8.65 1.513 8.074 1 6.643 1H3.007C1.576 1 1 1.513 1 2.782V6.859C1 8.137 1.576 8.641 3.007 8.641H6.643C8.074 8.65 8.65 8.137 8.65 6.868Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M8.65 17.643V14.007C8.65 12.576 8.074 12 6.643 12H3.007C1.576 12 1 12.576 1 14.007V17.643C1 19.074 1.576 19.65 3.007 19.65H6.643C8.074 19.65 8.65 19.074 8.65 17.643Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                          
                                      </button>
                                      <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false">
                                          <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 1H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M1 8H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M1 15H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>                                          
                                      </button>
                                    </div>
                                  </nav>                                  
                              </div>
                           </div>
                           <div class="shop__sort-item">
                              <div class="shop__sort-select">
                                <?php woocommerce_catalog_ordering(); ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

<?php




/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action( 'woocommerce_shop_loop_header' );

if ( woocommerce_product_loop() ) {
   $col_shop=is_active_sidebar('product-sidebar') ? '9' : '12' ;
?>
<div class="shop__main">
                  <div class="row">
                     <?php if(is_active_sidebar('product-sidebar')) : ?>
                     <div class="col-lg-3">
                        <!-- if sidebar on left add class on-left -->
                        <!-- if sidebar on right add class on-right -->
                        <div class="shop__sidebar on-left">
                           <?php dynamic_sidebar('product-sidebar'); ?>
                        </div>
                     </div>
                     <?php endif; ?>
                     <div class="col-lg-<?php echo esc_attr($col_shop); ?> order-first order-lg-last">
                        <div class="shop__tab-content mb-40">
                           <div class="tab-content" id="shop_tab_content">
                              <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                 <!-- shop grid -->
                                 <div class="tp-product-grid">
                                 <?php
                                    /**
                                     * Hook: woocommerce_before_shop_loop.
                                    *
                                    * @hooked woocommerce_output_all_notices - 10
                                    * @hooked woocommerce_result_count - 20
                                    * @hooked woocommerce_catalog_ordering - 30
                                    */
                                    do_action( 'woocommerce_before_shop_loop' );

                                    woocommerce_product_loop_start();

                                    if ( wc_get_loop_prop( 'total' ) ) {
                                       while ( have_posts() ) {
                                          the_post();

                                          /**
                                           * Hook: woocommerce_shop_loop.
                                          */
                                          do_action( 'woocommerce_shop_loop' );

                                          wc_get_template_part( 'content', 'product' );
                                       }
                                    }

                                    woocommerce_product_loop_end();

                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                    *
                                    * @hooked woocommerce_pagination - 10
                                    */
                                    do_action( 'woocommerce_after_shop_loop' );
                                    ?>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                 <!-- shop list -->
                                 <div class="product__list-wrapper mb-30">
                                    <div class="row">
                                       <div class="col-lg-12 col-md-6">
                                          <div class="product__list-item mb-30">
                                             <div class="row">
                                                <div class="col-xl-5 col-lg-5">
                                                   <div class="product__thumb product__list-thumb p-relative fix m-img">
                                                      <a href="product-details.html">
                                                         <img src="assets/img/product/list/product-list-1.jpg" alt="">
                                                      </a>
                                                      <div class="product__badge d-flex flex-column flex-wrap">
                                                         <span class="product__badge-item has-new">new</span>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-xl-7 col-lg-7">
                                                   <div class="product__list-content">
                                                   
            
                                                      <h3 class="product__list-title">
                                                         <a href="product-details.html">MGI Zip X1 Electric</a>
                                                      </h3>
                                                      <div class="product__list-price">
                                                         <span class="product__list-ammount">$654.00</span>
                                                      </div>
                                                      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.…</p>
            
                                                      <div class="product__list-action d-flex flex-wrap align-items-center">
                                                         <button type="button" class="product-add-cart-btn product-add-cart-btn-2">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M3.54431 4.80484L4.08701 11.2487C4.12661 11.7447 4.53251 12.1167 5.02841 12.1167H5.03201H14.8519H14.8537C15.3227 12.1167 15.7232 11.7681 15.7898 11.3053L16.6448 5.41221C16.6646 5.27205 16.6295 5.13189 16.544 5.01868C16.4594 4.90457 16.3352 4.8309 16.1948 4.81113C16.0067 4.81832 8.20092 4.80754 3.54431 4.80484ZM5.02647 13.4642C3.84117 13.4642 2.83766 12.5405 2.74136 11.359L1.91696 1.57098L0.560653 1.33738C0.192551 1.27269 -0.0531497 0.924974 0.00985058 0.557495C0.0746508 0.190017 0.430152 -0.0489788 0.790154 0.00852392L2.66216 0.331977C2.96366 0.384987 3.19316 0.634765 3.21926 0.940248L3.43076 3.45689C16.2792 3.46228 16.3206 3.46857 16.3827 3.47576C16.884 3.54854 17.325 3.80999 17.6256 4.21251C17.9262 4.61413 18.0522 5.1092 17.9802 5.60516L17.1261 11.4974C16.965 12.6187 15.9894 13.4642 14.8554 13.4642H14.8509H5.03367H5.02647Z" fill="currentColor"/>
                                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4079 8.12567H10.9131C10.5396 8.12567 10.2381 7.82379 10.2381 7.45181C10.2381 7.07984 10.5396 6.77795 10.9131 6.77795H13.4079C13.7805 6.77795 14.0829 7.07984 14.0829 7.45181C14.0829 7.82379 13.7805 8.12567 13.4079 8.12567Z" fill="currentColor"/>
                                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M4.63943 15.9048C4.91033 15.9048 5.12903 16.1235 5.12903 16.3944C5.12903 16.6653 4.91033 16.8849 4.63943 16.8849C4.36763 16.8849 4.14893 16.6653 4.14893 16.3944C4.14893 16.1235 4.36763 15.9048 4.63943 15.9048Z" fill="currentColor"/>
                                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M4.63859 16.2097C4.53689 16.2097 4.45409 16.2925 4.45409 16.3942C4.45409 16.5985 4.82399 16.5985 4.82399 16.3942C4.82399 16.2925 4.74029 16.2097 4.63859 16.2097ZM4.6386 17.5569C3.996 17.5569 3.474 17.0349 3.474 16.3933C3.474 15.7518 3.996 15.2307 4.6386 15.2307C5.28121 15.2307 5.80411 15.7518 5.80411 16.3933C5.80411 17.0349 5.28121 17.5569 4.6386 17.5569Z" fill="currentColor"/>
                                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7918 15.9048C15.0627 15.9048 15.2823 16.1235 15.2823 16.3944C15.2823 16.6653 15.0627 16.8849 14.7918 16.8849C14.52 16.8849 14.3013 16.6653 14.3013 16.3944C14.3013 16.1235 14.52 15.9048 14.7918 15.9048Z" fill="currentColor"/>
                                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7906 16.2098C14.6898 16.2098 14.607 16.2926 14.607 16.3943C14.6079 16.6004 14.9769 16.5986 14.976 16.3943C14.976 16.2926 14.8923 16.2098 14.7906 16.2098ZM14.7909 17.5569C14.1483 17.5569 13.6263 17.0349 13.6263 16.3933C13.6263 15.7518 14.1483 15.2307 14.7909 15.2307C15.4344 15.2307 15.9573 15.7518 15.9573 16.3933C15.9573 17.0349 15.4344 17.5569 14.7909 17.5569Z" fill="currentColor"/>
                                                            </svg>
                                                            Add to Cart
                                                         </button>
                                                         <button type="button" class="product-action-btn product-action-btn-2">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M1.60361 7.98635C2.83627 11.8048 7.70625 14.8923 9.00046 15.6565C10.2991 14.8844 15.2042 11.7628 16.3973 7.98985C17.1807 5.55102 16.4536 2.46177 13.5645 1.53473C12.1648 1.08741 10.5321 1.35966 9.4049 2.22804C9.16927 2.40837 8.8422 2.41187 8.60481 2.23329C7.41084 1.33952 5.85111 1.07778 4.42941 1.53473C1.5447 2.4609 0.82023 5.55014 1.60361 7.98635ZM9.00138 17.0711C8.89236 17.0711 8.78421 17.0448 8.68574 16.9914C8.41055 16.8417 1.92808 13.2841 0.348132 8.3872C0.347252 8.3872 0.347252 8.38633 0.347252 8.38633C-0.644504 5.30321 0.459792 1.42874 4.02502 0.284605C5.69904 -0.254635 7.52342 -0.0174044 8.99874 0.909632C10.4283 0.00973263 12.3275 -0.238878 13.9681 0.284605C17.5368 1.43049 18.6446 5.30408 17.6538 8.38633C16.1248 13.2272 9.59485 16.8382 9.3179 16.9896C9.21943 17.0439 9.1104 17.0711 9.00138 17.0711Z" fill="currentColor"/>
                                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2027 6.67485C13.8625 6.67485 13.5741 6.41486 13.546 6.07171C13.4879 5.35214 13.0044 4.74462 12.3159 4.52315C11.9686 4.4111 11.7787 4.04081 11.8904 3.69678C12.0038 3.35188 12.3722 3.16454 12.7204 3.27309C13.9187 3.65914 14.7584 4.71573 14.8613 5.96491C14.8903 6.32645 14.6204 6.64334 14.2572 6.67222C14.2388 6.67398 14.2212 6.67485 14.2027 6.67485Z" fill="currentColor"/>
                                                            </svg>                                       
                                                            <span class="product-action-tooltip">Add To Wishlist</span>
                                                         </button>
                                                         <button type="button" class="product-action-btn" data-bs-toggle="modal" data-bs-target="#productModal">
                                                            <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                               <path d="M9.49943 5.34978C8.23592 5.34978 7.20896 6.37595 7.20896 7.63732C7.20896 8.89774 8.23592 9.92296 9.49943 9.92296C10.7629 9.92296 11.7908 8.89774 11.7908 7.63732C11.7908 6.37595 10.7629 5.34978 9.49943 5.34978M9.49941 11.3456C7.45025 11.3456 5.78394 9.68213 5.78394 7.63738C5.78394 5.59169 7.45025 3.92725 9.49941 3.92725C11.5486 3.92725 13.2158 5.59169 13.2158 7.63738C13.2158 9.68213 11.5486 11.3456 9.49941 11.3456" fill="currentColor"/>
                                                               
                                                               <path d="M1.49145 7.63683C3.25846 11.5338 6.23484 13.8507 9.50001 13.8517C12.7652 13.8507 15.7416 11.5338 17.5086 7.63683C15.7416 3.7408 12.7652 1.42386 9.50001 1.42291C6.23579 1.42386 3.25846 3.7408 1.49145 7.63683V7.63683ZM9.50173 15.2742H9.49793H9.49698C5.56775 15.2714 2.03943 12.5219 0.0577129 7.91746C-0.0192376 7.73822 -0.0192376 7.53526 0.0577129 7.35601C2.03943 2.75248 5.5687 0.00306822 9.49698 0.000223018C9.49888 -0.000725381 9.49888 -0.000725381 9.49983 0.000223018C9.50173 -0.000725381 9.50173 -0.000725381 9.50268 0.000223018C13.4319 0.00306822 16.9602 2.75248 18.942 7.35601C19.0199 7.53526 19.0199 7.73822 18.942 7.91746C16.9612 12.5219 13.4319 15.2714 9.50268 15.2742H9.50173Z" fill="currentColor"/>
                                                            
                                                               </svg>
                                                               
                                                            <span class="product-action-tooltip">Quick view</span>
                                                         </button>
                                                         <button type="button" class="product-action-btn product-action-btn-2">
                                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                               <path d="M11.4144 6.16828L14 3.58412L11.4144 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                               <path d="M1.48883 3.58386L14 3.58386" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                               <path d="M4.07452 8.32166L1.4889 10.9058L4.07452 13.4899" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                               <path d="M14 10.906H1.48883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>                                       
                                                            <span class="product-action-tooltip">Add To Compare</span>
                                                         </button>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>


 <?php
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
