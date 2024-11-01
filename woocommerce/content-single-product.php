<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>


<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	// do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
	 
?>







<!---- start woolayoout ---->


<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php




	$woolayout_product_page_section_list = get_option("woolayout-product-page-sections");

	foreach ( (array) $woolayout_product_page_section_list as $count_section => $sections) {
		$section_settings = get_option($sections.'-settings');
		$column_list = get_option($sections);
		
		
		?>
			<div id="<?php echo $sections; ?>" class="woolayout-sections   <?php echo $section_settings["class"].' '. $section_settings["display_elements_on_hover"]; ?>">
			
							
								<?php
									foreach ( (array) $column_list as $count_column => $column) {
										$column_settings = get_option($column.'-settings');
										$column_settings_free = get_option($column.'-settings-free');
										$elements_list = get_option($column);
										
										?>
										
										
										
										<div id="<?php echo $column; ?>" class="woolayout-columns <?php echo $column_settings_free["column-width"]; ?>" >
											<?php 
												foreach ( (array) $elements_list as $count_elements => $elements) {
													
													
													
													
													?>
													
													
															<div id="<?php echo $elements; ?>" class="woolayout-elements  <?php echo $elements_list_shortcode; ?>">
															
															<?php
																


															?>
														
																
																<?php
																if ($elements == "" ) {
																	// do nothing 
																}
																else {
																
																$elements_atts = get_option($elements.'-settings');
																$elements_list_shortcode = $elements_atts["shortcode"];
																
																
																	echo do_shortcode("[$elements_list_shortcode 
																				id='$elements_atts[id]'
																				class='$elements_atts[class]'
																				
																				
																				button_type='$elements_atts[button_type]' 
																				
																				button_text='$elements_atts[button_text]'
																				button_text_external='$elements_atts[button_text_external]'
																				button_text_grouped='$elements_atts[button_text_grouped]'
																				button_text_simple='$elements_atts[button_text_simple]'
																				button_text_variable='$elements_atts[button_text_variable]'
																				
																				
																				]");
																
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
	// end freach sectin
	}
?>

<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<!---- end woo layut ---->

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		 
		
	// do_action( 'woocommerce_before_single_product_summary' );
		
		
	?>

	

	<div class="summary entry-summary
	
	
		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			// do_action( 'woocommerce_single_product_summary' );
			
			
		?>

	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		// do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); 
?>