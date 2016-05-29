<?php 
namespace Roots\Sage\Seeder;


class Post_Seeder {


	public function __construct() {

	}

	public function seed_locations() {
		$prefix = '_TB_';
		$data = $this->get_json_table( 'locations' );
		
		foreach ($data['locations'] as $location) {
			$meta = array(
				$prefix . 'street_address' 	=> $location['address']['street_address'],
				$prefix . 'city' 			=> $location['address']['city'],
				$prefix . 'state' 			=> $location['address']['state'],
				$prefix . 'zipcode' 		=> $location['address']['zipcode'],
				$prefix . 'phone'			=> $location['phone'],
				$prefix . 'external_url'	=> ( $location['external_url'] ? $location['external_url'] : '' ),
				$prefix . 'thumbnail_url'	=> ( $location['thumbnail_url'] ? $location['thumbnail_url'] : '' ),
			);

			if( $location['managers'] ){
				$managers = array();
				foreach($location['managers'] as $manager ) {
					$managers[] = array(
						$prefix . 'manager_name' => $manager['name'],
						$prefix . 'manager_position' => $manager['position']
					);
				}

				$meta[$prefix . 'location_managers'] =  $managers;
			}

			if( $location['hours'] ){
				$hours = array();
				foreach($location['hours'] as $schedule ) {
					$hours[] = array(
						'start_day' => $schedule['start_day'],
						'end_day' => $schedule['end_day'],
						'open_time' => $schedule['open_from'],
						'close_time' => $schedule['closed_at'],
						'hour_override' => $schedule['hour_override'],
					);
					
				}
				$meta[$prefix . 'location_hours'] = $hours ;
			}
			// dd($meta);
			wp_insert_post(array(
				'post_author'		=> 1,
				'post_content'		=> $location['content'],
				'post_title'		=> $location['title'],
				'post_status'		=> 'publish',
				'post_type'			=> 'location',
				'meta_input'		=>	$meta
			), true );
			
		}

		update_option('tacobus_location_seeded', 1);

	}

	public function seed_menu() {
		$prefix = '_TB_';
		$data = $this->get_json_table( 'menu' );

		foreach ($data['menus'] as $menu ) {

			$accordions = $this->build_accordions($menu['accordions'], $menu['title']);
			
			$content = $accordions . $menu['content'];
			// dd($content);

			wp_insert_post(array(
				'post_author'		=> 1,
				'post_content'		=> $content,
				'post_title'		=> $menu['title'],
				'post_status'		=> 'publish',
				'post_type'			=> 'menu_section',
			), true );
		}

		update_option('tacobus_menu_seeded', 2);

	}

	public function get_json_table( $filename ) {

		$uri = get_template_directory_uri() . '/data/' . $filename . '.json';
		$json_data = file_get_contents( $uri );

		return json_decode($json_data, true);

	}

	public function build_accordions( $accordions, $menu_title ) {
		$html = "<div class='panel-group ' id='" . $menu_title . "' role='tablist' aria-multiselectable='true'>";

		ob_start();?>
		<?php foreach ($accordions as $accordion ) {
			
			$price = ( $accordion['price'] ? $accordion['price'] : '' );
			$content = ( $accordion['content'] ? $accordion['content'] : '' );
			$image = ( $accordion['image'] ? $accordion['image'] : '' );
			?>
			<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="heading<?= $accordion['id'] ?>">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" class="collapsed" data-parent="#<?= $menu_title ?>" href="#<?= $accordion['id'] ?>" aria-expanded="false" aria-controls="<?= $accordion['id'] ?>">
			          <i class="fa fa-plus-square" aria-hidden="true"></i><?= $accordion['title'] ?>
			          <span> <?= $price; ?></span>
			        </a>
			      </h4>
			    </div>
			    <div id="<?= $accordion['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $accordion['id'] ?>">
			      <div class="panel-body">
			        <div class="row">
			        	<?php if($image) : ?>
			        		<div class="col-md-6">
			        			<img src="/wp-content/themes/tacobus/dist/images/menu/<?= $image ?>">
			        		</div>
			        		<div class="col-md-6">
			        			<?= $content; ?>
			        		</div>
			        	<?php else: ?>
			        		<?= $content; ?>
			        	<?php endif; ?>
			        </div>
			      </div>
			    </div>
			</div>
		<?php
		}
		
		$html .= ob_get_clean();

		return $html . "</div><!-- close .panel-group -->";
	}

}

function migrate_locations() {
	//Check option
	$location_seed = get_option('tacobus_location_seeded');
	$menu_seed = get_option('tacobus_menu_seeded');
	
	$post_seeder = new Post_Seeder();

	if( !$location_seed || $location_seed === 0 ) {
		//get the json file
		add_option( 'tacobus_location_seeded', 0 );
		$post_seeder->seed_locations();
	}


	if( !$menu_seed || $menu_seed === 0 ) {

		add_option( 'tacobus_menu_seeded', 0 );
		$post_seeder->seed_menu();
	}
	

	if( $menu_seed === '1' ) {
		$post_seeder->seed_menu();
	}
	//parse the json file
	//for each json entry, insert new post type location
}

add_action('after_setup_theme', __NAMESPACE__ . '\\migrate_locations');