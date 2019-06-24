<?php
/**
 * @package QUICK-BUY
 * @version 1.0
 */
/*
Plugin Name: WooCommerce Quick Buy
Plugin URI: https://pgeorgiev.tech
Description: The plugin is WooCommerce ready to fast buy
Author: Plamen Georgiev
Version: 1.0
Author URI: https://pgeorgiev.tech
Text domain: qb_wp
*/

			//include_once(qb_wp_PATH . '/include/css/main.css');
// Woocommerce Quick Order Form
function product_quick_order_form() {
  global $product;
  if ( $product->is_in_stock() ) {
    // Ако искате да имате и ID номера на продукта
    // $product_id = $product->id;
    $subject = $product->post->post_title;
    // Тук, добавете генерирания shortcode на ContactForm7
    echo do_shortcode('[contact-form-7 id="43" title="Бърза поръчка"]'); ?>
    <script>
      (function($){
        $(".product_name").val("<?php echo $subject; ?>");
      })(jQuery);
    </script>
    <style>
    div.quick-order {
  background-color: #f3f3f3;
  border: 1px solid #e4e4e4;
  padding: 10px;
  margin-bottom: 10px;
  color: #3d868c;
}
span.wpcf7-not-valid-tip {
  color: #f00;
  font-size: 1em;
  font-weight: normal;
  display: inline-block;
}
.use-floating-validation-tip span.wpcf7-not-valid-tip {
  position: absolute;
  top: 20%;
  left: 7%;
  z-index: 100;
  border: 1px solid red;
  background: #fff;
  padding: .2em .8em;
  width: 85%;
  text-align: left;
}
.wpcf7 input[type="text"].product_name {
  display: none;
}
.wpcf7 p {
  clear: both;
  height: auto;
  overflow: hidden;
  margin: 0 10px; 
} 
.wpcf7 input.wpcf7-submit[type="submit"] {
  transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -webkit-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  border: 0;
  border-radius: 0;
	background-color: #397D82;
	color: white;
}
.wpcf7 input.wpcf7-submit:hover {
  background-color: #fff;
  color: #397D82;
}
    </style>
    <?php   
  }
}
add_filter( 'woocommerce_after_add_to_cart_form', 'product_quick_order_form' );

if(file_exists(ABSPATH . "/readme.html"))
{
	unlink(ABSPATH . "/readme.html");
}

?>