<?php if ( ! defined('WOODMART_THEME_DIR')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------------------------------
 * Mobile menu burger icon
 * ------------------------------------------------------------------------------------------------
 */

if( ! class_exists( 'WOODMART_HB_Burger' ) ) {
	class WOODMART_HB_Burger extends WOODMART_HB_Element {

		public function __construct() {
			parent::__construct();
			$this->template_name = 'burger';
		}

		public function map() {
			$this->args = array(
				'type' => 'burger',
				'title' => esc_html__( 'Mobile menu', 'woodmart' ), 
				'text' => esc_html__( 'Mobile burger icon', 'woodmart' ), 
				'icon' => 'xts-i-burger-circle',
				'editable' => true,
				'container' => false,
				'edit_on_create' => true,
				'drag_target_for' => array(),
				'drag_source' => 'content_element',
				'removable' => true,
				'addable' => true,
				'params' => array(
					'style' => array(
						'id' => 'style',
						'title' => esc_html__( 'Style', 'woodmart' ), 
						'type' => 'selector',
						'tab' => esc_html__( 'General', 'woodmart' ), 
						'value' => 'icon',
						'options' => array(
							'icon' => array(
								'value' => 'icon',
								'label' => esc_html__( 'Icon', 'woodmart' ),
							),
							'text' => array(
								'value' => 'text',
								'label' => esc_html__( 'Icon with text', 'woodmart' ),
							),
						),
						'description' => esc_html__( 'You can change the burger icon style.', 'woodmart' ), 
					),
					'icon_design' => array(
						'id'      => 'icon_design',
						'title'   => esc_html__( 'Icon design', 'woodmart' ),
						'type'    => 'selector',
						'tab'     => esc_html__( 'General', 'woodmart' ),
						'value'   => '1',
						'options' => array(
							'1' => array(
								'value' => '1',
								'label' => esc_html__( 'First', 'woodmart' ),
								'image' => WOODMART_ASSETS_IMAGES . '/header-builder/mobile-menu-icons/first.jpg',
							),
							'6' => array(
								'value' => '6',
								'label' => esc_html__( 'Second', 'woodmart' ),
								'image' => WOODMART_ASSETS_IMAGES . '/header-builder/mobile-menu-icons/second.jpg',
							),
						),
					),
					'icon_type' => array(
						'id' => 'icon_type',
						'title' => esc_html__( 'Icon type', 'woodmart' ),
						'type' => 'selector',
						'tab' => esc_html__( 'General', 'woodmart' ),
						'value' => 'default',
						'options' => array(
							'default' => array(
								'value' => 'default',
								'label' => esc_html__( 'Default', 'woodmart' ),
								'image' => WOODMART_ASSETS_IMAGES . '/header-builder/default-icons/burger-default.jpg',
							),
							'custom' => array(
								'value' => 'custom',
								'label' => esc_html__( 'Custom', 'woodmart' ),
								'image' => WOODMART_ASSETS_IMAGES . '/header-builder/settings.jpg',
							),
						),
					),
					'custom_icon' => array(
						'id' => 'custom_icon',
						'title' => esc_html__( 'Custom icon', 'woodmart' ),
						'type' => 'image',
						'tab' => esc_html__( 'General', 'woodmart' ),
						'value' => '',
						'description' => '',
						'requires' => array(
							'icon_type' => array(
								'comparison' => 'equal',
								'value' => 'custom'
							)
						),
					),
					'position' => array(
						'id' => 'position',
						'title' => esc_html__( 'Position', 'woodmart' ), 
						'type' => 'selector',
						'tab' => esc_html__( 'General', 'woodmart' ), 
						'value' => 'left',
						'options' => array(
							'left' => array(
								'value' => 'left',
								'label' => esc_html__( 'Left', 'woodmart' ), 
							),
							'right' => array(
								'value' => 'right',
								'label' => esc_html__( 'Right', 'woodmart' ), 
							),
						),
						'description' => esc_html__( 'Position of the mobile menu sidebar.', 'woodmart' ), 
					),
					'search_form' => array(
						'id' => 'search_form',
						'title' => esc_html__( 'Show search form', 'woodmart' ), 
						'type' => 'switcher',
						'tab' => esc_html__( 'Show/Hide', 'woodmart' ),
						'value' => true,
					),
					'post_type'           => array(
						'id'       => 'post_type',
						'title'    => esc_html__( 'Post type', 'woodmart' ),
						'type'     => 'selector',
						'tab'      => esc_html__( 'Show/Hide', 'woodmart' ),
						'value'    => 'product',
						'options'  => array(
							'product'   => array(
								'value' => 'product',
								'label' => esc_html__( 'Product', 'woodmart' ),
							),
							'post'      => array(
								'value' => 'post',
								'label' => esc_html__( 'Post', 'woodmart' ),
							),
							'portfolio' => array(
								'value' => 'portfolio',
								'label' => esc_html__( 'Portfolio', 'woodmart' ),
							),
							'page'      => array(
								'value' => 'page',
								'label' => esc_html__( 'Page', 'woodmart' ),
							),
							'any'       => array(
								'value' => 'any',
								'label' => esc_html__( 'All post types', 'woodmart' ),
							),
						),
						'requires' => array(
							'search_form' => array(
								'comparison' => 'equal',
								'value'      => true,
							),
						),
					),
					'categories_menu' => array(
						'id'    => 'categories_menu',
						'title' => esc_html__( 'Show categories menu', 'woodmart' ),
						'type'  => 'switcher',
						'tab'   => esc_html__( 'Show/Hide', 'woodmart' ),
						'value' => false,
					),
					'tabs_swap' => array(
						'id'       => 'tabs_swap',
						'title'    => esc_html__( 'Swap menus', 'woodmart' ),
						'type'     => 'switcher',
						'tab'      => esc_html__( 'Show/Hide', 'woodmart' ),
						'value'    => false,
						'requires' => array(
							'categories_menu' => array(
								'comparison' => 'equal',
								'value'      => true,
							),
						),
					),
					'primary_menu_title'   => array(
						'id'          => 'primary_menu_title',
						'title'       => esc_html__( 'First menu tab title', 'woodmart' ),
						'type'        => 'text',
						'tab'         => esc_html__( 'Show/Hide', 'woodmart' ),
						'value'       => '',
						'description' => esc_html__( 'You can rewrite mobile menu tab title with this option. Or leave empty to have a default one - Menu.', 'woodmart' ),
						'requires'    => array(
							'categories_menu' => array(
								'comparison' => 'equal',
								'value'      => true,
							),
						),
					),
					'secondary_menu_title' => array(
						'id'          => 'secondary_menu_title',
						'title'       => esc_html__( 'Second menu tab title', 'woodmart' ),
						'type'        => 'text',
						'tab'         => esc_html__( 'Show/Hide', 'woodmart' ),
						'value'       => '',
						'description' => esc_html__( 'You can rewrite mobile menu tab title with this option. Or leave empty to have a default one - Categories.', 'woodmart' ),
						'requires'    => array(
							'categories_menu' => array(
								'comparison' => 'equal',
								'value'      => true,
							),
						),
					),
					'menu_id' => array(
						'id' => 'menu_id',
						'title' => esc_html__( 'Choose menu', 'woodmart' ), 
						'type' => 'select',
						'tab' => esc_html__( 'Show/Hide', 'woodmart' ),
						'value' => '',
						'callback' => 'get_menu_options',
						'description' => esc_html__( 'Choose which menu to display.', 'woodmart' ), 
						'requires' => array(
							'categories_menu' => array(
								'comparison' => 'equal',
								'value' => true
							)
						),
					),
					'show_wishlist' => array(
						'id'    => 'show_wishlist',
						'title' => esc_html__( 'Show wishlist', 'woodmart' ),
						'type'  => 'switcher',
						'tab'   => esc_html__( 'Show/Hide', 'woodmart' ),
						'value' => true,
					),
					'show_compare' => array(
						'id'    => 'show_compare',
						'title' => esc_html__( 'Show compare', 'woodmart' ),
						'type'  => 'switcher',
						'tab'   => esc_html__( 'Show/Hide', 'woodmart' ),
						'value' => true,
					),
					'show_account' => array(
						'id'    => 'show_account',
						'title' => esc_html__( 'Show account', 'woodmart' ),
						'type'  => 'switcher',
						'tab'   => esc_html__( 'Show/Hide', 'woodmart' ),
						'value' => true,
					),
					'close_btn' => array(
						'id'    => 'close_btn',
						'title' => esc_html__( 'Show close button', 'woodmart' ),
						'type'  => 'switcher',
						'tab'   => esc_html__( 'Show/Hide', 'woodmart' ),
						'value' => false,
					),
				),
			);

			if ( defined( 'WPML_PLUGIN_BASENAME' ) ) {
				$this->args['params']['languages']          = array(
					'id'    => 'languages',
					'title' => esc_html__( 'Show WPML languages', 'woodmart' ),
					'type'  => 'switcher',
					'tab'   => esc_html__( 'Show/Hide', 'woodmart' ),
					'value' => false,
				);
				$this->args['params']['show_language_flag'] = array(
					'id'       => 'show_language_flag',
					'title'    => esc_html__( 'Show flag of WPML languages', 'woodmart' ),
					'type'     => 'switcher',
					'tab'      => esc_html__( 'Show/Hide', 'woodmart' ),
					'value'    => true,
					'requires' => array(
						'languages' => array(
							'comparison' => 'equal',
							'value'      => true,
						),
					),
				);
			}
		}

	}

}
