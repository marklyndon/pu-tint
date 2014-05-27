<?php
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) { 
    tint_install();
}
function populate_theme_options() {
    GLOBAL $tabs, $wp_version;
    $pages = @get_all_pages();
    foreach ($tabs as $r1) {
        foreach ($r1 as $r2) {
            if (count($r2) > 0) {
                foreach ((array) $r2 as $r3) {
                    if(isset($r3['name'])){$r3name = $r3['name'];}else{$r3name = '';}
                    if(isset($r3['value'])){$r3value = $r3['value'];}else{$r3value = '';}
                    if(isset($r3['type'])){$r3type = $r3['type'];}else{$r3type = '';}
                    if (@$r3value != '' && $r3name != 1 && $r3type != 'select' && $r3type != 'radio' && $r3type != 'checkbox') {
                        update_option(wp_get_theme() . '_' . $r1['id'] . '_' . $r3['name'], $r3['value']);
                    }
                }
            }
        }
    }
}

function tint_install() {
   global $wpdb;
   populate_theme_options();
}
function get_theme_option($option_name){
    $option_value = get_option($option_name);
    if(is_array($option_value)){
        if(count($option_value) > 2){
            return $option_value;
        }else{
            return $option_value['0'];
        }
    }else{
        return $option_value;
    }
}

function my_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('my-upload');
}

function my_admin_styles() {
    wp_enqueue_style('thickbox');
}

if (isset($_GET['page']) && isset($_GET['page'])) {
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}

add_action('admin_head', 'includeScript');

function get_first_tab() {
    GLOBAL $tabs;
    require_once('admin-settings.php');
    $i = 0;
    foreach ($tabs as $tab) {
        if ($tab['pg']['slug'] == $_GET['page']) {
            if ($i == 0) {
                return $tab['id'];
            }
        }
    }
}

function get_all_pages() {
    GLOBAL $tabs;
    $pages = array();
    require_once('admin-settings.php');
    $i = 0;
    $last_val = '';
    foreach ((array)$tabs as $tab) {
        if ($last_val != $tab['pg']) {
            $pages[] = $tab['pg'];
            $last_val = $tab['pg'];
        }
    }
    return $pages;
}

function includeScript() {
    ?>
<script type='text/javascript'>

       jQuery(document).ready(function() {

       var formfield;
           jQuery('.st_upload_button').click(function() {
               formfield ='checker';
               targetfield = jQuery(this).prev('.upload-url');
               post_id = '';
               tb_show('', 'media-upload.php?post_id='+post_id+'&type=image&amp;TB_iframe=true');
               return false;
           });

     window.original_send_to_editor = window.send_to_editor;
     window.send_to_editor = function(html){

       if (formfield) {
                    imgurl = jQuery(html).attr('href');
                    jQuery(targetfield).val(imgurl);
                    formfield = null;
                    tb_remove();
               }

               else {
           window.original_send_to_editor(html);
                       formfield = null;
       }
           }
       });

</script>
    <script type="text/javascript" src="<?php echo get_bloginfo('stylesheet_directory').'/script/jscolor/jscolor.js';?>"></script>
    <?php
}

add_action('admin_menu', 'tk_settings_page_init');
$tabs = '';

function tk_settings_page_init() {
    $pages = @get_all_pages();
    $theme_data = wp_get_theme(TEMPLATEPATH . '/style.css');
    $settings_page = '';
    for ($i = 0; $i <= count($pages) - 1; $i++) {
        if ($i == 0) {
            $settings_page .= add_menu_page($pages[$i]['slug'], wp_get_theme(), 'edit_theme_options', $pages[$i]['slug'], 'tk_settings_page');
            $settings_page .= add_submenu_page($pages[0]['slug'], $pages[$i]['page_title'], $pages[$i]['menu_title'], 'edit_theme_options', $pages[$i]['slug'], 'tk_settings_page');
        } else {
            $settings_page .= add_submenu_page($pages[0]['slug'], $pages[$i]['page_title'], $pages[$i]['menu_title'], 'edit_theme_options', $pages[$i]['slug'], 'tk_settings_page');
        }
    }
    //add_action("load-{$settings_page}", 'tk_load_settings_page');
}

    if (@$_POST["ilc-settings-submit"] == 'Y') {
        if (@$_GET['tab'] == '') {
            $tab = get_first_tab();
        } else {
            $tab = @$_GET['tab'];
        }
        $required_error = 0;

        foreach ($_POST as $var => $value) {
            if ($var != '_wpnonce' && $var != '_wp_http_referer' && $var != 'Submit' && $var != 'ilc-settings-submit' && !preg_match("/_required/i", $var)) {//$_POST variables which we don't want to save as options
                if ($_POST[$var . '_required'] == 'yes') {
                    if ($_POST[$var] == '') {
                        $required_error++;
                    }
                }
            }
        }
        if ($required_error == 0) {
            tk_save_theme_settings();
            $url_parameters = isset($tab) ? 'updated=true&tab=' . $tab : 'updated=true';
        } else {
            $url_parameters = isset($tab) ? 'error=true&tab=' . $tab : 'error=true';
        }
        wp_redirect(admin_url('admin.php?page=' . $_GET['page'] . '&' . $url_parameters));
    }

function tk_save_theme_settings() {
    global $pagenow;
    if (@$_GET['tab'] == '') {
        $tab = get_first_tab();
    } else {
        $tab = @$_GET['tab'];
    }
    if ($pagenow == 'admin.php' && isset($_GET['page'])) {
        if (isset($tab)) {
            
            foreach ($_POST as $var => $value) {
                if ($var != '_wpnonce' && $var != '_wp_http_referer' && $var != 'Submit' && $var != 'ilc-settings-submit' && !preg_match("/_required/i", $var)) {//$_POST variables which we don't want to save as options
                    update_option($tab . '_' . $var, $value);
                }
            }
        }
    }
}

function tk_admin_tabs($current) {
    GLOBAL $tabs;

    if ($current == '') {
        $current = get_first_tab();
    }

    require_once('admin-settings.php');

    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';

    $i = 0;
    foreach ($tabs as $tab) {
        if ($tab['pg']['slug'] == $_GET['page']) {
            if ($i == 0) {
                $i++;
            }
            $class = ( $tab['id'] == $current ) ? ' nav-tab-active' : '';
            echo '<a class="nav-tab' . $class . '"  href="?page=' . $_GET['page'] . '&tab=', $tab['id'], '">', $tab['name'], '</a>';
        }
    }
    echo '</h2>';
}

function tk_settings_page($par) {
    global $pagenow;
    $settings = get_option("tk_theme_settings");
    $theme_data = wp_get_theme(TEMPLATEPATH . '/style.css');
    ?>

    <div class="wrap">
        <h2><?php
    $pages = @get_all_pages();
    for ($i = 0; $i <= count($pages) - 1; $i++) {
        if ($pages[$i]['slug'] == $_GET['page']) {
            echo $pages[$i]['page_title'];
        }
    }
    ?></h2>

        <?php
        if ('true' == esc_attr(@$_GET['error']))
            echo '<div class="error" ><p>All fields marked with (*) are required.</p></div>';
        if ('true' == esc_attr(@$_GET['updated']))
            echo '<div class="updated" ><p>Theme Settings updated.</p></div>';

        if (isset($_GET['tab']))
            tk_admin_tabs($_GET['tab']); else
            tk_admin_tabs(get_first_tab());
        ?>

        <div id="poststuff">
            <form method="post" action="<?php admin_url('admin.php?page=' . $_GET['page']); ?>">
                <?php
                wp_nonce_field("ilc-settings-page");
                if ($pagenow == 'admin.php' && isset($_GET['page'])) {
                    if (isset($_GET['tab']))
                        $tab = $_GET['tab'];
                    else
                        $tab = get_first_tab();

                    echo '<table class="form-table">';


                    GLOBAL $tabs;
                    foreach ($tabs as $r1) {
                        if ($r1['id'] == $tab) {
                            $row_items = 1;
                            foreach ($r1 as $r2) {

                                if ($row_items == 4) {
                                    if (count($r2) > 0) {

                                        foreach ($r2 as $r3) {

                                            if (@$r3['options']['required'] == 'yes') {
                                                $required = '* ';
                                                $required_hidden_field = '<input type="hidden" name="' . $r3['name'] . '_required" value="yes">';
                                            } else {
                                                $required = '';
                                                $required_hidden_field = '<input type="hidden" name="' . $r3['name'] . '_required" value="no">';
                                            }
                                            
                                            if(isset($_GET['dev'])){
                                                $dev = '<br /><font color="red">'.$tab . '_' . $r3['name'].'</font>';
                                            }else{
                                                $dev = '';
                                            }
                                            
                                            if ($r3['type'] == 'text') {//TYPE: TEXT
                                                
                                                if (isset($r3['options']['size'])) {
                                                    $size = 'size = "'.$r3['options']['size'].'"';
                                                }else{
                                                    $size = '';
                                                }
                                                if (get_option($tab . '_' . $r3['name']) != '') {
                                                    $val = get_option($tab . '_' . $r3['name']);
                                
                                                } else {
                                                    $val = $r3['value'];
                                                    
                                                }
                                                
                                                
                                                


                                                echo '<tr>
                                                                        <th><label>' . $required . '' . $r3['label'] . '</label>'.$dev.'</th>
                                                                        <td>
                                                                            <input id="' . $r3['id'] . '" name="' . $r3['name'] . '" type="' . $r3['type'] . '" value="' . stripslashes($val) . '" ' . @$r3['options']['readonly'] . ' '.$size.' />
                                                                            <span class="description"><br />' . $r3['desc'] . '</span>
                                                                            ' . $required_hidden_field . '
                                                                        </td>
                                                                    </tr>';
                                            }
                                            
                                            if ($r3['type'] == 'colorpicker') {//TYPE: COLORPICKER
                                                
                                                if (isset($r3['options']['size'])) {
                                                    $size = 'size = "'.$r3['options']['size'].'"';
                                                }else{
                                                    $size = '';
                                                }
                                                
                                                
                                                if (get_option($tab . '_' . $r3['name']) != '') {
                                                    $val = get_option($tab . '_' . $r3['name']);
                                                    
                                                } else {
                                                    $val = $r3['value'];
                                                    
                                                }

                                                echo '<tr>
                                                                        <th><label>' . $required . '' . $r3['label'] . '</label>'.$dev.'</th>
                                                                        <td>
                                                                            <input id="' . $r3['id'] . '" name="' . $r3['name'] . '" type="text" value="' . stripslashes($val) . '" class="color" '.$size.' />
                                                                            <span class="description">' . $r3['desc'] . '</span>
                                                                            ' . $required_hidden_field . '
                                                                        </td>
                                                                    </tr>';
                                            }

                                            if ($r3['type'] == 'hidden') {//TYPE: HIDDEN
                                                if (get_option($tab . '_' . $r3['name']) != '') {
                                                    $val = get_option($tab . '_' . $r3['name']);
                                                } else {
                                                    $val = $r3['value'];
                                                }
                                                echo '<tr>'.$dev.'
                                                                        <td>
                                                                            <input id="' . $r3['id'] . '" name="' . $r3['name'] . '" type="' . $r3['type'] . '" value="' . stripslashes($val) . '" />
                                                                                ' . $required_hidden_field . '
                                                                        </td>
                                                                    </tr>';
                                            }

                                            if ($r3['type'] == 'password') {//TYPE: PASSWORD
                                                if (get_option($tab . '_' . $r3['name']) != '') {
                                                    $val = get_option($tab . '_' . $r3['name']);
                                                } else {
                                                    $val = $r3['value'];
                                                }
                                                echo '<tr>
                                                                        <th><label>' . $required . '' . $r3['label'] . '</label>'.$dev.'</th>
                                                                        <td>
                                                                            <input id="' . $r3['id'] . '" name="' . $r3['name'] . '" type="' . $r3['type'] . '" value="' . stripslashes($val) . '" />
                                                                            <span class="description">' . $r3['desc'] . '</span>
                                                                                ' . $required_hidden_field . '
                                                                        </td>
                                                                    </tr>';
                                            }

                                            if ($r3['type'] == 'radio') {//TYPE: RADIO
                                                if (get_option($tab . '_' . $r3['name']) != '') {
                                                    $val = get_option($tab . '_' . $r3['name']);
                                                } else {
                                                    $val = $r3['value'];
                                                }
                                                echo '<tr>
                                                                        <th><label>' . $required . '' . $r3['label'] . '</label>'.$dev.'</th>
                                                                        <td>';

                                                for ($i = 0; $i < (count($r3['value'])); $i++) {
                                                    if ($r3['value'][$i] == $val) {
                                                        $checked = 'checked="checked"';
                                                    } else {
                                                        $checked = '';
                                                    }
                                                    echo '<input type="' . $r3['type'] . '" name="' . $r3['name'] . '" value="' . $r3['value'][$i] . '" ' . $checked . ' /> ' . $r3['caption'][$i] . '<br />';
                                                }


                                                echo '
                                                                            <span class="description">' . $r3['desc'] . '</span>
                                                                                ' . $required_hidden_field . '
                                                                        </td>
                                                                    </tr>';
                                            }

                                            if ($r3['type'] == 'checkbox') {//TYPE: CHECKBOX
                                                if (get_option($tab . '_' . $r3['name']) != '') {
                                                    $val = get_option($tab . '_' . $r3['name']);
                                                    @$val_database = get_option($tab . '_' . $r3['name']);
                                                } else {
                                                    $val = $r3['value'];
                                                    @$val_database = array();
                                                }
                                                echo '<tr>
                                                                        <th><label>' . $required . '' . $r3['label'] . '</label>'.$dev.'</th>
                                                                        <td>';

                                                for ($i = 0; $i < (count($r3['value'])); $i++) {

                                                    if (@in_array($r3['value'][$i], $val_database)) {
                                                        $checked = 'checked="checked"';
                              
                                                    } else {
                                                        $checked = '';
                                                    }

                                                    echo '<input type="' . $r3['type'] . '" name="' . $r3['name'] . '[]" value="' . $r3['value'][$i] . '" ' . $checked . ' /> ' . $r3['caption'][$i] . '<br />';
                                                }

                                                echo '<input type="' . $r3['type'] . '" name="' . $r3['name'] . '[]" value="" style="display:none;" checked />';
                                                
                                                echo '
                                                                            <span class="description">' . $r3['desc'] . '</span>
                                                                                ' . $required_hidden_field . '
                                                                        </td>
                                                                    </tr>';
                                            }

                                            if ($r3['type'] == 'select') {//TYPE: SELECT
                                                if (get_option($tab . '_' . $r3['name']) != '') {
                                                    $val = get_option($tab . '_' . $r3['name']);
                                                } else {
                                                    $val = $r3['value'];
                                                }
                                                echo '<tr>
                                                                        <th><label>' . $required . '' . $r3['label'] . '</label>'.$dev.'</th>
                                                                        <td>
                                                                            <select name="' . $r3['name'] . '" id="' . $r3['id'] . '">';

                                                for ($i = 0; $i < (count($r3['value'])); $i++) {
                                                    if ($r3['value'][$i] == $val) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    echo '<option value="' . $r3['value'][$i] . '" ' . $selected . '>' . $r3['value'][$i] . '</option>';
                                                }


                                                echo '</select> 
                                                                            <span class="description"><br />' . $r3['desc'] . '</span>
                                                                            ' . $required_hidden_field . '
                                                                        </td>
                                                                    </tr>';
                                            }

                                            if ($r3['type'] == 'textarea') {//TYPE: TEXTAREA
                                                if (get_option($tab . '_' . $r3['name']) != '') {
                                                    $val = get_option($tab . '_' . $r3['name']);
                                                } else {
                                                    $val = $r3['value'];
                                                }
                                                echo '<tr>
                                                                        <th><label>' . $required . '' . $r3['label'] . '</label>'.$dev.'</th>
                                                                        <td>
                                                                            <textarea name="' . $r3['name'] . '" id="' . $r3['id'] . '" rows="' . @$r3['options']['rows'] . '" cols="' . @$r3['options']['cols'] . '">' . stripslashes($val) . '</textarea><br />
                                                                            <span class="description">' . $r3['desc'] . '</span>
                                                                                ' . $required_hidden_field . '
                                                                        </td>
                                                                    </tr>';
                                            }

                                            if ($r3['type'] == 'file') {//TYPE: FILE
                                                if (get_option($tab . '_' . $r3['name']) != '') {

                                                    $val = get_option($tab . '_' . $r3['name']);
                                                } else {
                                                    $val = $r3['value'];
                                                }
                                                echo '<tr valign="top">
                                                                        <th scope="row">' . $required . '' . $r3['label'] . ' '.$dev.'</th>
                                                                        <td><label for="' . $r3['id'] . '">
                                                                        <input class="upload-url" id="' . $r3['id'] . '" type="text" size="36" name="' . $r3['name'] . '" value="' . stripslashes($val) . '" />
                                                                        <input class="st_upload_button" id="' . $r3['id'] . '_button" type="button" value="Upload" />
                                                                        <br /><span class="description">' . $r3['desc'] . '</span>
                                                                        </label></td>
                                                                        ' . $required_hidden_field . '
                                                                      </tr>';
                                            }


                                            if ($r3['type'] == 'file_image') {//TYPE: FILE IMAGE
                                                if (get_option($tab . '_' . $r3['name']) != '') {

                                                    $val = get_option($tab . '_' . $r3['name']);
                                                } else {
                                                    $val = $r3['value'];
                                                }
                                                echo '<tr valign="top">
                                                                        <th scope="row">' . $required . '' . $r3['label'] . ' '.$dev.'</th>
                                                                        <td><label for="' . $r3['id'] . '">
                                                                        
                                                                        <input class="upload-url" id="' . $r3['id'] . '" type="text" size="36" name="' . $r3['name'] . '" value="' . stripslashes($val) . '" />
                                                                        <input class="st_upload_button" id="' . $r3['id'] . '_button" type="button" value="Upload" />';
                                                if ($val != '') {
                                                    echo '<img src="' . $val . '" width="30" height="30" />';
                                                }
                                                echo '<br /><span class="description">' . $r3['desc'] . '</span>
                                                                            </label></td>
                                                                            ' . $required_hidden_field . '
                                                                      </tr>';
                                            }
                                            
                                            if ($r3['type'] == 'hr') {//TYPE: HR (horizontal line)
                                                
                                                echo '<tr valign="top">
                                                        <td colspan="2"><hr class="hr2" style="background-color: '.@$r3['options']['color'].';color: '.@$r3['options']['color'].';width: '.@$r3['options']['width'].';height: 1px;border: 0 none;"></td>
                                                      </tr>';
                                            }

                                            if ($r3['type'] == 'button') {//TYPE: button (custom button)

                                                echo '<tr valign="top">
                                                        <td colspan="2"><input type="button" class="button-secondary" value="'.$r3['value'].'" name="' . $r3['name'] . '" id="' . $r3['id'] . '"/></td>
                                                      </tr>';
                                            }
                                        }
                                    }
                                }
                                $row_items++;
                            }
                        }
                    }


                    echo '</table>';
                }
                ?>
                <p class="submit" style="clear: both;">
                    <input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
                    <input type="hidden" name="ilc-settings-submit" value="Y" />
                </p>
            </form>
        </div>
    </div>

    <script type="text/javascript">

        jQuery(document).ready(function(){

            jQuery('#button_test').live('click', function(){

jQuery.ajax({
  type: "POST",
  url: "<?php echo get_template_directory_uri()?>/inc/reset_colors.php"
}).done(function( ) {
  alert( 'Colors now have default values again!' );
});


            })

        })

    </script>
<?php } 

?>