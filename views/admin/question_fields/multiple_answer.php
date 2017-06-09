<?php
/**
 * MQuiz
 * @filename multiple_answer.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');



?>

<tr class="multiple_answer">
	<th class="w100"><label for="answer_<?php echo $i;?>"><?php _e('Answer', 'huuminh');?> <?php echo $i;?></label></th>
	<td>
		<div class="mquiz-form-group mquiz-form-answer">
			<textarea name="answers[<?php echo $i;?>]" id="answer_<?php echo $i;?>" class="form-controls" rows="3"><?php echo $answer;?></textarea>
		</div>
	</td>
	<td class="w150 valign-top">
		<div class="mquiz-form-group mquiz-form-answer  mquiz-form-answer-correct">
			<div class="checkbox">
				<label>
					<input <?php echo (TRUE === $correct) ? "checked='checked'" : ""; ?> type="checkbox" value="<?php echo $i;?>"  id="answer_correct_<?php echo $i;?>" name="correct[<?php echo $i;?>]"> <?php _e('Accept as correct', 'huuminh');?>
				</label>
			</div>
			<div class="percent_box">
				<input type="text" value="<?php echo $percent;?>" class="percent" name="percent[<?php echo $i;?>]" ><?php _e('% correct', 'huuminh');?>
			</div>
		</div>
	</td>
</tr>