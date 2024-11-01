<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>




<?php 
$shop_loop_order = get_option('woolayout-shop-loop');

	$loop_column = 'woolayout-shop-column-'.$shop_loop_order['column'];


?>

<li <?php post_class($loop_column); ?> >




<?php

	$woolayout_product_page_section_list = get_option("woolayout-shop-page-sections");

	foreach ( (array) $woolayout_product_page_section_list as $count_section => $sections) {
		$section_settings = get_option($sections.'-settings');
		$column_list = get_option($sections);
		
?>


					
				
				
				<div id="<?php echo $sections; ?>" class="woolayout-sections  <?php echo $section_settings["class"].' '. $section_settings["display_elements_on_hover"]; ?>" >
			
							
								<?php
									foreach ( (array) $column_list as $count_column => $column) {
										$column_settings = get_option($column.'-settings');
										$column_settings_free = get_option($column.'-settings-free');
										$elements_list = get_option($column);
										
										
                
										?>
										
										
										
										<div id="<?php echo $column; ?>" class="woolayout-columns <?php echo $column_settings_free["column-width"];  ?>">
											<?php 
												foreach ( (array) $elements_list as $count_elements => $elements) {
													
													
													
													
													?>
													
													
															<div id="<?php echo $elements; ?>" class="woolayout-elements">
															
															<?php
																


															?>
														
																
																<?php
																if ($elements == "" ) {
																	// do nothing 
																}
																else {
																
																if (!$elements_atts['button_type'] == 'default') {
																	 echo '<a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">';
																}
																
																$elements_atts = get_option($elements.'-settings');
																$elements_list_shortcode = $elements_atts["shortcode"];
																
																
																	echo do_shortcode("[$elements_list_shortcode 
																				id='$elements_atts[id]'
																				class='$elements_atts[class]'
																				
																				button_type='$elements_atts[button_type]' 
																				button_text='$elements_atts[button_text]'
																				button_style='$elements_atts[button_style]'
																				direct_checkout='$elements_atts[direct_checkout]'
																				
																				
																				]");
																				
																	if (!$elements_atts['button_type'] == 'default') {
																	 echo "</a>";
																	}			
																	 			
																
																}
																?>
															
																									
																
															</div>
													
													<?php
												// end freach elements	
												}
											?>
											
										</div>
											
										<?php
										
										
									// end freach clumn	
									}
								?>
								
							
						
					
			
			</div>
			
			
		<?php 
		// end of foreach
		}
		
		
		
	
	
	// end of woolayout
		
		?>





	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>