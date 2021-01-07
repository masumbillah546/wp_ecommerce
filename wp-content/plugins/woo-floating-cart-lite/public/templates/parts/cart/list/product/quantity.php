<?php

/**
 * This file is used to markup the cart list product item quantity.
 *
 * This template can be overridden by copying it to yourtheme/xt-woo-floating-cart/parts/cart/list/product/quantity.php.
 *
 * Available global vars: $product, $cart_item, $cart_item_key
 *
 * HOWEVER, on occasion we will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         https://docs.xplodedthemes.com/article/127-template-structure
 * @author 		XplodedThemes
 * @package     XT_Woo_Floating_Cart/Templates
 * @version     1.7.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="xt_woofc-quantity">
    <form>
        <div class="xt_woofc-quantity-row">
            <?php
            if ( $product->is_sold_individually() ) {

                echo sprintf( '<span class="xt_woofc-quantity-col xt_woofc-quantity-col-input"><input type="hidden" name="cart[%s][qty]" value="1" /></span>', $cart_item_key );

            } else {

                $min_value = apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product );
                $max_value = apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product );

                $min_value = ( $min_value < 0 ) ? 0 : $min_value;
                $max_value = ( $max_value < 0 ) ? 99999 : $max_value;

                $args = array(
                    'input_id'    => uniqid( 'quantity_' ),
                    'input_name'  => "cart[{$cart_item_key}][qty]",
                    'input_value' => xt_woofc_item_qty( $cart_item, $cart_item_key ),
                    'min_value'   => $min_value,
                    'max_value'   => $max_value,
                    'step'        => apply_filters( 'woocommerce_quantity_input_step', 1, $product ),
                    'inputmode'   => apply_filters( 'woocommerce_quantity_input_inputmode', has_filter( 'woocommerce_stock_amount', 'intval' ) ? 'numeric' : '' )
                );

                $args = apply_filters( 'woocommerce_quantity_input_args', $args, $product );

                $quantityFormTemplate = xt_woofc_option( 'cart_product_qty_template', ['input', 'minus', 'plus'] );


	            $input_width = 25 * (xt_woofc_digits_count(intval($args['input_value'])) / 2) . 'px';

	            $parts = array(
                    'input' => sprintf(
                        '<span class="xt_woofc-quantity-col xt_woofc-quantity-col-input"><input style="width: %s" type="number" size="4" name="cart[%s][qty]" value="%s" step="%s" min="%s" max="%s" inputmode="%s"/></span>',
	                    $input_width,
                        $cart_item_key,
                        $args['input_value'],
                        $args['step'],
                        $args['min_value'],
                        $args['max_value'],
                        $args['inputmode']
                    ),
                    'minus' =>  '<span class="xt_woofc-quantity-col xt_woofc-quantity-col-minus xt_woofc-quantity-button"><i class="xt_woofcicon-flat-minus"></i></span>',
                    'plus'  =>  '<span class="xt_woofc-quantity-col xt_woofc-quantity-col-plus xt_woofc-quantity-button"><i class="xt_woofcicon-flat-plus"></i></span>'
                );

                foreach ($quantityFormTemplate as $part_id) {

                    echo $parts[$part_id];
                }
            }
            ?>
            </div>
    </form>
</div>
