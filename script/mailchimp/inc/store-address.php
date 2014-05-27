<?php function storeAddress(){
	if(!$_GET['email']){ return "No email address provided"; }

	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_GET['email'])) {
		return "Email address is invalid";
	}
	require_once('MCAPI.class.php');
	$api = new MCAPI($_GET['_mailchimp_key']);
	$list_id = $_GET['_mailchimp_list'];
	if($api->listSubscribe($list_id, $_GET['email'], '') === true) {
		return 'Success! Check your email to confirm sign up.';
	}else{
		return 'Error: ' . $api->errorMessage;
	}
}
if($_GET['ajax']){ echo storeAddress(); }
?>