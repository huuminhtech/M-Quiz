<?php
/**
 * MQuiz
 * @filename ajax-question-from.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');
?>

<div id="add-question-modal" class="remodal" data-remodal-id="modal">
	<button data-remodal-action="close" class="remodal-close"></button>
	<h1><?php _e('Add Question');?></h1>
	
	<?php
	include_once(MQUIZ_ADMIN_VIEW_DIR."post_fields/question_top.php");
	?>
	<table class="mquiz-post-table mt10">
		<tr>
			<th class="w150"><label for="quiz_start_date"><?php _e('Question', 'huuminh'); ?></label></th>
			<td>
				<?php
				$content = "";
				$editor_id = 'question-content';
			
				wp_editor( $content, $editor_id, array(
					'editor_height' => 100
				) );	
				//\_WP_Editors::enqueue_scripts();
			    print_footer_scripts();
			   \_WP_Editors::editor_js();
				?>
			</td>
		</tr>
	</table>
	<?php
	include_once(MQUIZ_ADMIN_VIEW_DIR."post_fields/question_bottom.php");
	?>
	<div class="mquiz-modal-footer">
		<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
		<button data-remodal-action="confirm" class="remodal-confirm">Add Question</button
	</button>
</div>