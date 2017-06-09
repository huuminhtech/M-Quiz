<?php
/**
 * MQuiz
 * @filename question_manager.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');

class Question_manager
{
	public static function ajax_add_question()
	{
		include(MQUIZ_ADMIN_VIEW_DIR.'ajax-question-from.php');
		die;
	}
	
	public static function question_save($post_id, $post)
	{
		if ( isset( $_POST['question_point'] ) ) 
		{
	        update_post_meta( $post_id, 'question_point', sanitize_text_field( $_POST['question_point'] ) );
	    }
	    
		if ( isset( $_POST['question_type'] ) ) 
		{
	        update_post_meta( $post_id, 'question_type', sanitize_text_field( $_POST['question_type'] ) );
	    }
	    
	    if ( isset( $_POST['number_answers'] ) ) 
		{
	        update_post_meta( $post_id, 'number_answers', sanitize_text_field( $_POST['number_answers'] ) );
	    }
	    
	    if ( isset( $_POST['shuffle_question'] ) ) 
		{
	        update_post_meta( $post_id, 'shuffle_question', sanitize_text_field( $_POST['shuffle_question'] ) );
	    }
	    
	    if ( isset( $_POST['answers'] ) ) 
		{
	        update_post_meta( $post_id, 'answers', $_POST['answers'] );
	    }
	    
	    if ( isset( $_POST['correct'] ) ) 
		{
	        update_post_meta( $post_id, 'correct', $_POST['correct'] );
	    }
	    
	    if ( isset( $_POST['percent'] ) ) 
		{
	        update_post_meta( $post_id, 'percent',  $_POST['percent'] );
	    }
	}
	
	public static function redirect_post_location($location, $post_id)
	{
		var_dump($location);die;
	}
	
	public static function add_post_field_bottom()
	{
		include_once(MQUIZ_ADMIN_VIEW_DIR."post_fields/question_bottom.php");
	}
	
	public static function add_post_field_top()
	{
		include_once(MQUIZ_ADMIN_VIEW_DIR."post_fields/question_top.php");
	}
	
	public static function ajax_get_answers()
	{
		$post_id = !empty($_POST['post_id']) ? (int) $_POST['post_id'] : FALSE;
		$question_type = !empty($_POST['question_type']) ? (int) $_POST['question_type'] : FALSE;
		$number_answers = !empty($_POST['number_answers']) ? (int) $_POST['number_answers'] : FALSE;
		
		if(!$post_id || !$question_type || !$number_answers)
		{
			wp_die( 'Access Denied' );
		}
		
		$post_answers = get_post_meta( $post_id, 'answers', true );
		$post_correct = get_post_meta( $post_id, 'correct', true );
		$post_percent = get_post_meta( $post_id, 'percent', true );
		if($number_answers > 0){
			
			for($i = 1; $i <= $number_answers; $i++)
			{
				$correct = FALSE;
				$answer = (!empty($post_answers[$i])) ? $post_answers[$i] : "";
				$percent = (!empty($post_percent[$i])) ? $post_percent[$i] : 0;
				if(is_array($post_correct))
				{
					$correct = !empty($post_correct[$i]) ? TRUE : FALSE;
				}
				elseif($post_correct == $i)
				{
					$correct = TRUE;
				}
				
				if($question_type == 1)
				{
					include(MQUIZ_ADMIN_VIEW_DIR."question_fields/multiple_choice.php");
				}
				elseif($question_type == 2)
				{
					include(MQUIZ_ADMIN_VIEW_DIR."question_fields/multiple_answer.php");
				}
				elseif($question_type == 3)
				{
					if($i > 2)
					{
						break;
					}
					include(MQUIZ_ADMIN_VIEW_DIR."question_fields/true_false.php");
				}
			}
		}

		die;
	}
}

?>