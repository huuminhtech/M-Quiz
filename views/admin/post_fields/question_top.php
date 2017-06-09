<?php
/**
 * MQuiz
 * @filename question_top.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');

global $post_id;
if(!empty($_GET['quiz']))
{
	$quiz_id = (int) $_GET['quiz'];
?>
<input type="hidden" name="quiz" value="<?php echo $quiz_id; ?>" />
<?php
}
?>
<table class="mquiz-post-table mt10">
	<tr id="question_point_wrapper">
		<th class="w150"><label for="quiz_start_date"><?php _e('Question point', 'huuminh'); ?></label></th>
		<td colspan="2">
			<div class="mquiz-form-group mquiz-form-inline">
				<input type="number" name="question_point" step="0.01" min="0" max="100" size="30" value="<?php echo get_post_meta($post_id, 'question_point', true);?>" id="question_point" class="form-controls">
			</div>
		</td>
	</tr>
</table>