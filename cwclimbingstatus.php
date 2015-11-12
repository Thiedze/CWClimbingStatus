<?php
/*
Plugin Name: CWClimbingStatus
Plugin URI: http://www.dav-bocholt.de	
Description: Easy to use climbing training status committer
Version: 1.0
Author: Sebastian Thiems	
Author URI: http://www.dav-bocholt.de
Update Server: http://www.dav-bocholt.de/wp-content/download/wp/
Min WP Version: 1.5
Max WP Version: 2.0.4
*/

include 'cwclimbingstatus_create_table.php';

function cwclimbingstatus_head() {
	echo "<script type=\"text/javascript\">alert(\"hello world\");</script>\n";
}

add_action('wp_head', 'cwclimbingstatus_head');
register_activation_hook( __FILE__, 'cwclimbingstatus_install' );
register_activation_hook( __FILE__, 'cwclimbingstatus_install_data' );
define('WP_DEBUG', true);
?>
