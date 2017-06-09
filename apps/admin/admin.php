<?php

/**
 * MQuiz
 * @filename admin.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');

class Admin
{
	public function __construct()
	{
		add_filter( 'query_vars', array($this, 'add_query_vars_filter') );
		add_action( 'init', array( $this, 'includes' ) );
		add_action( 'admin_menu', array($this, "admin_menu") );
		add_action( 'current_screen', array( $this, 'init' ));
		//add_filter( 'redirect_post_location', array('Question_manager', 'redirect_post_location'), 1, 2 );
		

		add_action( 'wp_ajax_add_question', array('Question_manager', "ajax_add_question" ) );
		add_action( 'wp_ajax_get_answers', array('Question_manager', "ajax_get_answers" ) );
	}
	
	
	public function init()
	{
		
		global $pagenow;
		global $my_admin_page;
		$screen = get_current_screen();
		wp_enqueue_style('datetimepicker-styles', MQUIZ_PLGUIN_URL.'public/css/jquery.datetimepicker.css');
		wp_enqueue_style('admin-remodal', MQUIZ_PLGUIN_URL.'public/css/remodal.css');
		wp_enqueue_style('admin-remodal-theme', MQUIZ_PLGUIN_URL.'public/css/remodal-default-theme.css');
		wp_enqueue_style('admin-styles', MQUIZ_PLGUIN_URL.'public/css/admin.css');
		add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
		
		if('quiz' == $screen->id)
		{
			add_action( 'edit_form_after_title', array('Quiz_Manager', "add_post_field_top" ));
			add_action( 'edit_form_after_editor', array('Quiz_Manager', "add_post_field_bottom" ));
			 add_action( 'add_meta_boxes', array( 'Quiz_Manager', 'add_meta_box' ) );
			add_action( 'save_post', array('Quiz_Manager', 'quiz_save') );
		}
		elseif('quiz-question' == $screen->id)
		{
			
			add_action( 'edit_form_after_title', array('Question_manager', "add_post_field_top" ));
			add_action( 'edit_form_after_editor', array('Question_manager', "add_post_field_bottom" ));
			add_action( 'save_post', array('Question_manager', 'question_save'), 1, 2 );
		}
		
	}
	
	public function add_query_vars_filter($vars)
	{
		$vars[] = "quiz";
		return $vars;
	}
	
	public function admin_enqueue_scripts($hook)
	{
		$screen = get_current_screen();
		if('quiz' == $screen->id || 'quiz-question' == $screen->id ){
	        wp_enqueue_script( 'jquery-ui', MQUIZ_PLGUIN_URL . 'public/js/jquery-ui.min.js' );
		    wp_enqueue_script( 'remodal-min', MQUIZ_PLGUIN_URL . 'public/js/remodal.min.js' );
		    wp_enqueue_script( 'jquery-datetimepicker', MQUIZ_PLGUIN_URL . 'public/js/jquery.datetimepicker.js' );
		    wp_register_script('mquiz-admin-script', 
	        	MQUIZ_PLGUIN_URL . 'public/js/mquiz-admin.js', 
				array ('jquery', 'jquery-ui'), 
				false, false);
	        
	        wp_enqueue_script('mquiz-admin-script');
	        wp_localize_script( 'mquiz-admin-script', 'mquiz', array(
		        'ajaxurl'	=>  admin_url( 'admin-ajax.php' )
	        ) );
	    }
	}
	
	public function includes()
	{
		require_once(MQUIZ_ADMIN_DIR.'quiz_manager.php');
		require_once(MQUIZ_ADMIN_DIR.'question_manager.php');
	}
	
	public function admin_menu()
	{
		add_submenu_page( 'edit.php?post_type=quiz', 'Reports', 'Reports', 'manage_options', 'reports', array($this, "quiz_options"));
		add_submenu_page( 'edit.php?post_type=quiz', 'Settings', 'Settings', 'manage_options', 'mquiz-settings', array($this, "quiz_options"));
	}
	
	public function quiz_options()
	{
		
	}
}	

new Admin;
?>