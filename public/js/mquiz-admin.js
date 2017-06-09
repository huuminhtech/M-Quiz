jQuery(document).ready( function ($) {
	register_action();
	
	function register_action()
	{
		if ($( '#question_type' ).length) {
			update_question();
			$( '#question_type' ).change(function(e){
				update_question();
			});
			
			$( '#number_answers' ).change(function(e) {
				update_question();
			});
			
			$('#answer-response').on('input[type=radio], input[type=checkbox]').click(function(){
				update_percent();
			});
		}
	}
	
	var countChecked = function() {
		var n = $('#answer-response').find('input[type=radio]:checked, input[type=checkbox]:checked').length;
		return n;
	};

	
	
	function update_percent() {
		if($( '#question_type' ).val() == 2) return false;
		var count = countChecked();
		$('#answer-response').find('input[type=radio], input[type=checkbox]').each( function(){
			if($(this).is(":checked")){
				var percent_num = Math.floor(100/count);
				$(this).parents('.mquiz-form-answer-correct').find('.percent').val(percent_num);
			} else {
				$(this).parents('.mquiz-form-answer-correct').find('.percent').val(0);
			}
		});
	}
	
	function update_question() {
		if($( '#question_type' ).val() == 3) {
			$('#number_answers').parents('tr').fadeOut('slow');
		} else {
			$('#number_answers').parents('tr').fadeIn('slow');
		}
		
		var data = {
			'action': 'get_answers',
			'post_id': $('#post_ID').val(),
			'question_type': $( '#question_type' ).val(),
			'number_answers': $( '#number_answers' ).val()
		};
		
		var xhr = $.post(mquiz.ajaxurl, data, function(res){
			$('#answer-response').html( res );
			update_percent();
		});
	}
	
	$( '#add-question-btn' ).click(function(e){
		var data = {
			'action': 'add_question',
			'post_id': $('#post_ID').val(),
		};
		var xhr = $.post(mquiz.ajaxurl, data, function(res){
			if($('#add-question-modal').length) {
				$('#add-question-modal').remove();
			}
			$('body').append(res);
			var inst = $('[data-remodal-id=modal]').remodal();
			inst.open();
			register_action();
		});
	});

	$( '#quiz_time' ).datetimepicker({
		lang: 'en',
		datepicker: false,
		minDate: 0,
		format:'H:i:s',
	});

	$( "#quiz_start_date" ).datetimepicker({
		lang: 'en',
		minDate: 0,
		format:'Y-m-d H:i:s',
	});
	
	$( "#quiz_end_date" ).datetimepicker({
		lang: 'en',
		onShow:function( ct ){
			this.setOptions({
				minDate: jQuery('#quiz_start_date').val() ?jQuery('#quiz_start_date').val():false,
			})
		},
		
		format:'Y-m-d H:i:s',
	});
})