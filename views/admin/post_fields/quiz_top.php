<?php
/**
 * MQuiz
 * @filename quiz.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');

global $post_id;
echo get_post_meta($post_id, 'quiz_disallow_countdown', true);
?>
<table class="mquiz-post-table mt10">
	<tr>
		<th class="w150"><label for="quiz_time"><?php _e('Quiz time', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<input value="<?php echo get_post_meta($post_id, 'quiz_time', true);?>"  placeholder="00:30:00" type="text" name="quiz_time" size="30" value="" id="quiz_time" spellcheck="true" class="form-controls">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="yes" <?php checked( 'yes', get_post_meta($post_id, 'quiz_disallow_countdown', true), true ); ?>  id="quiz_disallow_countdown" name="quiz_disallow_countdown"> <?php _e('Do not use', 'huuminh');?>
					</label>
				</div>
			</div>
			<div class="mquiz-form-group mt10">
				<div class="checkbox">
					<label>
						<input <?php checked( 'yes', get_post_meta($post_id, 'quiz_end_limit_reached', true), true ); ?> type="checkbox" value="yes" id="quiz_end_limit_reached" name="quiz_end_limit_reached"> <?php _e('End this quiz when the time limit is reached', 'huuminh');?>
					</label>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label for="quiz_start_date"><?php _e('Quiz start date', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<input placeholder="<?php echo current_time( 'mysql' );?>" type="text" name="quiz_start_date" size="30" value="<?php echo get_post_meta($post_id, 'quiz_start_date', true);?>" id="quiz_start_date" spellcheck="true" class="form-controls mquiz-datepicker">
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label for="quiz_end_date"><?php _e('Quiz end date', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<input  placeholder="<?php echo current_time( 'mysql' );?>" type="text" name="quiz_end_date" size="30" value="<?php echo get_post_meta($post_id, 'quiz_end_date', true);?>" id="quiz_end_date" spellcheck="true" class="form-controls">
			</div>
		</td>
	</tr>
	<tr>
		<th class="w150"><label for="quiz_attempts"><?php _e('Attempts allowed', 'huuminh'); ?></label></th>
		<td>
			<div class="mquiz-form-group mquiz-form-inline">
				<input placeholder="0" value="<?php echo get_post_meta($post_id, 'quiz_attempts', true);?>" type="text" name="quiz_attempts" size="30" id="quiz_attempts" spellcheck="true" class="form-controls">
			</div>
		</td>
	</tr>
	
</table>
