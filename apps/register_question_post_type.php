<?php
/**
 * MQuiz
 * @filename register_question_post_type.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');

add_action( 'init', 'mquiz_question_post_type_init' );

function mquiz_question_post_type_init() {
	$labels = array(
		'name'               => _x( 'Question Bank', 'Question Bank', 'huuminh' ),
		'singular_name'      => _x( 'Question', 'Question Bank', 'huuminh' ),
		'menu_name'          => _x( 'Questions', 'admin menu', 'huuminh' ),
		'name_admin_bar'     => _x( 'Question Bank', 'Question Bank', 'huuminh' ),
		'add_new'            => _x( 'Add Question', 'quiz', 'huuminh' ),
		'add_new_item'       => __( 'Add New Question', 'huuminh' ),
		'new_item'           => __( 'New Question', 'huuminh' ),
		'edit_item'          => __( 'Edit Question', 'huuminh' ),
		'view_item'          => __( 'View Question', 'huuminh' ),
		'all_items'          => __( 'Question Bank', 'huuminh' ),
		'search_items'       => __( 'Search Questions', 'huuminh' ),
		'parent_item_colon'  => __( 'Parent:', 'huuminh' ),
		'not_found'          => __( 'No Question found.', 'huuminh' ),
		'not_found_in_trash' => __( 'No Question found in Trash.', 'huuminh' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'huuminh' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => "edit.php?post_type=quiz",
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'quiz-question' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'show_in_nav_menus'  => true,
		'exclude_from_search'=> true,
		'supports'           => array( 'editor', 'author' )
	);

	register_post_type( 'quiz-question', $args );
}


?>