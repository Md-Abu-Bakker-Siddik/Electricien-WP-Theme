<?php
namespace MascotCoreElectricien\CPT\MegaMenu;

use MascotCoreElectricien\Lib;

/**
 * Singleton class
 * class CPT_MegaMenu
 * @package MascotCoreElectricien\CPT\MegaMenu;
 */
final class CPT_MegaMenu implements Lib\Mascot_Core_Electricien_Interface_PostType {

	/**
	 * @var string
	 */
	public 	$ptKey;
	public 	$ptKeyRewriteBase;
	private $ptMenuIcon;
	private $ptSingularName;
	private $ptPluralName;

	/**
	 * Call this method to get singleton
	 *
	 * @return CPT_MegaMenu
	 */
	public static function Instance() {
		static $inst = null;
		if ($inst === null) {
			$inst = new CPT_MegaMenu();
		}
		return $inst;
	}

	/**
	 * Private ctor so nobody else can instance it
	 *
	 */
	private function __construct() {
		$this->ptSingularName = esc_html__( 'Parts - Mega Menu', 'mascot-core-electricien' );
		$this->ptPluralName = esc_html__( 'Parts - Mega Menu', 'mascot-core-electricien' );
		$this->ptKey = 'megamenu';
		$this->ptKeyRewriteBase = $this->ptKey;
		$this->ptMenuIcon = 'dashicons-mascot';
		add_filter( 'manage_edit-'.$this->ptKey.'_columns', array($this, 'customColumnsSettings') ) ;
		add_filter( 'manage_'.$this->ptKey.'_posts_custom_column', array($this, 'customColumnsContent') ) ;
	}

	/**
	 * @return string
	 */
	public function getPTKey() {
		return $this->ptKey;
	}

	/**
	 * registers custom post type & Tax
	 */
	public function register() {
		$this->registerCustomPostType();
	}

	/**
	 * Regsiters custom post type
	 */
	private function registerCustomPostType() {

		$labels = array(
			'name'					=> $this->ptPluralName,
			'singular_name'			=> $this->ptPluralName . ' ' . esc_html__( 'Item', 'mascot-core-electricien' ),
			'menu_name'				=> $this->ptPluralName,
			'name_admin_bar'		=> $this->ptPluralName,
			'archives'				=> esc_html__( 'Item Archives', 'mascot-core-electricien' ),
			'attributes'			=> esc_html__( 'Item Attributes', 'mascot-core-electricien' ),
			'parent_item_colon'		=> esc_html__( 'Parent Item:', 'mascot-core-electricien' ),
			'all_items'				=> esc_html__( 'All Items', 'mascot-core-electricien' ),
			'add_new_item'			=> esc_html__( 'Add New Item', 'mascot-core-electricien' ),
			'add_new'				=> esc_html__( 'Add New', 'mascot-core-electricien' ),
			'new_item'				=> esc_html__( 'New Item', 'mascot-core-electricien' ),
			'edit_item'				=> esc_html__( 'Edit Item', 'mascot-core-electricien' ),
			'update_item'			=> esc_html__( 'Update Item', 'mascot-core-electricien' ),
			'view_item'				=> esc_html__( 'View Item', 'mascot-core-electricien' ),
			'view_items'			=> esc_html__( 'View Items', 'mascot-core-electricien' ),
			'search_items'			=> esc_html__( 'Search Item', 'mascot-core-electricien' ),
			'not_found'				=> esc_html__( 'Not found', 'mascot-core-electricien' ),
			'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'mascot-core-electricien' ),
			'featured_image'		=> esc_html__( 'Featured Image', 'mascot-core-electricien' ),
			'set_featured_image'	=> esc_html__( 'Set featured image', 'mascot-core-electricien' ),
			'remove_featured_image'	=> esc_html__( 'Remove featured image', 'mascot-core-electricien' ),
			'use_featured_image'	=> esc_html__( 'Use as featured image', 'mascot-core-electricien' ),
			'insert_into_item'		=> esc_html__( 'Insert into item', 'mascot-core-electricien' ),
			'uploaded_to_this_item'	=> esc_html__( 'Uploaded to this item', 'mascot-core-electricien' ),
			'items_list'			=> esc_html__( 'Items list', 'mascot-core-electricien' ),
			'items_list_navigation'	=> esc_html__( 'Items list navigation', 'mascot-core-electricien' ),
			'filter_items_list'		=> esc_html__( 'Filter items list', 'mascot-core-electricien' ),
		);

		$args = array(
			'label'						=> $this->ptSingularName,
			'description'				=> esc_html__( 'Post Type Description', 'mascot-core-electricien' ),
			'labels'					=> $labels,
			'supports'					=> array( 'title', 'editor', ),
			'hierarchical'				=> false,
			'public'					=> true,
			'show_ui'					=> true,
			'show_in_menu'				=> true,
			'menu_position'				=> 31,
			'menu_icon'					=> $this->ptMenuIcon,
			'show_in_admin_bar'			=> true,
			'show_in_nav_menus'			=> true,
			'can_export'				=> true,
			'has_archive'				=> false,
			'exclude_from_search'		=> true,
			'publicly_queryable'		=> true,
			'capability_type'			=> 'page',
			'rewrite'					=> array( 'slug' => $this->ptKeyRewriteBase, 'with_front' => false ),
		);
		register_post_type( $this->ptKey, $args );

	}

	/**
	 * Custom Columns Settings
	 */
	public function customColumnsSettings( $columns ) {

		$columns = array(
			'cb'			=> '<input type="checkbox" />',
			'title'			=> esc_html__( 'Title', 'mascot-core-electricien' ),
			'active-megamenu'	=> esc_html__( 'Currently Active Mega Menu', 'mascot-core-electricien' ),
			'date'			=> esc_html__( 'Date', 'mascot-core-electricien' ),
		);
		return $columns;
	}

	/**
	 * Custom Columns Content
	 */
	public function customColumnsContent( $columns ) {
		global $post;
		switch( $columns ) {
			case 'active-megamenu' :
				if( mascot_core_electricien_theme_installed() ) {
					$active_headertop_id = electricien_get_redux_option( 'megamenu-settings-choose-megamenu-cpt-widget-area', 'default' );
					if( $post->ID == $active_headertop_id ) {
						echo '<a class="tm-btn tm-btn-danger tm-btn-sm disabled">Active</a>';
					}
				}
			break;

			default :
			break;
		}
	}

}