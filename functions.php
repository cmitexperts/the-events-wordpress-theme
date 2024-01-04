<?php
/**
 * TheEvent functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TheEvent
 */

 // Register nav menus.......
register_nav_menus(
	array('primary-Menu' => 'Header Menu' , 'secondary-menu' => 'Footer Menu')
);

 //Register nav End.......

//custom logo image...........
add_theme_support('custom-header');

//logo end

//custom post type...
 /**
 * Register a custom post type called "speaker".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpcmit_custom_speaker() {
	$labels = array(
		'name'                  => _x( 'Speakers', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Speaker', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Speakers', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Speaker', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Speaker', 'textdomain' ),
		'new_item'              => __( 'New Speaker', 'textdomain' ),
		'edit_item'             => __( 'Edit Speaker', 'textdomain' ),
		'view_item'             => __( 'View Speaker', 'textdomain' ),
		'all_items'             => __( 'All Speakers', 'textdomain' ),
		'search_items'          => __( 'Search Speakers', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Speakers:', 'textdomain' ),
		'not_found'             => __( 'No Speakers found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Speakers found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Speaker Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Speaker archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Speaker', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Speaker', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Speakers list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Speakers list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Speakers list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => 'speaker custom post type.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => 'admin.php?page=the-event',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'speaker'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		// 'taxonomies'  => array( 'category','post_tag'),
		'supports'    => array( 'title', 'editor', 'author', 'thumbnail', 'comments','excerpt'),
		// 'show_in_rest'       => true
	);

	register_post_type( 'Speaker', $args );

}
add_action( 'init', 'wpcmit_custom_speaker' );

// add_filter( 'post_row_actions', 'remove_view_link_cpt' );
// function remove_view_link_cpt( $action ) {

//     unset ($action['view']);
//     return $action;
// }

// custom texonomies........................................

/**
 * Create two taxonomies, categorys and tagss for the post type "speaker".
 *
 * @see register_post_type() for registering custom post types.
 */
function wpcmit_create_speaker_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'categorys', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search categorys', 'textdomain' ),
		'all_items'         => __( 'All categorys', 'textdomain' ),
		'parent_item'       => __( 'Parent category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent category:', 'textdomain' ),
		'edit_item'         => __( 'Edit category', 'textdomain' ),
		'update_item'       => __( 'Update category', 'textdomain' ),
		'add_new_item'      => __( 'Add New category', 'textdomain' ),
		'new_item_name'     => __( 'New category Name', 'textdomain' ),
		'menu_name'         => __( 'Speaker-cat', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category' ),
	);

	register_taxonomy( 'category', array( 'speaker' ), $args );

	unset( $args );
	unset( $labels );
}
// hook into the init action and call create_speaker_taxonomies when it fires...
add_action( 'init', 'wpcmit_create_speaker_taxonomies', 0 );



//end...

//custom post type for venue gallery...
 /**
 * Register a custom post type called "speaker".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpcmit_custom_venue() {
	$labels = array(
		'name'                  => _x( 'Venues', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Venue', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Venues', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Venue', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Venue', 'textdomain' ),
		'new_item'              => __( 'New Venue', 'textdomain' ),
		'edit_item'             => __( 'Edit Venue', 'textdomain' ),
		'view_item'             => __( 'View Venue', 'textdomain' ),
		'all_items'             => __( 'All Venues', 'textdomain' ),
		'search_items'          => __( 'Search Venues', 'textdomain' ),
		'parent_item_colon'     => __( 'ParVenues found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Venues found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Venue Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Venue archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Venue', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Venue', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Venues list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Venues list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Venues list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => 'venue custom post type.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => 'admin.php?page=the-event',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'venue'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'    => array( 'title', 'editor', 'author', 'thumbnail', 'comments','excerpt'),

	);

	register_post_type( 'Venue', $args );
}
add_action( 'init', 'wpcmit_custom_venue' );


//venue gallery End...


//custom post type for Hotels...
 /**
 * Register a custom post type called "speaker".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpcmit_custom_hotel() {
	$labels = array(
		'name'                  => _x( 'Hotels', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Hotel', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Hotels', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Hotel', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Hotel', 'textdomain' ),
		'new_item'              => __( 'New Hotel', 'textdomain' ),
		'edit_item'             => __( 'Edit Hotel', 'textdomain' ),
		'view_item'             => __( 'View Hotel', 'textdomain' ),
		'all_items'             => __( 'All Hotels', 'textdomain' ),
		'search_items'          => __( 'Search Hotels', 'textdomain' ),
		'parent_item_colon'     => __( 'Parvenues found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Hotels found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Hotel Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Hotel archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Hotel', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Hotel', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Hotel list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Hotel list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'hotel list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => 'hotel custom post type.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => 'admin.php?page=the-event',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'hotel'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'    => array( 'title', 'editor', 'author', 'thumbnail', 'comments','excerpt'),

	);

	register_post_type( 'Hotel', $args );
}
add_action( 'init', 'wpcmit_custom_hotel' );
//Hotels gallery End...

//custom post type for Schedule...
 /**
 * Register a custom post type called "Schedule".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpcmit_custom_E_schedule() {
	$labels = array(
		'name'                  => _x( 'Schedules', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Schedule', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Schedules', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Schedule', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Schedule', 'textdomain' ),
		'new_item'              => __( 'New Schedule', 'textdomain' ),
		'edit_item'             => __( 'Edit Schedule', 'textdomain' ),
		'view_item'             => __( 'View Schedule', 'textdomain' ),
		'all_items'             => __( 'All schedules', 'textdomain' ),
		'search_items'          => __( 'Search Schedules', 'textdomain' ),
		'parent_item_colon'     => __( 'Parvenues found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Schedules found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Schedule Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Schedule archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Schedule', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Schedule', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Schedules list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Schedules list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Schedules list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => 'Schedule custom post type.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => 'admin.php?page=the-event',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'schedule'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'    => array( 'title', 'editor', 'author', 'thumbnail', 'comments','excerpt'),

	);
	

	register_post_type( 'E_schedule', $args );
}
add_action( 'init', 'wpcmit_custom_E_schedule' );
//schedual End...

//FEATURED IMAGE 
add_action( 'after_setup_theme', 'cxc_add_post_thumbnail_supports', 99 );
function cxc_add_post_thumbnail_supports() {
	add_theme_support( 'post-thumbnails' );
}
//FEATURED IMAGE  END..

// Multiple custom post types under one admin menu.....

  function custom_add_menu_page(){
	add_menu_page( 
		__( 'The Event', 'textdomain'),
		'The Event',
		'manage_options',
		'admin.php?page=the-event',
		'the_event_callback',
		'dashicons-admin-customizer',
		6
	); 
}
add_action( 'admin_menu', 'custom_add_menu_page');


// AJAX ..................//////

// function my_enqueue() {
//     wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );
//     wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
// }
// add_action( 'wp_enqueue_scripts', 'my_enqueue' );

function saveAjaxData() {

	$loadbtn = $_POST['load_more'];
	$filterValue = $_POST['filter'];
	$sameargs = array(
			'post_type' => 'hotel',
	  		'post_status' => 'publish',
	);
	// print_r($loadbtn);
	// die;
	?>
	<div class="row" id="p_container">
   <?php
   if($loadbtn == 'false'){
				if ( $filterValue == '1'){
					$args = array(
						'post_type' => 	$sameargs,
						'posts_per_page' => -1,
						'order' => 'ASC',
					);
				}
				else if ( $filterValue == '2'){
					$args = array(
						'post_type' => 	$sameargs,
						'posts_per_page' => 6,
					);
				}
				else if ( $filterValue == '3'){
					$args = array(
						'post_type' => 	$sameargs,
						'posts_per_page' => 6,
						'order' => 'ASC',
					);
				}
	}
	else{
		   $args =array( 
			'post_type' => 'hotel',
			'post_status' => 'publish',
			'posts_per_page' => 3,
			'order' => 'ASC',	
			'paged' => $_POST['paged'],
		);
	}
	
	$query = new WP_Query($args);
	while($query->have_posts()){
	  $query->the_post();
	  $img_path = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
?>
	  <div class="col-md-4" id="ajaxTesting">
	  <div class="hotel">
		<div class="hotel-img">
		  <img src="<?php echo $img_path[0]; ?>"  style="height:250px;width:400px;" alt="Hotel 1" class="img-fluid">
		</div>
		<h3><a href="#"><?php the_title(); ?></a></h3>
		<div class="stars">
		  <i class="bi bi-star-fill"></i>
		  <i class="bi bi-star-fill"></i>
		  <i class="bi bi-star-fill"></i>
		  <i class="bi bi-star-fill"></i>
		  <i class="bi bi-star-fill"></i>
		</div>
		<p><?php the_excerpt(); ?></p>
	  </div>
	</div>
	          
<?php
}
?>
</div>
<div class="count">
<?php
	$max_pages = $query->found_posts;
	print_r($max_pages);
	die;
?>
</div>
<?php
  wp_die();
}
add_action( 'wp_ajax_nopriv_load_ajax', 'saveAjaxData' );
add_action( 'wp_ajax_load_ajax', 'saveAjaxData' );

