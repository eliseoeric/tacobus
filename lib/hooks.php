<?php
namespace Roots\Sage\Hooks;

function register_hooks() {
	$hook_manager = new Hook_Manager();
	$hook_manager->register_shortcodes(array(
		'columns',
		'headline',
		'divider',
		'accordion',
		'button',
		'menu_group',
		'social_links'
	));

	$hook_manager->register_posts(array(
		'menu_pt',
		'locations_pt',
	));

	$hook_manager->register_metabox_group(array(
		'location_mb',
		'menu_template_mb'
	));
}



class Hook_Manager {

	protected $shortcode_dir;
	protected $post_type_dir;
	protected $widget_dir;

	public function __construct()
	{
		$this->shortcode_dir = '/shortcodes/';
		$this->post_type_dir = '/post_types/';
		$this->widget_dir = '/widgets/';

		add_action( 'after_switch_theme', function() {
			flush_rewrite_rules();
		});

		add_filter( 'cmb2_show_on', array( $this, 'be_metabox_show_on_slug' ) ,10, 2 );
	}

	public function register_shortcodes( $shortcodes ) {
		foreach( $shortcodes as $code )
		{
			$this->register_type( $code, $this->shortcode_dir );
		}

		$column_list = array(
			'one_column',
			'two_columns',
			'three_columns',
			'four_columns',
			'five_columns',
			'six_columns',
			'seven_columns',
			'eight_columns',
			'nine_columns',
			'ten_columns',
			'eleven_columns',
			'twelve_columns',
			'row'
		);

		foreach( $column_list as $column ) {
			add_shortcode($column, 'bootstap_column');
		}
	}

	public function register_posts( $post_types ) {
		foreach( $post_types as $type )
		{
			$this->register_type( $type, $this->post_type_dir );
		}
	}

	public function register_type( $file, $dir ) {
		include_once( get_template_directory() . '/' . $dir . $file . '.php' );
	}

	public function register_widgets( $widgets ) {
		foreach( $widgets as $widget )
		{
			$this->register_type( $widget, $this->widget_dir );

			add_action('widgets_init', function() use ($widget) {
				register_widget( $widget );
			});
		}
	}

	function be_metabox_show_on_slug( $display, $meta_box ) {
        if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
            return $display;
        }
        if ( 'slug' !== $meta_box['show_on']['key'] ) {
            return $display;
        }
        $post_id = 0;
        // If we're showing it based on ID, get the current ID
        if ( isset( $_GET['post'] ) ) {
            $post_id = $_GET['post'];
        } elseif ( isset( $_POST['post_ID'] ) ) {
            $post_id = $_POST['post_ID'];
        }
        if ( ! $post_id ) {
            return $display;
        }
        $slug = get_post( $post_id )->post_name;
        // See if there's a match
        return in_array( $slug, (array) $meta_box['show_on']['value']);
    }

    public function register_metabox_group( $groups ) {
		foreach( $groups as $meta_box )
		{
			include_once( get_template_directory() . '/metaboxes/' . $meta_box . '.php' );
			add_filter( 'cmb2_init', $meta_box );
		}
	}

}

add_action('after_setup_theme', __NAMESPACE__ . '\\register_hooks');
