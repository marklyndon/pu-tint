		 <form id="signup" action="<?=$_SERVER['PHP_SELF']; ?>" method="get">
			  <input type="text" name="email" id="email" />
			  <input type="hidden" name="_mailchimp_key" id="_mailchimp_key" value="<?php echo get_option('newsletter_mailchimp_api_key');  ?>"/>
			  <input type="hidden" name="_mailchimp_list" id="_mailchimp_list" value="<?php echo get_option('newsletter_mailchimp_api_list');?>"/>
                          <input type="submit" src="" name="submit" value="Submit" class="btn" alt="Submit" />
                          <input type="text" style="display: none" value="<?php echo get_template_directory_uri().'/script/mailchimp/inc/store-address.php'?>" name="hidden_path" class="hidden_path">
                          <div class="clear"></div>
                          <label for="email" id="address-label">
				<span id="response">
					<?php get_template_part('/script/mailchimp/inc/store-address.php'); if(isset ($_GET['submit'])){ echo storeAddress(); } ?>
				  </span>
			  </label>
		</form>      
		<script type="text/javascript" src="<?php echo get_template_directory_uri().'/script/mailchimp/js/mailing-list.js';?>"></script>