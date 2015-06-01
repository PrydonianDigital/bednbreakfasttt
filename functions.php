<?php

if ( ! isset( $content_width ) )
	$content_width = 874;

function bnb_init()	{
	remove_action( 'wp_head', 'wp_generator' );
	show_admin_bar( false );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'jetpack-responsive-videos' );
	add_theme_support( 'title-tag' );
	set_post_thumbnail_size( 700, 394, true );
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'woocommerce' );
	$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
	add_theme_support( 'html5', $markup );
}
add_action( 'after_setup_theme', 'bnb_init' );

function bnb_scripts() {
	//wp_deregister_script( 'jquery' );
	//wp_register_script( 'jquery', get_template_directory_uri() . '/js/libs/jquery-1.10.1.min.js', false, '1.10.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, '2.8.1', false );
	wp_register_script( 'gumby', get_template_directory_uri() . '/js/libs/gumby.js', false, '2.6', true );
	wp_register_script( 'gumby', get_template_directory_uri() . '/js/libs/ui/gumby.retina.js', false, '2.6', true );
	wp_register_script( 'gumbyfixed', get_template_directory_uri() . '/js/libs/ui/gumby.fixed.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbyskip', get_template_directory_uri() . '/js/libs/ui/gumby.skiplink.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbytoggle', get_template_directory_uri() . '/js/libs/ui/gumby.toggleswitch.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbycheck', get_template_directory_uri() . '/js/libs/ui/gumby.checkbox.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbyradio', get_template_directory_uri() . '/js/libs/ui/gumby.radiobtn.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbytabs', get_template_directory_uri() . '/js/libs/ui/gumby.tabs.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbynav', get_template_directory_uri() . '/js/libs/ui/gumby.navbar.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbyvalidation', get_template_directory_uri() . '/js/libs/ui/jquery.validation.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbyinit', get_template_directory_uri() . '/js/libs/gumby.init.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', false, '2.6', true );	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'gumby' );
	wp_enqueue_script( 'gumbyfixed' );
	wp_enqueue_script( 'gumbyskip' );
	wp_enqueue_script( 'gumbytoggle' );
	wp_enqueue_script( 'gumbycheck' );
	wp_enqueue_script( 'gumbyradio' );
	wp_enqueue_script( 'gumbytabs' );
	wp_enqueue_script( 'gumbynav' );
	wp_enqueue_script( 'gumbyvalidation' );
	wp_enqueue_script( 'gumbyinit' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'gumby' );

	wp_enqueue_script( 'main' );

}
add_action( 'wp_enqueue_scripts', 'bnb_scripts' );

function bnb_styles() {
	wp_register_style( 'normalise', get_template_directory_uri() . '/css/normalize.css', false, '3.0.1' );
	wp_register_style( 'base', get_template_directory_uri() . '/css/base.css', false, '3.0.1' );
	wp_enqueue_style( 'normalise' );
	wp_enqueue_style( 'base' );
}
add_action( 'wp_enqueue_scripts', 'bnb_styles' );

function bnb_menu() {
	$locations = array(
		'bnbmenu' => __( 'BnB Top Menu', 'bnb' ),
		'footermenu' => __( 'BnB Footer Menu', 'bnb' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'bnb_menu' );

register_sidebar(
	array(
		'id' => 'mainsidebar',
		'name' => __( 'Main Sidebar', 'ch' ),
		'description' => __( '', 'ch' ),
		'before_title' => '<h5 class="widget">',
		'aftch_title' => '</h5>',
		'before_widget' => '<li id="%1$s" class="widget field %2$s">',
		'after_widget' => '</li>',
	)
);

register_sidebar( array(
	'id' => 'footer',
	'name' => __( 'Footer Widgets', 'ch' ),
	'description' => __( '', 'ym' ),
	'before_title' => '<h5 class="widget">',
	'aftch_title' => '</h5>',
	'before_widget' => '<li id="%1$s" class="widget field %2$s">',
	'after_widget' => '</li>',
));

register_sidebar( array(
	'id' => 'company',
	'name' => __( 'Company Info', 'ch' ),
	'description' => __( '', 'ym' ),
	'before_title' => '<h5 class="widget">',
	'aftch_title' => '</h5>',
	'before_widget' => '<li id="%1$s" class="widget field %2$s">',
	'after_widget' => '</li>',
));

function jetpackme_responsive_videos_setup() {
    add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'jetpackme_responsive_videos_setup' );

add_action( 'dashboard_glance_items', 'my_add_cpt_to_dashboard' );

function my_add_cpt_to_dashboard() {
	$showTaxonomies = 1;
	if ($showTaxonomies) {
		$taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
		foreach ( $taxonomies as $taxonomy ) {
			$num_terms	= wp_count_terms( $taxonomy->name );
			$num = number_format_i18n( $num_terms );
			$text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
			$associated_post_type = $taxonomy->object_type;
			if ( current_user_can( 'manage_categories' ) ) {
				$output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text .'</a>';
			}
			echo '<li class="taxonomy-count">' . $output . ' </li>';
		}
	}
	// Custom post types counts
	$post_types = get_post_types( array( '_builtin' => false ), 'objects' );
	foreach ( $post_types as $post_type ) {
		if($post_type->show_in_menu==false) {
			continue;
		}
		$num_posts = wp_count_posts( $post_type->name );
		$num = number_format_i18n( $num_posts->publish );
		$text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
		if ( current_user_can( 'edit_posts' ) ) {
			$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
		}
		echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
	}
}

function wpclean_add_metabox_menu_posttype_archive() {
	add_meta_box('wpclean-metabox-nav-menu-posttype', 'Custom Post Type Archives', 'wpclean_metabox_menu_posttype_archive', 'nav-menus', 'side', 'default');
}

function wpclean_metabox_menu_posttype_archive() {
	$post_types = get_post_types(array('show_in_nav_menus' => true, 'has_archive' => true), 'object');
	if ($post_types) :
		$items = array();
		$loop_index = 999999;
		foreach ($post_types as $post_type) {
			$item = new stdClass();
			$loop_index++;
			$item->object_id = $loop_index;
			$item->db_id = 0;
			$item->object = 'post_type_' . $post_type->query_var;
			$item->menu_item_parent = 0;
			$item->type = 'custom';
			$item->title = $post_type->labels->name;
			$item->url = get_post_type_archive_link($post_type->query_var);
			$item->target = '';
			$item->attr_title = '';
			$item->classes = array();
			$item->xfn = '';
			$items[] = $item;
		}
		$walker = new Walker_Nav_Menu_Checklist(array());
		echo '<div id="posttype-archive" class="posttypediv">';
		echo '<div id="tabs-panel-posttype-archive" class="tabs-panel tabs-panel-active">';
		echo '<ul id="posttype-archive-checklist" class="categorychecklist form-no-clear">';
		echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $items), 0, (object) array('walker' => $walker));
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		echo '<p class="button-controls">';
		echo '<span class="add-to-menu">';
		echo '<input type="submit"' . disabled(1, 0) . ' class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu', 'stop_ivory') . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
		echo '<span class="spinner"></span>';
		echo '</span>';
		echo '</p>';
	endif;
}
add_action('admin_head-nav-menus.php', 'wpclean_add_metabox_menu_posttype_archive');

class Walker_Page_Custom extends Walker_Nav_menu{
	function start_lvl(&$output, $depth=0, $args=array()){
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class=\"dropdown\"><ul>\n";
	}
	function end_lvl(&$output , $depth=0, $args=array()){
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul></div>\n";
	}
}
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 100;' ), 20 );

add_filter('woocommerce_bookings_booking_cost_text', 'bbb_change_booking_cost');
function wooninja_change_book_now() {
	return 'Order total';
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

function my_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'No products in the basket.' :
			$translated_text = __( 'Your basket is currently empty <strong>☹</strong>', 'woocommerce' );
		break;
		case 'Persons' :
			$translated_text = __( 'Quantity', 'woocommerce-bookings' );
		break;
		case 'Read more' :
			$translated_text = __( 'Order', 'woocommerce-bookings' );
		break;
		case 'Booking cost' :
			$translated_text = __( 'Total item cost', 'woocommerce-bookings' );
		break;
		case 'Booking Date' :
			$translated_text = __( 'Delivery Date', 'woocommerce-bookings' );
		break;
		case 'Booking Time' :
			$translated_text = __( 'Delivery Time', 'woocommerce-bookings' );
		break;
		case 'Sort by newness' :
			$translated_text = __( 'Sort by date added', 'woocommerce' );
		break;
		case 'Proceed to Checkout' :
			$translated_text = __( 'Checkout', 'woocommerce-bookings' );
		break;
		case 'verified owner' :
			$translated_text = __( 'previous customer', 'woocommerce-bookings' );
		break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    unset( $tabs['description'] );      	// Remove the description tab
    return $tabs;
}


add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
	$fields['order']['order_comments']['placeholder'] = 'Notes about your order.';
	 $fields['shipping']['shipping_address_1']['placeholder'] = 'Address';
	 $fields['shipping']['shipping_address_2']['placeholder'] = 'Address';
	 $fields['billing']['billing_address_1']['placeholder'] = 'Address';
	 $fields['billing']['billing_address_2']['placeholder'] = 'Address';
	 $fields['shipping']['shipping_state']['placeholder'] = 'County';
	 $fields['shipping']['shipping_postcode']['placeholder'] = 'Postcode';
	 $fields['billing']['billing_state']['placeholder'] = 'County';
	 $fields['billing']['billing_postcode']['placeholder'] = 'Postcode';
     $fields['order']['order_comments']['placeholder'] = 'Notes about your order, such as special delivery instructions and preferred delivery days for subscriptions.';
	 return $fields;
}

add_action( 'woocommerce_after_customer_login_form', 'jk_login_message' );
function jk_login_message() {
    if ( get_option( 'woocommerce_enable_myaccount_registration' ) == 'yes' ) {
	?>
		<div class="woocommerce-info">
			<p><?php _e( 'Returning customers login. New users register for next time so you can:' ); ?></p>
			<ul>
				<li><?php _e( 'View your order history' ); ?></li>
				<li><?php _e( 'Check on your orders' ); ?></li>
				<li><?php _e( 'Edit your addresses' ); ?></li>
				<li><?php _e( 'Change your password' ); ?></li>
			</ul>
		</div>
	<?php
	}
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
	function woocommerce_output_upsells() {
	    woocommerce_upsell_display( 8,4 ); // Display 3 products in rows of 3
	}
}

add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );

function wc_minimum_order_amount() {
    // Set this variable to specify a minimum order value
    $minimum = 10;
    if ( WC()->cart->total < $minimum ) {
        if( is_cart() ) {
            wc_print_notice(
                sprintf( 'You must have an order with a minimum of %s to place your order, your current order total is %s.' ,
                    wc_price( $minimum ),
                    wc_price( WC()->cart->total )
                ), 'error'
            );
        } else {
            wc_add_notice(
                sprintf( 'You must have an order with a minimum of %s to place your order, your current order total is %s.' ,
                    wc_price( $minimum ),
                    wc_price( WC()->cart->total )
                ), 'error'
            );
        }
    }
}

add_action( 'woocommerce_check_cart_items', 'my_check_cost_of_bookings', 20 );

function my_check_cost_of_bookings() {
// Only run in the Cart or Checkout pages
    if ( is_cart() || is_checkout() ) {
    $bookable_total = $bookable_minimum = 0;
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            if ( isset( $cart_item['booking'] ) ) {//the cart contains a bookable product
                $quantity = $cart_item['quantity'];
                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $bookable_minimum = 20;
                $price = $_product->get_price();
                $taxable = $_product->is_taxable();
            if ( $taxable ) {
                if ( WC()->cart->tax_display_cart == 'excl' ) {
                    $product_subtotal = $_product->get_price_excluding_tax( $quantity );
                } else {
                    $product_subtotal = $_product->get_price_including_tax( $quantity );
                }
            // Non-taxable
            } else {
                $product_subtotal = $price * $quantity;
            }
                $bookable_total += $product_subtotal;
                if ( $bookable_total >= $bookable_minimum ) {
                    return;
                }
            }
        }
        if ( $bookable_total > $bookable_minimum ) {
            wc_add_notice( sprintf( '<strong>A Minimum of %s %s is required before checking out.</strong>' . '<br />Current cart\'s total: %s %s', $bookable_minimum, get_option( 'woocommerce_currency'), $bookable_total,get_option( 'woocommerce_currency') ), 'error' );
        }
    }
}

function add_menu_icons_styles(){

	echo '<style>
	#adminmenu #menu-posts-taxonomy div.wp-menu-image:before, #dashboard_right_now .taxonomy-count a:before {
		content: "\f323";
	}
	#adminmenu #menu-posts-shop_order div.wp-menu-image:before, #dashboard_right_now .shop_order-count a:before {
		content: "\f239";
	}
	#adminmenu #menu-posts-product div.wp-menu-image:before, #dashboard_right_now .product-count a:before {
		content: "\f174";
	}
	#adminmenu #menu-posts-shop_coupon div.wp-menu-image:before, #dashboard_right_now .shop_coupon-count a:before {
		content: "\f524";
	}
	#adminmenu #menu-posts-wc_booking div.wp-menu-image:before, #dashboard_right_now .wc_booking-count a:before {
		content: "\f508";
	}
	#adminmenu #menu-posts-bookable_resource div.wp-menu-image:before, #dashboard_right_now .bookable_resource-count a:before {
		content: "\f175";
	}
	#adminmenu #menu-posts-feedback div.wp-menu-image:before, #dashboard_right_now .feedback-count a:before {
		content: "\f125";
	}
	</style>';

}
add_action( 'admin_head', 'add_menu_icons_styles' );

function my_login_logo() { ?>
		<style type="text/css">
			body.login	{
				background: #396fb8;
			}
			.login #login {
				width: 100%;
				max-width: 1220px;
				min-width: 320px;
				margin: 0 auto;
				padding-top: 20px;
				padding-left: 20px;
				padding-right: 20px;
				background: #fff;
				border-top: 40px solid #f9b03f;
				border-left: 4px solid #f9b03f;
				border-right: 4px solid #f9b03f;
				border-bottom: 40px solid #f9b03f;
				border-radius: 5px;
			}
			#loginform {

			}
			body.login div#login h1 a {
				background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png);
				padding-bottom: 30px;
				background-position: center top;
				background-repeat: no-repeat;
				background-size: 500px auto;
				height: 151px;
				line-height: 1;
				margin: 0 auto 25px;
				outline: 0 none;
				overflow: hidden;
				padding: 0;
				text-decoration: none;
				text-indent: -9999px;
				width: 500px;
			}
		</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function remove_footer_admin () {
	echo '&copy; '. date('Y') . ' BednBreakfasttt. Site built by <a href="https://www.prydonian.digital">Mark Duwe</a>.';
}
add_filter('admin_footer_text', 'remove_footer_admin');
