<?php
/**
 * MQuiz
 * @filename register_quiz_post_type.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');

add_action( 'init', 'mquiz_post_type_init' );

function mquiz_post_type_init() {
	$labels = array(
		'name'               => _x( 'M Quiz', 'post type general name', 'huuminh' ),
		'singular_name'      => _x( 'Quiz', 'post type singular name', 'huuminh' ),
		'menu_name'          => _x( 'Quiz', 'admin menu', 'huuminh' ),
		'name_admin_bar'     => _x( 'Quiz', 'add new on admin bar', 'huuminh' ),
		'add_new'            => _x( 'Add Quiz', 'quiz', 'huuminh' ),
		'add_new_item'       => __( 'Add New Quiz', 'huuminh' ),
		'new_item'           => __( 'New Quiz', 'huuminh' ),
		'edit_item'          => __( 'Edit Quiz', 'huuminh' ),
		'view_item'          => __( 'View Quiz', 'huuminh' ),
		'all_items'          => __( 'All Quiz', 'huuminh' ),
		'search_items'       => __( 'Search Quiz', 'huuminh' ),
		'parent_item_colon'  => __( 'Parent Quiz:', 'huuminh' ),
		'not_found'          => __( 'No Quiz found.', 'huuminh' ),
		'not_found_in_trash' => __( 'No Quiz found in Trash.', 'huuminh' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'huuminh' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'quiz' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'show_in_nav_menus'  => true,
		'exclude_from_search'=> false,
		'taxonomies' 		 => array( 'quiz-category', 'quiz-tags' ),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'quiz', $args );
}

add_action( 'init', 'mquiz_taxonomies_init', 0 );
function mquiz_taxonomies_init() {
	$labels = array(
		'name'              => _x( 'Quiz Categories', 'Quiz Categories', 'huuminh' ),
		'singular_name'     => _x( 'Quiz Category', 'Quiz Category', 'huuminh' ),
		'search_items'      => __( 'Search Quiz Categories', 'huuminh' ),
		'all_items'         => __( 'All Quiz Categories', 'huuminh' ),
		'parent_item'       => __( 'Parent Category', 'huuminh' ),
		'parent_item_colon' => __( 'Parent Category:', 'huuminh' ),
		'edit_item'         => __( 'Edit Category', 'huuminh' ),
		'update_item'       => __( 'Update Category', 'huuminh' ),
		'add_new_item'      => __( 'Add New Category', 'huuminh' ),
		'new_item_name'     => __( 'New Category Name', 'huuminh' ),
		'menu_name'         => __( 'Category', 'huuminh' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'quiz-category' ),
	);

	register_taxonomy( 'quiz-category', array( 'quiz' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Tags', 'Quiz Tags', 'huuminh' ),
		'singular_name'              => _x( 'Tag', 'Quiz Tag', 'huuminh' ),
		'search_items'               => __( 'Search Quiz Tags', 'huuminh' ),
		'popular_items'              => __( 'Popular Quiz Tags', 'huuminh' ),
		'all_items'                  => __( 'All Quiz Tags', 'huuminh' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Quiz Tag', 'huuminh' ),
		'update_item'                => __( 'Update Quiz Tag', 'huuminh' ),
		'add_new_item'               => __( 'Add New Quiz Tag', 'huuminh' ),
		'new_item_name'              => __( 'New Quiz Tag Name', 'huuminh' ),
		'separate_items_with_commas' => __( 'Separate writers with commas', 'huuminh' ),
		'add_or_remove_items'        => __( 'Add or remove Quiz Tag', 'huuminh' ),
		'choose_from_most_used'      => __( 'Choose from the most used Quiz Tag', 'huuminh' ),
		'not_found'                  => __( 'No Quiz Tag found.', 'huuminh' ),
		'menu_name'                  => __( 'Quiz Tags', 'huuminh' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'quiz-tags' ),
	);

	register_taxonomy( 'quiz-tags', 'quiz', $args );
}
?>