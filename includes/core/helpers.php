<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Require class for admin panel
*/
function mxpctyw_require_class_file_admin( $file ) {

	require_once MXPCTYW_PLUGIN_ABS_PATH . 'includes/admin/classes/' . $file;

}


/*
* Require class for frontend panel
*/
function mxpctyw_require_class_file_frontend( $file ) {

	require_once MXPCTYW_PLUGIN_ABS_PATH . 'includes/frontend/classes/' . $file;

}

/*
* Require a Model
*/
function mxpctyw_use_model( $model ) {

	require_once MXPCTYW_PLUGIN_ABS_PATH . 'includes/admin/models/' . $model . '.php';

}

/*
* if calc table exists
*/
function mxpctyw_calc_table_exists() {

	global $wpdb;

	$table_name = $wpdb->prefix . MXPCTYW_TABLE_SLUG;

	if ( $wpdb->get_var( "SHOW TABLES LIKE '" . $table_name . "'" ) !=  $table_name ) {

		return false;

	}

	return true;

}

/*
* if calc table creation
*/
function mxpctyw_calc_table_creation() {

	// Create table
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . MXPCTYW_TABLE_SLUG;

	if ( $wpdb->get_var( "SHOW TABLES LIKE '" . $table_name . "'" ) !=  $table_name ) {

		$sql = "CREATE TABLE IF NOT EXISTS `$table_name`
		(
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`calc_options` longtext NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=$wpdb->charset AUTO_INCREMENT=1;";

		$wpdb->query( $sql );

	}

}

/**
* Get calc by id
*/
function mxpctyw_get_calc_by_id( $id ) {

	global $wpdb;

	$table_name = $wpdb->prefix . MXPCTYW_TABLE_SLUG;

	$result = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = $id" );

	return $result;

}