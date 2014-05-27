<?php

$tabs = array(
    //GENERAL OPTIONS
    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'general',
        'name' => 'General Options',
        
        'fields' => array(
            
           array(
                'id' => 'header_logo',
                'name' => 'header_logo',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/logo.png",
                'label' => 'Header Logo',
                'desc' => 'JPEG, GIF or PNG image, 400x400px recommended, up to 500KB',
               
                
            ),
            array(
                'id' => 'footer_logo',
                'name' => 'footer_logo',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/logo-footer.png",
                'label' => 'Footer Logo',
                'desc' => 'JPEG, GIF or PNG image, 400x400px recommended, up to 500KB',
                
            ),
            array(
                'id' => 'favicon',
                'name' => 'favicon',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/favicon.ico",
                'label' => 'Favicon',
                'desc' => 'File format: ICO, dimenstions: 16x16',
                
            ),

            array(
                'id' => 'enable_slider',
                'name' => 'enable_slider',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Enable Slider',
                ),
                'label' => 'Slider',
                'desc' => 'Enable slider on home page',
            ),
            
            array(
                'id' => 'slider_autoplay',
                'name' => 'auto_play',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Auto Play',
                ),
                'label' => '',
                'desc' => '',
            ),

            array(
                'id' => 'slider_dalay',
                'name' => 'slider_delay',
                'type' => 'text',
                'value' => '4000',
                'label' => 'Slider delay',
                'desc' => 'In milliseconds.',
                'options' => array(
                    'size' => '5'
                )
                
            ),
            
            array(
                'id' => 'animation_time',
                'name' => 'animation_time',
                'type' => 'text',
                'value' => '1000',
                'label' => 'Slider animation time',
                'desc' => 'In milliseconds.',
                'options' => array(
                    'size' => '5'
                )
                
            ),
            
            
            
        ),
    ),

    
    
    
    
    // Posts
    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'posts',
        'name' => 'Posts',
        
        'fields' => array(
        
        	array(
                'id' => 'post_author',
                'name' => 'post_author',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Show author post box',
                ),
                'label' => 'Post author box',
                'desc' => 'Shows author box on posts page',
            ),

        ),
    ),
    
    // Footer
    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'footer',
        'name' => 'Footer',
        
        'fields' => array(
        
        	array(
                'id' => 'footer_copy',
                'name' => 'footer_copy',
                'type' => 'text',
                'value' => '',
                'label' => 'Copyright Statement',
                'desc' => 'Copyright statement which appears in the footer',
                'options' => array(
                    'size' => '100'
                )
            ),

        ),
    ),   
    
    
    
    //FEATURED BOXES
   /*
 array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'featured',
        'name' => 'Featured Boxes',
        'fields' => array(

            array(
                'id' => 'enable_featured_boxes',
                'name' => 'enable_featured_boxes',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Enable Featured Boxes',
                ),
                'label' => 'Featured Boxes',
                'desc' => 'Enable Featured Boxes on home page',
            ),


            array(
                'id' => 'box_1_title',
                'name' => 'box_1_title',
                'type' => 'text',
                'value' => '',
                'label' => 'Box 1 title',
                'desc' => '',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_1_description',
                'name' => 'box_1_description',
                'type' => 'textarea',
                'value' => '',
                'label' => 'Box 1 description',
                'desc' => '',
                'options' => array(
                    'cols' => '80',
                    'rows' => '2'
                )
            ),
            array(
                'id' => 'box_1_link',
                'name' => 'box_1_link',
                'type' => 'text',
                'value' => '',
                'label' => 'Box 1 link',
                'desc' => '',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_1_color',
                'name' => 'box_1_color',
                'type' => 'colorpicker',
                'value' => '',
                'label' => 'Box 1 color',
                'desc' => '',
            ),
            
            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),
            
            
            
            array(
                'id' => 'box_2_title',
                'name' => 'box_2_title',
                'type' => 'text',
                'value' => '',
                'label' => 'Box 2 title',
                'desc' => '',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_2_description',
                'name' => 'box_2_description',
                'type' => 'textarea',
                'value' => '',
                'label' => 'Box 2 description',
                'desc' => '',
                'options' => array(
                    'cols' => '80',
                    'rows' => '2'
                )
            ),
            array(
                'id' => 'box_2_link',
                'name' => 'box_2_link',
                'type' => 'text',
                'value' => '',
                'label' => 'Box 2 link',
                'desc' => '',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_2_color',
                'name' => 'box_2_color',
                'type' => 'colorpicker',
                'value' => '',
                'label' => 'Box 2 color',
                'desc' => '',
            ),
            
            array(
                'id' => 'box_2_hr',
                'name' => 'box_2_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),
            
            
            
            array(
                'id' => 'box_3_title',
                'name' => 'box_3_title',
                'type' => 'text',
                'value' => '',
                'label' => 'Box 3 title',
                'desc' => '',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_3_description',
                'name' => 'box_3_description',
                'type' => 'textarea',
                'value' => '',
                'label' => 'Box 3 description',
                'desc' => '',
                'options' => array(
                    'cols' => '80',
                    'rows' => '2'
                )
            ),
            array(
                'id' => 'box_3_link',
                'name' => 'box_3_link',
                'type' => 'text',
                'value' => '',
                'label' => 'Box 3 link',
                'desc' => '',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_3_color',
                'name' => 'box_3_color',
                'type' => 'colorpicker',
                'value' => '',
                'label' => 'Box 3 color',
                'desc' => '',
            ),

            
            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),


            array(
                'id' => 'box_4_title',
                'name' => 'box_4_title',
                'type' => 'text',
                'value' => '',
                'label' => 'Box 4 title',
                'desc' => '',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_4_description',
                'name' => 'box_4_description',
                'type' => 'textarea',
                'value' => '',
                'label' => 'Box 4 description',
                'desc' => '',
                'options' => array(
                    'cols' => '80',
                    'rows' => '2'
                )
            ),
            array(
                'id' => 'box_4_link',
                'name' => 'box_4_link',
                'type' => 'text',
                'value' => '',
                'label' => 'Box 4 link',
                'desc' => '',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_4_color',
                'name' => 'box_4_color',
                'type' => 'colorpicker',
                'value' => '',
                'label' => 'Box 4 color',
                'desc' => '',
            ),
           
        ),
    ),
*/




    
    //CONTACT
   /*
 array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'contact',
        'name' => 'Contact',
        'fields' => array(
            
            array(
                'id' => 'subject_error_message',
                'name' => 'subject_error_message',
                'type' => 'text',
                'value' => 'Please insert message subject!',
                'label' => 'Subject error message',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'name_error_message',
                'name' => 'name_error_message',
                'type' => 'text',
                'value' => 'Please insert your name!',
                'label' => 'Name error message',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'email_error_message',
                'name' => 'email_error_message',
                'type' => 'text',
                'value' => 'Please insert your e-mail!',
                'label' => 'E-mail error message',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_error_message',
                'name' => 'message_error_message',
                'type' => 'text',
                'value' => 'Please insert your message!',
                'label' => 'Message text error message',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_successful',
                'name' => 'message_successful',
                'type' => 'text',
                'value' => 'Message sent!',
                'label' => 'Message on successful e-mail send',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_unsuccessful',
                'name' => 'message_unsuccessful',
                'type' => 'text',
                'value' => 'Some error occured!',
                'label' => 'Message on successful e-mail send',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'googlemap_x',
                'name' => 'googlemap_x',
                'type' => 'text',
                'value' => '',
                'label' => 'Google map X coordinate',
                'desc' => 'Insert google map coordinate for your adress',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_y',
                'name' => 'googlemap_y',
                'type' => 'text',
                'value' => '',
                'label' => 'Google map Y coordinate',
                'desc' => 'Insert google map coordinate for your adress',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_zoom',
                'name' => 'googlemap_zoom',
                'type' => 'text',
                'value' => '15',
                'label' => 'Google map zoom factor',
                'desc' => 'Insert google map zoom factor',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'marker_title',
                'name' => 'marker_title',
                'type' => 'text',
                'value' => 'Marker',
                'label' => 'Marker Title',
                'desc' => 'Insert marker title.',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'google_map_type',
                'name' => 'google_map_type',
                'type' => 'select',
                'value' => array(
                    'HYBRID',
                    'ROADMAP',
                    'SATELLITE',
                    'TERRAIN'
                ),
                'label' => 'Google Map type',
                'desc' => 'Select map type you want to use.',
            ),
            
            
        ),
    ),
*/
    
    
    
    
    
    //NEWSLETTER
    /*
array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'newsletter',
        'name' => 'Newsletter',
        'fields' => array(
            
            array(
                'id' => 'newsletter_service',
                'name' => 'newsletter_service',
                'type' => 'radio',
                'value' => array(
                    'Mailchimp',
                    'Sendloop',
                    'None',
                ),
                'caption' => array(
                    'Mailchimp',
                    'Sendloop',
                    'None',
                ),
                'label' => 'Newsletter Service',
                'desc' => 'Use <a href="http://sendloop.com/">Sendloop</a> as your newsletter manager or use <a href="http://mailchimp.com/">Mailchimp</a> as your newsletter manager.',
            ),
            array(
                'id' => 'mailchimp_api_key',
                'name' => 'mailchimp_api_key',
                'type' => 'text',
                'value' => '',
                'label' => 'Mailchimp API Key',
                'desc' => 'Grab and insert an API Key from <a href="http://admin.mailchimp.com/account/api/">here</a>',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'mailchimp_api_list',
                'name' => 'mailchimp_api_list',
                'type' => 'text',
                'value' => '',
                'label' => 'Mailchimp API List',
                'desc' => 'Grab your Lists Unique Id by going to <a href="http://admin.mailchimp.com/lists/">here</a>. Click the "settings" link for the list - the Unique Id is at the bottom of that page.',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'sendloop_username',
                'name' => 'sendloop_username',
                'type' => 'text',
                'value' => '',
                'label' => 'Sendloop Username',
                'desc' => 'Insert your Sendloop username. It can be fount when you log in into your Sendloop account it looks like <strong>XXXXX</strong>.sendloop.com',
                'options' => array(
                    'size' => '100'
                )
            ),

            array(
                'id' => 'sendloop_list_id',
                'name' => 'sendloop_list_id',
                'type' => 'text',
                'value' => '',
                'label' => 'Sendloop List ID',
                'desc' => 'Insert your Sandloop List Id. It can be found at Subscriber Lists-><strong>Your List</strong>->Edit List Settings',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),
            
            array(
                'id' => 'box_heading',
                'name' => 'box_heading',
                'type' => 'text',
                'value' => 'SIGN-UP FOR THE NEWSLETTER',
                'label' => 'Box Heading',
                'desc' => 'Change Heading for Newsette section',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_title',
                'name' => 'box_title',
                'type' => 'text',
                'value' => 'Newsletter',
                'label' => 'Box Title',
                'desc' => 'Change Title for Newsette section',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'box_description',
                'name' => 'box_description',
                'type' => 'textarea',
                'value' => 'Sign up for free to get deals directly to your mailbox.',
                'label' => 'Box Description',
                'desc' => 'Change Description for Newsette section',
                'options' => array(
                    'cols' => '80',
                    'rows' => '2'
                )
            ),
            
            
        ),
    ),
*/
    
    
    
    
    
);
?>