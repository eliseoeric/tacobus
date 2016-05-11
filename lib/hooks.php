<?php
namespace Roots\Sage\Hooks;

function register_hooks() {
	$hook_manager = new Hook_Manager();
	$hook_manager->register_shortcodes(array(
		'columns',
		'headline',
		'divider'
	));

	$hook_manager->register_posts(array(
		'menu_pt',
		'locations_pt'
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

}

add_action('after_setup_theme', __NAMESPACE__ . '\\register_hooks');
