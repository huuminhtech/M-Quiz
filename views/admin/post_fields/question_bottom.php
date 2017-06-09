<?php
/**
 * MQuiz
 * @filename question_bottom.php
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
		<th class="w150"><label for="question_type"><?php _e('Question type', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<select id="question_type" name="question_type">
					<option <?php selected( 1, get_post_meta($post_id, 'question_type', true), true ); ?> value="1"><?php _e('Multiple choice', 'huuminh');?></option>
					<option <?php selected( 2, get_post_meta($post_id, 'question_type', true), true ); ?> value="2"><?php _e('Multiple answer', 'huuminh');?></option>
					<option <?php selected( 3, get_post_meta($post_id, 'question_type', true), true ); ?> value="3"><?php _e('True/false', 'huuminh');?></option>
					<option <?php selected( 4, get_post_meta($post_id, 'question_type', true), true ); ?> value="4"><?php _e('Short answer', 'huuminh');?></option>
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label for="question_type"><?php _e('Number of answers', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<select id="number_answers" name="number_answers">
					<option <?php selected( 2, get_post_meta($post_id, 'number_answers', true), true ); ?> value="2">2</option>
					<option <?php selected( 3, get_post_meta($post_id, 'number_answers', true), true ); ?> value="3">3</option>
					<option <?php selected( 4, get_post_meta($post_id, 'number_answers', true), true ); ?> value="4">4</option>
					<option <?php selected( 5, get_post_meta($post_id, 'number_answers', true), true ); ?> value="5">5</option>
					<option <?php selected( 6, get_post_meta($post_id, 'number_answers', true), true ); ?> value="6">6</option>
					<option <?php selected( 7, get_post_meta($post_id, 'number_answers', true), true ); ?> value="7">7</option>
					<option <?php selected( 8, get_post_meta($post_id, 'number_answers', true), true ); ?> value="8">8</option>
					<option <?php selected( 9, get_post_meta($post_id, 'number_answers', true), true ); ?> value="9">9</option>
					<option <?php selected( 10, get_post_meta($post_id, 'number_answers', true), true ); ?> value="10">10</option>
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label for="shuffle_question"><?php _e('Shuffle question', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<select id="shuffle_question" name="shuffle_question">
					<option <?php selected( 1, get_post_meta($post_id, 'shuffle_question', true), true ); ?> value="1"><?php _e('Do not shuffle', 'huuminh'); ?></option>
					<option <?php selected( 2, get_post_meta($post_id, 'shuffle_question', true), true ); ?> value="2"><?php _e('Shuffle', 'huuminh'); ?></option>
				</select>
			</div>
		</td>
	</tr>
</table>
<table id="answer-response" class="mquiz-post-table mt10">
	
</table>
