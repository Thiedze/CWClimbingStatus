<?php

global $cwclimbingstatus_db_version;
$cwclimbingstatus_db_version = '1.0';

function cwclimbingstatus_install() {
	global $wpdb;
	global $cwclimbingstatus_db_version;

	$table_name = $wpdb->prefix . 'cwclimbingstatus';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		user nvarchar(255) NOT NULL,
		start datetime DEFAULT NOW() NOT NULL,
		end datetime DEFAULT NOW() NOT NULL,
		dow int NOT NULL,
		status int,
		defaultstatus int,
		laststatusupdate datetime DEFAULT NOW() NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	
	$table_name = $wpdb->prefix . 'cwclimbingstatus_status';
	
	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		status nvarchar(255) NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";
	
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'cwclimbingstatus_db_version', $cwclimbingstatus_db_version );
}

function cwclimbingstatus_install_data() {
	global $wpdb;
	
	$table_name = $wpdb->prefix . 'cwclimbingstatus';
	
	$wpdb->insert( 
		$table_name, 
		array(  
			'user' => 'thiems', 
			'start' => current_time( 'mysql' ), 
			'end' => current_time( 'mysql' ),
			'laststatusupdate' => current_time( 'mysql' )
		) 
	);
	
	$table_name = $wpdb->prefix . 'cwclimbingstatus_status';
	
	$wpdb->insert( 
		$table_name, 
		array(  
			'status' => 'Außenanlage'
		) 
	);
}

?>
