<?php
/**
 * MQuiz
 * @filename quiz_bottom.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');
global $post_id;
?>

<table class="mquiz-post-table mt10">
	<tr>
		<th class="w150"><label for="quiz_limit_questions"><?php _e('Limit Questions', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<input type="number" name="quiz_limit_questions" size="30" value="<?php echo get_post_meta($post_id, 'quiz_limit_questions', true);?>" id="quiz_limit_questions" spellcheck="true" class="form-controls">
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label for="quiz_show_questions"><?php _e('Show questions', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<select id="quiz_show_questions" name="quiz_show_questions">
					<option <?php selected( 1, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?> value="1"><?php _e('One by one', 'huuminh');?></option>
					<option <?php selected( 2, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="2">2</option>
					<option <?php selected( 3, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="3">3</option>
					<option <?php selected( 4, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="4">4</option>
					<option <?php selected( 5, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="5">5</option>
					<option <?php selected( 6, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="6">6</option>
					<option <?php selected( 7, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="7">7</option>
					<option <?php selected( 8, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="8">8</option>
					<option <?php selected( 9, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="9">9</option>
					<option <?php selected( 10, get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="10">10</option>
					<option <?php selected( '-1', get_post_meta($post_id, 'quiz_show_questions', true), true ); ?>  value="-1"><?php _e('All questions', 'huuminh');?></option>
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label for="quiz_attempts"><?php _e('Shuffle', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mt10">
				<div class="checkbox">
					<label>
						<input <?php checked( 'yes', get_post_meta($post_id, 'quiz_shuffle_questions', true), true ); ?> type="checkbox" value="yes" id="quiz_shuffle_questions" name="quiz_shuffle_questions"> <?php _e('Shuffle order of questions', 'huuminh');?>
					</label>
				</div>
			</div>
			<div class="mquiz-form-group mt10">
				<div class="checkbox">
					<label>
						<input <?php checked( 'yes', get_post_meta($post_id, 'quiz_shuffle_answers', true), true ); ?> type="checkbox" value="yes" id="quiz_shuffle_answers" name="quiz_shuffle_answers"> <?php _e('Shuffle order of answers', 'huuminh');?>
					</label>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label><?php _e('Quiz results report', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mt10">
				<div class="checkbox">
					<label>
						<input <?php checked( 'yes', get_post_meta($post_id, 'quiz_show_grade', true), true ); ?> type="checkbox" value="yes" id="quiz_show_grade" name="quiz_show_grade"> <?php _e('Show grade', 'huuminh');?>
					</label>
				</div>
			</div>
			<div class="mquiz-form-group mt10">
				<div class="checkbox">
					<label>
						<input <?php checked( 'yes', get_post_meta($post_id, 'quiz_show_answers', true), true ); ?>  type="checkbox" value="yes" id="quiz_show_answers" name="quiz_show_answers"> <?php _e('Show answers', 'huuminh');?>
					</label>
				</div>
			</div>
			<div class="mquiz-form-group mt10">
				<div class="checkbox">
					<label>
						<input <?php checked( 'yes', get_post_meta($post_id, 'quiz_show_points', true), true ); ?> type="checkbox" value="yes" id="quiz_show_points" name="quiz_show_points"> <?php _e('Show points', 'huuminh');?>
					</label>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label for="quiz_email_results"><?php _e('Send results by email', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<select id="quiz_email_results" name="quiz_email_results">
					<option <?php selected( 'do_not_send', get_post_meta($post_id, 'quiz_email_results', true), true ); ?> value="do_not_send"><?php _e('Do not send') ?></option>
					<option <?php selected( 'quiz_results', get_post_meta($post_id, 'quiz_email_results', true), true ); ?> value="quiz_results"><?php _e('Quiz results') ?></option>
					<option <?php selected( 'quiz_results_answers', get_post_meta($post_id, 'quiz_email_results', true), true ); ?> value="quiz_results_answers"><?php _e('Quiz results & Answers') ?></option>
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label for="quiz_right_click"><?php _e('Security', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mt10">
				<div class="checkbox">
					<label>
						<input <?php checked( 'yes', get_post_meta($post_id, 'quiz_right_click', true), true ); ?> type="checkbox" value="yes" id="quiz_right_click" name="quiz_right_click"> <?php _e('Disable Right-click', 'huuminh');?>
					</label>
				</div>
			</div>
		</td>
	</tr>
</table>