$(document).ready(function() {	$('#signup').submit(function() {		$('#response').html('Adding email address...');                var file_path = jQuery('.hidden_path').val();		$.ajax({			url: file_path,			data: 'ajax=true&email=' + escape($('#email').val()) + '&_mailchimp_key=' + escape($('#_mailchimp_key').val()) + '&_mailchimp_list=' + escape($('#_mailchimp_list').val()),			success: function(msg) {				$('#response').html(msg);			}		});		return false;	});});