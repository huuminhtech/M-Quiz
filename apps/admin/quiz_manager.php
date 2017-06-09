<?php
/**
 * MQuiz
 * @filename test_manager.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');


class Quiz_Manager
{
	public static function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
		add_meta_box("mquiz-metabox-custom", "M Quiz", array("Quiz_Manager", "meta_box_markup"), "quiz", "side", "core", null);
    }
    
    public static function meta_box_markup( $object )
    {
	?>
	<div class="misc-questions-count-section misc-questions-count">
<?php _e('Quiz questions:', 'huuminh');?> <span id="post-questions-count" class="red-text">40</span>
	</div>
	<div class="add-questions-button">
		<button type="button" id="add-question-btn" class="button button-primary button-large"><?php _e('Add Question', 'huuminh');?></button>
	</div>
	<?php
    }

	public static function quiz_save($post_id)
	{
		if ( isset( $_POST['quiz_time'] ) ) 
		{
	        update_post_meta( $post_id, 'quiz_time', sanitize_text_field( $_POST['quiz_time'] ) );
	    }
	    
	    if ( isset( $_POST['quiz_disallow_countdown'] ) ) 
	    {
	        update_post_meta( $post_id, 'quiz_disallow_countdown', sanitize_text_field( $_POST['quiz_disallow_countdown'] ) );
	    }
	    else
	    {
		    update_post_meta( $post_id, 'quiz_disallow_countdown', FALSE );
	    }
	    
	    if ( isset( $_POST['quiz_end_limit_reached'] ) ) 
	    {
	        update_post_meta( $post_id, 'quiz_end_limit_reached', sanitize_text_field( $_POST['quiz_end_limit_reached'] ) );
	    }
	    else
	    {
		    update_post_meta( $post_id, 'quiz_end_limit_reached', FALSE );
	    }
	    
	    if ( isset( $_POST['quiz_start_date'] ) ) {
	        update_post_meta( $post_id, 'quiz_start_date', sanitize_text_field( $_POST['quiz_start_date'] ) );
	    }
	    
	    if ( isset( $_POST['quiz_end_date'] ) ) {
	        update_post_meta( $post_id, 'quiz_end_date', sanitize_text_field( $_POST['quiz_end_date'] ) );
	    }
	    
	    if ( isset( $_POST['quiz_attempts'] ) ) {
	        update_post_meta( $post_id, 'quiz_attempts', sanitize_text_field( $_POST['quiz_attempts'] ) );
	    }
	    
	    
	    if ( isset( $_POST['quiz_show_questions'] ) ) {
	        update_post_meta( $post_id, 'quiz_show_questions', sanitize_text_field( $_POST['quiz_show_questions'] ) );
	    }
	    
	    if ( isset( $_POST['quiz_limit_questions'] ) ) {
	        update_post_meta( $post_id, 'quiz_limit_questions', sanitize_text_field( $_POST['quiz_limit_questions'] ) );
	    }
	    
	    if ( isset( $_POST['quiz_shuffle_questions'] ) ) {
	        update_post_meta( $post_id, 'quiz_shuffle_questions', sanitize_text_field( $_POST['quiz_shuffle_questions'] ) );
	    }
	    else
	    {
		    update_post_meta( $post_id, 'quiz_shuffle_questions', FALSE );
	    }
	    
	    if ( isset( $_POST['quiz_shuffle_answers'] ) ) {
	        update_post_meta( $post_id, 'quiz_shuffle_answers', sanitize_text_field( $_POST['quiz_shuffle_answers'] ) );
	    }
	    else
	    {
		    update_post_meta( $post_id, 'quiz_shuffle_answers', FALSE );
	    }
	    
	    if ( isset( $_POST['quiz_show_grade'] ) ) {
	        update_post_meta( $post_id, 'quiz_show_grade', sanitize_text_field( $_POST['quiz_show_grade'] ) );
	    }
	    else
	    {
		    update_post_meta( $post_id, 'quiz_show_grade', FALSE );
	    }
	    
	    if ( isset( $_POST['quiz_show_answers'] ) ) {
	        update_post_meta( $post_id, 'quiz_show_answers', sanitize_text_field( $_POST['quiz_show_answers'] ) );
	    }
	    else
	    {
		    update_post_meta( $post_id, 'quiz_show_answers', FALSE );
	    }
	    
	    if ( isset( $_POST['quiz_show_points'] ) ) {
	        update_post_meta( $post_id, 'quiz_show_points', sanitize_text_field( $_POST['quiz_show_points'] ) );
	    }
	    else
	    {
		    update_post_meta( $post_id, 'quiz_show_points', FALSE );
	    }
	    
	    if ( isset( $_POST['quiz_email_results'] ) ) {
	        update_post_meta( $post_id, 'quiz_email_results', sanitize_text_field( $_POST['quiz_email_results'] ) );
	    }
	    else
	    {
		    update_post_meta( $post_id, 'quiz_email_results', FALSE );
	    }
	    
	    if ( isset( $_POST['quiz_right_click'] ) ) {
	        update_post_meta( $post_id, 'quiz_right_click', sanitize_text_field( $_POST['quiz_right_click'] ) );
	    }
	    else
	    {
		    update_post_meta( $post_id, 'quiz_right_click', FALSE );
	    }
	}
	
	public static function add_post_field_top()
	{
		include_once(MQUIZ_ADMIN_VIEW_DIR."post_fields/quiz_top.php");
	}
	
	public static function add_post_field_bottom()
	{
		include_once(MQUIZ_ADMIN_VIEW_DIR."post_fields/quiz_bottom.php");
	}
}
?>