<?php
if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );
}

use XTS\Options;

Options::add_field(
	array(
		'id'          => 'add_to_cart_action',
		'name'        => esc_html__( 'Action after add to cart', 'woodmart' ),
		'group'       => esc_html__( 'Shopping cart widget', 'woodmart' ),
		'description' => esc_html__( 'Choose between showing an informative popup and opening the shopping cart widget.', 'woodmart' ),
		'type'        => 'buttons',
		'section'     => 'shop_section',
		'options'     => array(
			'popup'   => array(
				'name'  => esc_html__( 'Show popup', 'woodmart' ),
				'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'action-after-add-to-cart-show-popup.gif" alt="">', 'woodmart' ), true ),
				'value' => 'popup',
			),
			'widget'  => array(
				'name'  => esc_html__( 'Display widget', 'woodmart' ),
				'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'action-after-add-to-cart-display-widget.gif" alt="">', 'woodmart' ), true ),
				'value' => 'widget',
			),
			'nothing' => array(
				'name'  => esc_html__( 'No action', 'woodmart' ),
				'value' => 'nothing',
			),
		),
		'default'     => 'widget',
		'priority'    => 10,
	)
);

Options::add_field(
	array(
		'id'          => 'add_to_cart_action_timeout',
		'name'        => esc_html__( 'Hide widget automatically', 'woodmart' ),
		'group'       => esc_html__( 'Shopping cart widget', 'woodmart' ),
		'description' => esc_html__( 'After adding to cart the shopping cart widget will be hidden automatically', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'shop_section',
		'default'     => false,
		'priority'    => 20,
		'requires'    => array(
			array(
				'key'     => 'add_to_cart_action',
				'compare' => 'not_equals',
				'value'   => 'nothing',
			),
		),
	)
);

Options::add_field(
	array(
		'id'          => 'add_to_cart_action_timeout_number',
		'name'        => esc_html__( 'Hide widget after', 'woodmart' ),
		'group'       => esc_html__( 'Shopping cart widget', 'woodmart' ),
		'description' => esc_html__( 'Set the number of seconds for the shopping cart widget to be displayed after adding to cart', 'woodmart' ),
		'type'        => 'range',
		'section'     => 'shop_section',
		'default'     => 3,
		'min'         => 1,
		'max'         => 20,
		'step'        => 1,
		'priority'    => 30,
		'requires'    => array(
			array(
				'key'     => 'add_to_cart_action',
				'compare' => 'not_equals',
				'value'   => 'nothing',
			),
			array(
				'key'     => 'add_to_cart_action_timeout',
				'compare' => 'equals',
				'value'   => '1',
			),
		),
		'unit'        => 'sec',
	)
);

Options::add_field(
	array(
		'id'          => 'mini_cart_quantity',
		'name'        => esc_html__( 'Quantity input on shopping cart widget', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'quantity-input-shopping-cart-widget.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Give your customers an ability to change the number of products in the cart directly from the shopping cart widget.', 'woodmart' ),
		'group'       => esc_html__( 'Shopping cart widget', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'shop_section',
		'default'     => '0',
		'priority'    => 40,
		'class'       => 'xts-tooltip-bordered',
	)
);

Options::add_field(
	array(
		'id'       => 'show_sku_in_mini_cart',
		'name'     => esc_html__( 'Show SKU in mini cart', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'show-sku-in-mini-cart.jpg" alt="">', 'woodmart' ), true ),
		'group'    => esc_html__( 'SKU', 'woodmart' ),
		'type'     => 'switcher',
		'section'  => 'shop_section',
		'default'  => false,
		'priority' => 50,
	)
);

Options::add_field(
	array(
		'id'       => 'show_sku_in_cart',
		'name'     => esc_html__( 'Show SKU in cart page', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'show-sku-in-cart-page.jpg" alt="">', 'woodmart' ), true ),
		'group'    => esc_html__( 'SKU', 'woodmart' ),
		'type'     => 'switcher',
		'section'  => 'shop_section',
		'default'  => false,
		'priority' => 60,
	)
);

Options::add_field(
	array(
		'id'       => 'show_sku_in_email_order',
		'name'     => esc_html__( 'Show SKU in customer order received email', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'show-sku-in-customer-order-received-email.jpg" alt="">', 'woodmart' ), true ),
		'group'    => esc_html__( 'SKU', 'woodmart' ),
		'type'     => 'switcher',
		'section'  => 'shop_section',
		'default'  => false,
		'priority' => 70,
	)
);

Options::add_field(
	array(
		'id'       => 'show_sku_on_ajax',
		'name'     => esc_html__( 'Show SKU on search AJAX results', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'show-sku-on-search-ajax-results.jpg" alt="">', 'woodmart' ), true ),
		'group'    => esc_html__( 'SKU', 'woodmart' ),
		'type'     => 'switcher',
		'section'  => 'shop_section',
		'requires' => array(
			array(
				'key'     => 'search_by_sku',
				'compare' => 'equals',
				'value'   => '1',
			),
		),
		'default'  => false,
		'priority' => 80,
	)
);


Options::add_field(
	array(
		'id'          => 'catalog_mode',
		'name'        => esc_html__( 'Enable catalog mode', 'woodmart' ),
		'description' => esc_html__( 'You can hide all "Add to cart" buttons, cart widget, cart and checkout pages. This will allow you to showcase your products as an online catalog without ability to make a purchase.', 'woodmart' ),
		'group'       => esc_html__( 'Catalog mode', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'shop_section',
		'default'     => false,
		'priority'    => 90,
	)
);

Options::add_field(
	array(
		'id'          => 'size_guides',
		'name'        => esc_html__( 'Enable size guides', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'enable-size-guides.gif" alt="">', 'woodmart' ), true ),
		'description' => wp_kses(
			__( 'Turn on the size guide feature on the website. Read more information about this function in <a href="https://xtemos.com/docs/woodmart/faq-guides/create-size-guide-table/" target="_blank">our documentation</a>.', 'woodmart' ),
			array(
				'a'      => array(
					'href'   => true,
					'target' => true,
				),
				'br'     => array(),
				'strong' => array(),
			)
		),
		'group'       => esc_html__( 'Size guides', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'shop_section',
		'default'     => '1',
		'priority'    => 100,
	)
);

Options::add_field(
	array(
		'id'          => 'login_prices',
		'name'        => esc_html__( 'Login to see add to cart and prices', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'login-to-see-add-to-cart-and-prices.gif" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'You can restrict shopping functions only for logged in customers.', 'woodmart' ),
		'group'       => esc_html__( 'Hide add to cart and price', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'shop_section',
		'default'     => false,
		'priority'    => 110,
	)
);

Options::add_field(
	array(
		'id'          => 'empty_cart_text',
		'name'        => esc_html__( 'Empty cart text', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'empty-cart-text.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Text will be displayed if user don\'t add any products to cart', 'woodmart' ),
		'group'       => esc_html__( 'Cart page', 'woodmart' ),
		'type'        => 'textarea',
		'wysiwyg'     => false,
		'section'     => 'shop_section',
		'default'     => 'Before proceed to checkout you must add some products to your shopping cart.<br> You will find a lot of interesting products on our "Shop" page.',
		'priority'    => 120,
	)
);

/**
 * Swatches.
 */


/**
 * Variable product.
 */


Options::add_field(
	array(
		'id'          => 'quick_shop_variable',
		'name'        => esc_html__( '"Quick shop" for variable products', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'quick-shop-for-variable-products.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Allow your users to purchase variable products directly from the shop page.', 'woodmart' ),
		'group'       => esc_html__( 'General', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'variable_products_section',
		'default'     => '1',
		'priority'    => 10,
	)
);

Options::add_field(
	array(
		'id'          => 'swatches_scroll_top_desktop',
		'name'        => esc_html__( 'Scroll to top on variation select [desktop]', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'scroll-top-on-variation-select.gif" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'When you turn on this option and click on some variation with image, the page will be scrolled up to show that variation image in the main product gallery.', 'woodmart' ),
		'group'       => esc_html__( 'General', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'variable_products_section',
		't_tab'       => [
			'id'    => 'swatches_scroll_top_tabs',
			'tab'   => esc_html__( 'Desktop', 'woodmart' ),
			'icon'  => 'xts-i-desktop',
			'style' => 'devices',
		],
		'default'     => false,
		'priority'    => 20,
	)
);

Options::add_field(
	array(
		'id'          => 'swatches_scroll_top_mobile',
		'name'        => esc_html__( 'Scroll to top on variation select [mobile]', 'woodmart' ),
		'description' => esc_html__( 'When you turn on this option and click on some variation with image, the page will be scrolled up to show that variation image in the main product gallery.', 'woodmart' ),
		'group'       => esc_html__( 'General', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'variable_products_section',
		't_tab'       => [
			'id'   => 'swatches_scroll_top_tabs',
			'tab'  => esc_html__( 'Mobile', 'woodmart' ),
			'icon' => 'xts-i-phone',
		],
		'default'     => false,
		'priority'    => 30,
	)
);

Options::add_field(
	array(
		'id'           => 'grid_swatches_attribute',
		'name'         => esc_html__( 'Grid swatch attribute to display', 'woodmart' ),
		'hint'         => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'grid-swatch-attribute-to-display.gif" alt="">', 'woodmart' ), true ),
		'description'  => esc_html__( 'Choose the attribute that will be shown on the product grid.', 'woodmart' ),
		'group'        => esc_html__( 'Attribute swatches', 'woodmart' ),
		'type'         => 'select',
		'section'      => 'variable_products_section',
		'options'      => woodmart_product_attributes_array(),
		'priority'     => 40,
		'empty_option' => true,
	)
);

Options::add_field(
	array(
		'id'          => 'swatches_limit',
		'name'        => esc_html__( 'Limit swatches on grid', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'limit-swatches-on-grid.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Collapse swatches list on the product grid to save space in case a product has too many variations.', 'woodmart' ),
		'group'       => esc_html__( 'Attribute swatches', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'variable_products_section',
		'default'     => false,
		'priority'    => 50,
	)
);

Options::add_field(
	array(
		'id'       => 'swatches_limit_count',
		'name'     => esc_html__( 'Number of visible swatches', 'woodmart' ),
		'type'     => 'range',
		'section'  => 'variable_products_section',
		'group'    => esc_html__( 'Attribute swatches', 'woodmart' ),
		'default'  => 5,
		'min'      => 1,
		'step'     => 1,
		'max'      => 20,
		'priority' => 60,
		'requires' => array(
			array(
				'key'     => 'swatches_limit',
				'compare' => 'equals',
				'value'   => true,
			),
		),
		'unit'     => 'swatch',
	)
);

Options::add_field(
	array(
		'id'          => 'swatches_use_variation_images',
		'name'        => esc_html__( 'Use images from product variations', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'use-images-from-product-variations.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Swatches buttons will be filled with images chosen for product variations and not with images uploaded to attribute terms.', 'woodmart' ),
		'group'       => esc_html__( 'Attribute swatches', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'variable_products_section',
		'default'     => false,
		'priority'    => 70,
	)
);

Options::add_field(
	array(
		'id'          => 'swatches_labels_name',
		'name'        => esc_html__( 'Show selected option name on desktop and tablet', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'show-selected-option-name-on-desktop-and-tablet.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Swatches buttons will be filled with images chosen for product variations and not with images uploaded to attribute terms.', 'woodmart' ),
		'group'       => esc_html__( 'Attribute swatches', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'variable_products_section',
		'default'     => false,
		'priority'    => 80,
	)
);

Options::add_field(
	array(
		'id'          => 'variation_gallery',
		'name'        => esc_html__( 'Additional variations images', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'additional-variations-images.gif" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Add an ability to upload additional images for each variation in variable products.', 'woodmart' ),
		'group'       => esc_html__( 'Variations images', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'variable_products_section',
		'default'     => '1',
		'priority'    => 100,
	)
);

Options::add_field(
	array(
		'id'          => 'variation_gallery_storage_method',
		'name'        => esc_html__( 'Data storage method', 'woodmart' ),
		'description' => esc_html__( 'If you have problems with import/export of the additional variations images data, you need to use "Variations products meta" method.', 'woodmart' ),
		'group'       => esc_html__( 'Variations images', 'woodmart' ),
		'type'        => 'buttons',
		'section'     => 'variable_products_section',
		'options'     => array(
			'old' => array(
				'name'  => esc_html__( 'Parent product meta', 'woodmart' ),
				'value' => 'old',
			),
			'new' => array(
				'name'  => esc_html__( 'Variations products meta', 'woodmart' ),
				'value' => 'new',
			),
		),
		'requires'    => array(
			array(
				'key'     => 'variation_gallery',
				'compare' => 'equals',
				'value'   => '1',
			),
		),
		'default'     => 'old',
		'priority'    => 110,
	)
);

Options::add_field(
	array(
		'id'          => 'ajax_variation_threshold',
		'name'        => esc_html__( 'AJAX variation threshold', 'woodmart' ),
		'description' => esc_html__( 'Increase this value if you noticed a problem with additional variations images function.', 'woodmart' ),
		'group'       => esc_html__( 'Variations images', 'woodmart' ),
		'type'        => 'range',
		'section'     => 'variable_products_section',
		'requires'    => array(
			array(
				'key'     => 'variation_gallery',
				'compare' => 'equals',
				'value'   => '1',
			),
		),
		'default'     => 30,
		'min'         => 1,
		'max'         => 500,
		'step'        => 1,
		'priority'    => 120,
		'unit'        => 'var',
	)
);

Options::add_field(
	array(
		'id'          => 'hide_larger_price',
		'name'        => esc_html__( 'Hide "to" price', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'hide-to-price.gif" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'This option will hide a higher price for variable products and leave only a small one.', 'woodmart' ),
		'group'       => esc_html__( 'Price', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'variable_products_section',
		'default'     => false,
		'priority'    => 130,
	)
);

Options::add_field(
	array(
		'id'          => 'single_product_variations_price',
		'type'        => 'switcher',
		'name'        => esc_html__( 'Remove duplicate price for variable product', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'remove-duplicate-price-for-variable-product.gif" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'When you will select any variation, the price on the single product page will be updated with an actual variation price.', 'woodmart' ),
		'group'       => esc_html__( 'Price', 'woodmart' ),
		'section'     => 'variable_products_section',
		'default'     => '0',
		'priority'    => 140,
	)
);

/**
 * Labels.
 */
Options::add_field(
	array(
		'id'       => 'label_shape',
		'name'     => esc_html__( 'Label shape', 'woodmart' ),
		'type'     => 'buttons',
		'section'  => 'product_labels_section',
		'default'  => 'rounded',
		'options'  => array(
			'rounded'     => array(
				'name'  => esc_html__( 'Rounded', 'woodmart' ),
				'value' => 'rounded',
				'image' => WOODMART_ASSETS_IMAGES . '/settings/product-label/rounded.jpg',
			),
			'rectangular' => array(
				'name'  => esc_html__( 'Rectangular', 'woodmart' ),
				'value' => 'rectangular',
				'image' => WOODMART_ASSETS_IMAGES . '/settings/product-label/rectangular.jpg',
			),
		),
		'priority' => 10,
	)
);

Options::add_field(
	array(
		'id'          => 'percentage_label',
		'name'        => esc_html__( '"Sale" label in percentage', 'woodmart' ),
		'group'       => esc_html__( 'Sale', 'woodmart' ),
		'type'        => 'select',
		'description' => esc_html__( 'Works with Simple, Variable and External products only.', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'product_labels_section',
		'default'     => '1',
		'priority'    => 20,
	)
);

Options::add_field(
	array(
		'id'          => 'sale_label_bg_color',
		'name'        => esc_html__( '"Sale" label background', 'woodmart' ),
		'group'       => esc_html__( 'Sale', 'woodmart' ),
		'type'        => 'color',
		'section'     => 'product_labels_section',
		'selector_bg' => '.product-labels .product-label.onsale',
		'default'     => '',
		'priority'    => 30,
		'class'       => 'xts-col-6',
	)
);

Options::add_field(
	array(
		'id'       => 'sale_label_text_color',
		'name'     => esc_html__( '"Sale" label text color', 'woodmart' ),
		'group'    => esc_html__( 'Sale', 'woodmart' ),
		'type'     => 'color',
		'section'  => 'product_labels_section',
		'selector' => '.product-labels .product-label.onsale',
		'default'  => '',
		'priority' => 40,
		'class'    => 'xts-col-6',
	)
);

Options::add_field(
	array(
		'id'          => 'new_label',
		'name'        => esc_html__( '"New" label on products', 'woodmart' ),
		'group'       => esc_html__( 'New', 'woodmart' ),
		'description' => esc_html__( 'This label is displayed for products if you enabled this option for particular items.', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'product_labels_section',
		'default'     => '1',
		'priority'    => 50,
	)
);

Options::add_field(
	array(
		'id'          => 'new_label_days_after_create',
		'name'        => esc_html__( 'Automatic "New" label period', 'woodmart' ),
		'group'       => esc_html__( 'New', 'woodmart' ),
		'description' => esc_html__( 'Set a number of days to keep your products marked as "New" after creation.', 'woodmart' ),
		'type'        => 'range',
		'section'     => 'product_labels_section',
		'default'     => 0,
		'min'         => 0,
		'max'         => 365,
		'step'        => 1,
		'priority'    => 51,
		'unit'        => 'day',
	)
);

Options::add_field(
	array(
		'id'          => 'new_label_bg_color',
		'name'        => esc_html__( '"New" label background', 'woodmart' ),
		'group'       => esc_html__( 'New', 'woodmart' ),
		'type'        => 'color',
		'section'     => 'product_labels_section',
		'selector_bg' => '.product-labels .product-label.new',
		'default'     => '',
		'priority'    => 60,
		'class'       => 'xts-col-6',
	)
);

Options::add_field(
	array(
		'id'       => 'new_label_text_color',
		'name'     => esc_html__( '"New" label text color', 'woodmart' ),
		'group'    => esc_html__( 'New', 'woodmart' ),
		'type'     => 'color',
		'section'  => 'product_labels_section',
		'selector' => '.product-labels .product-label.new',
		'default'  => '',
		'priority' => 70,
		'class'    => 'xts-col-6',
	)
);

Options::add_field(
	array(
		'id'          => 'hot_label',
		'name'        => esc_html__( '"Hot" label on products', 'woodmart' ),
		'group'       => esc_html__( 'Hot', 'woodmart' ),
		'description' => esc_html__( 'Your products marked as "Featured" will have a badge with "Hot" label.', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'product_labels_section',
		'default'     => '1',
		'priority'    => 80,
	)
);

Options::add_field(
	array(
		'id'          => 'hot_label_bg_color',
		'name'        => esc_html__( '"Hot" label background', 'woodmart' ),
		'group'       => esc_html__( 'Hot', 'woodmart' ),
		'type'        => 'color',
		'section'     => 'product_labels_section',
		'selector_bg' => '.product-labels .product-label.featured',
		'default'     => '',
		'priority'    => 90,
		'class'       => 'xts-col-6',
	)
);

Options::add_field(
	array(
		'id'       => 'hot_label_text_color',
		'name'     => esc_html__( '"Hot" label text color', 'woodmart' ),
		'group'    => esc_html__( 'Hot', 'woodmart' ),
		'type'     => 'color',
		'section'  => 'product_labels_section',
		'selector' => '.product-labels .product-label.featured',
		'default'  => '',
		'priority' => 100,
		'class'    => 'xts-col-6',
	)
);

Options::add_field(
	array(
		'id'          => 'stock_label_bg_color',
		'name'        => esc_html__( '"Out of stock" label background', 'woodmart' ),
		'group'       => esc_html__( 'Out of stock', 'woodmart' ),
		'type'        => 'color',
		'section'     => 'product_labels_section',
		'selector_bg' => '.product-labels .product-label.out-of-stock',
		'default'     => '',
		'priority'    => 110,
		'class'       => 'xts-col-6',
	)
);

Options::add_field(
	array(
		'id'       => 'stock_label_text_color',
		'name'     => esc_html__( '"Out of stock" label text color', 'woodmart' ),
		'group'    => esc_html__( 'Out of stock', 'woodmart' ),
		'type'     => 'color',
		'section'  => 'product_labels_section',
		'selector' => '.product-labels .product-label.out-of-stock',
		'default'  => '',
		'priority' => 120,
		'class'    => 'xts-col-6',
	)
);

Options::add_field(
	array(
		'id'          => 'attribute_label_bg_color',
		'name'        => esc_html__( '"Attribute" label background', 'woodmart' ),
		'group'       => esc_html__( 'Attribute', 'woodmart' ),
		'type'        => 'color',
		'section'     => 'product_labels_section',
		'selector_bg' => '.product-labels .product-label.attribute-label:not(.label-with-img)',
		'default'     => '',
		'priority'    => 130,
		'class'       => 'xts-col-6',
	)
);

Options::add_field(
	array(
		'id'       => 'attribute_label_text_color',
		'name'     => esc_html__( '"Attribute" label text color', 'woodmart' ),
		'group'    => esc_html__( 'Attribute', 'woodmart' ),
		'type'     => 'color',
		'section'  => 'product_labels_section',
		'selector' => '.product-labels .product-label.attribute-label:not(.label-with-img)',
		'default'  => '',
		'priority' => 140,
		'class'    => 'xts-col-6',
	)
);

/**
 * Brands.
 */
Options::add_field(
	array(
		'id'           => 'brands_attribute',
		'name'         => esc_html__( 'Brand attribute', 'woodmart' ),
		'description'  => wp_kses( __( 'If you want to show brand image on your product page select desired attribute here. Read more information in our <a href="https://xtemos.com/docs-topic/product-brands/" target="_blank">documentation</a>.', 'woodmart' ), true ),
		'type'         => 'select',
		'section'      => 'brands_section',
		'options'      => woodmart_product_attributes_array(),
		'priority'     => 10,
		'default'      => 'pa_brand',
		'empty_option' => true,
	)
);

Options::add_field(
	array(
		'id'          => 'product_page_brand',
		'name'        => esc_html__( 'Show brand on the single product page', 'woodmart' ),
		'description' => esc_html__( 'You can disable/enable product\'s brand image on the single page.', 'woodmart' ),
		'type'        => 'switcher',
		'on-text'     => esc_html__( 'Yes', 'woodmart' ),
		'off-text'    => esc_html__( 'No', 'woodmart' ),
		'section'     => 'brands_section',
		'default'     => '1',
		'priority'    => 20,
	)
);

Options::add_field(
	array(
		'id'          => 'product_brand_location',
		'name'        => esc_html__( 'Brand position on the product page', 'woodmart' ),
		'description' => esc_html__( 'Select a position of the brand image on the single product page.', 'woodmart' ),
		'type'        => 'buttons',
		'section'     => 'brands_section',
		'options'     => array(
			'about_title' => array(
				'name'  => esc_html__( 'Aligned on the right of the product title', 'woodmart' ),
				'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'brand-position-the-product-page-right.jpg" alt="">', 'woodmart' ), true ),
				'value' => 'about_title',
			),
			'sidebar'     => array(
				'name'  => esc_html__( 'Sidebar', 'woodmart' ),
				'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'brand-position-the-product-page-sidebar.jpg" alt="">', 'woodmart' ), true ),
				'value' => 'sidebar',
			),
		),
		'priority'    => 30,
		'default'     => 'about_title',
	)
);

Options::add_field(
	array(
		'id'          => 'brand_tab',
		'name'        => esc_html__( 'Show tab with brand information', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'show-tab-with-brand-information.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( ' If enabled you will see an additional tab with brand description on the single product page. Text will be taken from the "Description" field for each brand (attribute term).', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'brands_section',
		'on-text'     => esc_html__( 'Yes', 'woodmart' ),
		'off-text'    => esc_html__( 'No', 'woodmart' ),
		'default'     => '1',
		'priority'    => 40,
	)
);

Options::add_field(
	array(
		'id'          => 'brand_tab_name',
		'name'        => esc_html__( 'Use brand name for tab title', 'woodmart' ),
		'description' => esc_html__( 'If you enable this option, the tab with the brand information will be called "About [Brand name]".', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'brands_section',
		'on-text'     => esc_html__( 'Yes', 'woodmart' ),
		'off-text'    => esc_html__( 'No', 'woodmart' ),
		'default'     => false,
		'priority'    => 50,
		'requires'    => array(
			array(
				'key'     => 'brand_tab',
				'compare' => 'equals',
				'value'   => '1',
			),
		),
	)
);

/**
 * Quick view.
 */
Options::add_field(
	array(
		'id'          => 'quick_view',
		'name'        => esc_html__( 'Quick view', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'shop-quick-view.gif" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Enable Quick view option. Ability to see the product information with AJAX.', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'quick_view_section',
		'default'     => '1',
		'priority'    => 10,
	)
);

Options::add_field(
	array(
		'id'          => 'quick_view_layout',
		'name'        => esc_html__( 'Quick view layout', 'woodmart' ),
		'description' => esc_html__( 'Choose between horizontal and vertical layouts for the quick view window.', 'woodmart' ),
		'group'       => esc_html__( 'Layout', 'woodmart' ),
		'type'        => 'buttons',
		'section'     => 'quick_view_section',
		'default'     => 'horizontal',
		'options'     => array(
			'horizontal' => array(
				'name'  => esc_html__( 'Horizontal', 'woodmart' ),
				'value' => 'horizontal',
				'image' => WOODMART_ASSETS_IMAGES . '/settings/quick-view-layout/horizontal.jpg',
			),
			'vertical'   => array(
				'name'  => esc_html__( 'Vertical', 'woodmart' ),
				'value' => 'vertical',
				'image' => WOODMART_ASSETS_IMAGES . '/settings/quick-view-layout/vertical.jpg',
			),
		),
		'priority'    => 20,
	)
);

Options::add_field(
	array(
		'id'          => 'quickview_width',
		'name'        => esc_html__( 'Quick view width', 'woodmart' ),
		'description' => esc_html__( 'Set width of the quick view in pixels.', 'woodmart' ),
		'group'       => esc_html__( 'Layout', 'woodmart' ),
		'type'        => 'range',
		'section'     => 'quick_view_section',
		'default'     => 920,
		'min'         => 400,
		'step'        => 10,
		'max'         => 1200,
		'priority'    => 30,
		'unit'        => 'px',
	)
);

Options::add_field(
	array(
		'id'          => 'quick_view_variable',
		'name'        => esc_html__( 'Show variations on quick view', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'show-variations-on-quick-view.gif" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Enable Quick view option for variable products. Will allow your users to purchase variable products directly from the quick view.', 'woodmart' ),
		'group'       => esc_html__( 'Settings', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'quick_view_section',
		'default'     => '1',
		'priority'    => 40,
	)
);

/**
 * Compare.
 */
Options::add_field(
	array(
		'id'          => 'compare',
		'name'        => esc_html__( 'Enable compare', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'shop-compare.jpg" alt="">', 'woodmart' ), true ),
		'description' => wp_kses( __( 'Enable compare functionality built in with the theme. Read more information in our <a href="https://xtemos.com/docs/woodmart/woodmart-compare/">documentation</a>.', 'woodmart' ), true ),
		'type'        => 'switcher',
		'section'     => 'compare_section',
		'default'     => '1',
		'priority'    => 10,
	)
);

Options::add_field(
	array(
		'id'           => 'compare_page',
		'name'         => esc_html__( 'Compare page', 'woodmart' ),
		'description'  => esc_html__( 'Select a page for the compare table. It should contain the shortcode: [woodmart_compare]', 'woodmart' ),
		'type'         => 'select',
		'section'      => 'compare_section',
		'options'      => '',
		'callback'     => 'woodmart_get_pages_array',
		'empty_option' => true,
		'select2'      => true,
		'default'      => 265,
		'priority'     => 20,
	)
);


Options::add_field(
	array(
		'id'          => 'compare_on_grid',
		'name'        => esc_html__( 'Show button on product grid', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'show-button-on-product-grid.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Display compare product button on all products grids and lists.', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'compare_section',
		'default'     => '1',
		'priority'    => 25,
	)
);

Options::add_field(
	array(
		'id'          => 'fields_compare',
		'name'        => esc_html__( 'Select fields for compare table', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'select-fields-for-compare-table.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Choose which fields should be presented on the product compare page with table.', 'woodmart' ),
		'type'        => 'select',
		'multiple'    => true,
		'select2'     => true,
		'section'     => 'compare_section',
		'options'     => woodmart_compare_available_fields( true ),
		'default'     => array(
			'description',
			'sku',
			'availability',
		),
		'priority'    => 30,
	)
);

Options::add_field(
	array(
		'id'          => 'empty_compare_text',
		'name'        => esc_html__( 'Empty compare text', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'empty-compare-text.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Text will be displayed if user don\'t add any products to compare', 'woodmart' ),
		'default'     => 'No products added in the compare list. You must add some products to compare them.<br> You will find a lot of interesting products on our "Shop" page.',
		'type'        => 'textarea',
		'wysiwyg'     => false,
		'section'     => 'compare_section',
		'priority'    => 40,
	)
);

Options::add_field(
	array(
		'id'          => 'compare_by_category',
		'name'        => esc_html__( 'Enable compare by category', 'woodmart' ),
		'group'       => esc_html__( 'Compare by category', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'compare-by-category.gif" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'Group the products added to the compare list in order to compare them according to their categories.', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'compare_section',
		'default'     => '0',
		'priority'    => 50,
	)
);

Options::add_field(
	array(
		'id'          => 'show_more_products_btn',
		'name'        => esc_html__( 'Show "Compare more products" buttons', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'show-compare-more-products-buttons.jpg" alt="">', 'woodmart' ), true ),
		'group'       => esc_html__( 'Compare by category', 'woodmart' ),
		'description' => esc_html__( 'Display a button that leads to the selected category.', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'compare_section',
		'default'     => '1',
		'requires'    => array(
			array(
				'key'     => 'compare_by_category',
				'compare' => 'equals',
				'value'   => '1',
			),
		),
		'priority'    => 60,
	)
);

/**
 * Wishlist (60).
 */

/**
 * Thank you page.
 */
Options::add_field(
	array(
		'id'       => 'thank_you_page_content_type',
		'name'     => esc_html__( 'Extra content for "Thank you page"', 'woodmart' ),
		'hint'     => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'extra-content-for-thank-you-page.jpg" alt="">', 'woodmart' ), true ),
		'type'     => 'buttons',
		'section'  => 'thank_you_page_section',
		'options'  => array(
			'text'       => array(
				'name'  => esc_html__( 'Text', 'woodmart' ),
				'value' => 'text',
			),
			'html_block' => array(
				'name'  => esc_html__( 'HTML Block', 'woodmart' ),
				'value' => 'html_block',
			),
		),
		'default'  => 'text',
		'priority' => 10,
		'class'    => 'xts-html-block-switch',
	)
);

Options::add_field(
	array(
		'id'       => 'thank_you_page_extra_content',
		'type'     => 'textarea',
		'wysiwyg'  => true,
		'name'     => esc_html__( 'Text', 'woodmart' ),
		'section'  => 'thank_you_page_section',
		'requires' => array(
			array(
				'key'     => 'thank_you_page_content_type',
				'compare' => 'equals',
				'value'   => 'text',
			),
		),
		'priority' => 20,
	)
);

Options::add_field(
	array(
		'id'           => 'thank_you_page_html_block',
		'type'         => 'select',
		'section'      => 'thank_you_page_section',
		'name'         => esc_html__( 'HTML Block', 'woodmart' ),
		'select2'      => true,
		'empty_option' => true,
		'autocomplete' => array(
			'type'   => 'post',
			'value'  => 'cms_block',
			'search' => 'woodmart_get_post_by_query_autocomplete',
			'render' => 'woodmart_get_post_by_ids_autocomplete',
		),
		'requires'     => array(
			array(
				'key'     => 'thank_you_page_content_type',
				'compare' => 'equals',
				'value'   => 'html_block',
			),
		),
		'priority'     => 30,
	)
);


Options::add_field(
	array(
		'id'          => 'thank_you_page_default_content',
		'name'        => esc_html__( 'Default "Thank you page" content', 'woodmart' ),
		'hint'        => wp_kses( __( '<img data-src="' . WOODMART_TOOLTIP_URL . 'default-thank-you-page-content.jpg" alt="">', 'woodmart' ), true ),
		'description' => esc_html__( 'If you use custom extra content you can disable default WooCommerce order details on the thank you page', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'thank_you_page_section',
		'default'     => '1',
		'priority'    => 40,
	)
);
