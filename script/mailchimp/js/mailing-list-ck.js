$(document).ready(function(){$("#signup").submit(function(){$("#response").html("Adding email address...");var e=jQuery(".hidden_path").val();$.ajax({url:e,data:"ajax=true&email="+escape($("#email").val())+"&_mailchimp_key="+escape($("#_mailchimp_key").val())+"&_mailchimp_list="+escape($("#_mailchimp_list").val()),success:function(e){$("#response").html(e)}});return!1})});