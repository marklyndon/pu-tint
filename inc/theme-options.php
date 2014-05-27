<?php
/**
 * Add a 'Theme Options' menu item to the Appearance panel
 *
 * This function is attached to the 'admin_menu' action hook.
 */
function pu_add_link_admin() {
	add_theme_page( 'Customize', 'Theme Options', 'edit_theme_options', 'customize.php' );
}
add_action ( 'admin_menu', 'pu_add_link_admin' );


/**
 * Set up the default theme options
 *
 * @param	string $name  The option name
 *
 * @since 3.0.0
 */
if ( ! function_exists( 'pu_theme_options' ) ) :
	function pu_theme_options( $name ) {
		$default_theme_options = array(
			'tagline' => 'on',
			'excerpt_content' => 'excerpt',
			'index_date' => 'on',
			'display_date' => 'on',
			'index_author' => 'on',
			'display_author' => 'on',
			'index_comment_count' => 'on',
			'display_comment_count' => 'on',
		);
	
		$options = get_option( 'pu_theme_options', $default_theme_options );
	
		return $options[$name];
	}
endif;

add_action( 'customize_register', 'pu_customize_register' );
/**
 * Adds theme options to the Customizer screen
 *
 * This function is attached to the 'customize_register' action hook.
 *
 * @param	class $wp_customize
 *
 * @since 3.0.0
 */
function pu_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'pu_theme_options[tagline]', array(
		'default' => pu_theme_options( 'tagline' ),
		'type' => 'option',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'pu_tagline', array(
		'label' => __( 'Display Tagline', 'magazine-basic-plymouth' ),
		'section' => 'title_tagline',
		'settings' => 'pu_theme_options[tagline]',
		'type' => 'checkbox',
	) );
	
	/*$$TIS Added */
	/* Following section adds an admin Theme option called Branding
	   to control text and colour of PU logo 
	*/
		$wp_customize->add_section( 'pu_branding', array(
		'title' => __( 'Plymouth University Branding', 'magazine-basic-plymouth' ),
		'priority' => 30,
	) );
	
	$logochoices = array(
		'Celebrate' => __( 'Celebrate', 'magazine-basic-plymouth' ),
		'Collaborate' => __( 'Collaborate', 'magazine-basic-plymouth' ),
		'Communicate' => __( 'Communicate', 'magazine-basic-plymouth' ),
		'Connect' => __( 'Connect', 'magazine-basic-plymouth' ),
		'Create' => __( 'Create', 'magazine-basic-plymouth' ),		
		'Discover' => __( 'Discover', 'magazine-basic-plymouth' ),
		'Empower' => __( 'Empower', 'magazine-basic-plymouth' ),
		'Engage' => __( 'Engage', 'magazine-basic-plymouth' ),
		'Enterprise' => __( 'Enterprise', 'magazine-basic-plymouth' ),
		'Explore' => __( 'Explore', 'magazine-basic-plymouth' ),
		'Imagine' => __( 'Imagine', 'magazine-basic-plymouth' ),
		'Innovate' => __( 'Innovate', 'magazine-basic-plymouth' ),
		'Inspire' => __( 'Inspire', 'magazine-basic-plymouth' ),
		'Pioneer' => __( 'Pioneer', 'magazine-basic-plymouth' ),
		'Succeed' => __( 'Succeed', 'magazine-basic-plymouth' ),
		'Research' => __( 'Research', 'magazine-basic-plymouth' ),
		'Develop<br>Yourself' => __( 'Develop Yourself', 'magazine-basic-plymouth' ),
	);
	
	$wp_customize->add_setting( 'pu201308magbasic_theme_options[logoChoice]', array(
		'default' => pu201308magbasic_theme_options( 'logoChoice' ),
		'type' => 'option',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'pu_logoChoice', array(
		'label' => __( 'Choose Logo', 'magazine-basic-plymouth' ),
		'section' => 'pu_branding',
		'settings' => 'pu201308magbasic_theme_options[logoChoice]',
		'type' => 'select',
		'choices' => $logochoices,
	) );

	$colourchoices = array(
		'c50078' => __( 'Deep Rose', 'magazine-basic-plymouth' ),
		'e54890' => __( 'Brilliant Rose', 'magazine-basic-plymouth' ),
		'e2004a' => __( 'Raspberry Red', 'magazine-basic-plymouth' ),
		'f49f21' => __( 'Deep Orange', 'magazine-basic-plymouth' ),
		'ffd200' => __( 'Butter Yellow', 'magazine-basic-plymouth' ),
		'7c78a8' => __( 'Dark Lavender', 'magazine-basic-plymouth' ),	
		'0992cd' => __( 'Bondi Blue', 'magazine-basic-plymouth' ),	
		'55c0d8' => __( 'Turqoise', 'magazine-basic-plymouth' ),	
		'8acbc6' => __( 'Sea Green', 'magazine-basic-plymouth' ),	
		'acca56' => __( 'Fresh Green', 'magazine-basic-plymouth' ),	
		'003080' => __( 'Persian Indigo', 'magazine-basic-plymouth' ),	
		'383b71' => __( 'Midnight Blue', 'magazine-basic-plymouth' ),	
		'000000' => __( 'Black', 'magazine-basic-plymouth' ),	
		'747376' => __( 'Slate', 'magazine-basic-plymouth' ),	
		'b1b2b4' => __( 'Grey', 'magazine-basic-plymouth' ),
	);
	
	$wp_customize->add_setting( 'pu201308magbasic_theme_options[colourChoice]', array(
		'default' => pu201308magbasic_theme_options( 'colourChoice' ),
		'type' => 'option',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'pu_colourChoice', array(
		'label' => __( 'Choose Colour', 'magazine-basic-plymouth' ),
		'section' => 'pu_branding',
		'settings' => 'pu201308magbasic_theme_options[colourChoice]',
		'type' => 'radio',
		'choices' => $colourchoices ,
	) );
	
	
	$wp_customize->remove_setting('mb_theme_options[logo]');
	$wp_customize->remove_control('logo');
	
	$wp_customize->remove_setting('mb_theme_options[header_alignment]');
	$wp_customize->remove_control('mb_header_alignment');
	
	$wp_customize->remove_setting('mb_theme_options[page_background]');
	$wp_customize->remove_control('page_background');
	
	$wp_customize->remove_setting( 'mb_theme_options[link_color]');
	$wp_customize->remove_control( 'link_color');
}

/**
 * Sanitize integers
 *
 * @since 3.0.0
 */
function mb_sanitize_int( $int ) {
	if ( '' === $int )
		return '';

	return (int) $int;
}

add_action( 'admin_head', 'custom_menu_css' );
function custom_menu_css() {
    ?>
<style type="text/css">
	#wp-admin-bar-theme_previews .ab-item { height: auto !important; }
    #admin-bar-premium-themes { float: left; }
    #admin-bar-premium-themes p { color: #000 !important; }
    #admin-bar-premium-themes p.top-p { margin-top: 10px !important; }
    #admin-bar-premium-themes p, #admin-bar-premium-themes a { text-shadow: none !important; }
    #admin-bar-premium-themes a { padding: 0 !important; margin-bottom: 10px !important; display: inline-block !important; }
    #admin-bar-premium-themes img { margin: 5px; border: 1px solid #ccc; }

 </style>
    <?php
}

/*******************************************************/
// $$ TIS 
// Removes custom-background and custom-header 
// from theme options
/*******************************************************/

add_action( 'after_setup_theme', 'pu_remove_custom_background', 20 );

function pu_remove_custom_background()
{
	  remove_theme_support( 'custom-background' );
		remove_theme_support( 'custom-header' );
}

/*******************************************************/
// $$ TIS 
// Set up the default theme options
// @param	string $name  The option name *
// @since 3.0.0
/*******************************************************/
/*if(array_key_exists("tagline", $default_theme_options)){
			echo "key exists".$default_theme_options["tagline"];
		}*/

if ( ! function_exists( 'pu201308magbasic_theme_options' ) ) :
	function pu201308magbasic_theme_options( $name ) {
		$default_theme_options['logoChoice'] = 'Collaborate';
		$default_theme_options['colourChoice'] = 'acca56';
		//UPDATE:: Have been playing around with changing default for tagline.
		//have to unload old setting and reload new setting. Update the header page to display new value.
		//$default_theme_options['tagline'] = 'off';
		
		$options = get_option( 'pu201308magbasic_theme_options', $default_theme_options );
		return $options[$name];
}
endif;

/*******************************************************/
// $$ TIS
// Add a 'Theme Options' menu item to the admin bar *
// This function is attached to the 'admin_bar_menu' action hook. *
/*******************************************************/

add_action( 'admin_bar_menu', 'pu_add_admin_bar_menu_item', 1000 );

function pu_add_admin_bar_menu_item() {
    global $wp_admin_bar, $wpdb;

    if ( current_user_can( 'edit_theme_options' ) && is_admin_bar_showing() ) {
    	$wp_admin_bar->add_menu( array( 'id' => 'customize_magazine_basic', 'title' => __( 'Theme Options', 'magazine-basic-plymouth' ), 'href' => admin_url( 'customize.php' ) ) );
		}
}

/*******************************************************/
// $$TIS 
// Function pu_customize_css() 
// Contains syles to change colours of headers based on selection
// in admin area
/*******************************************************/

add_action( 'wp_head', 'pu_custom_css');

function pu_custom_css()
{
    ?>
         <style type="text/css">
						 h1.entry-title a {color:#<?php echo pu201308magbasic_theme_options('colourChoice'); ?> !important; text-decoration: none;}
						 h1.entry-title a:hover {color:#<?php echo pu201308magbasic_theme_options('colourChoice'); ?> !important; text-decoration: underline;}
						 #tagline, h1, h2 {	color:#<?php echo pu201308magbasic_theme_options('colourChoice'); ?>;}		
						 #tagline a:hover, h1 a:hover, h2 a:hover{text-decoration: underline;color:#<?php echo pu201308magbasic_theme_options('colourChoice'); ?>;}
						 #nav li.current_page_item a {
			border-bottom: 2px solid #<?php echo pu201308magbasic_theme_options('colourChoice'); ?>;}
						#nav ul li a:hover{ 
			border-bottom: 2px solid #<?php echo pu201308magbasic_theme_options('colourChoice'); ?>;}
			.btn{background: #<?php echo pu201308magbasic_theme_options('colourChoice')?>;color:#FFFFFF;}
         </style>
    <?php
}