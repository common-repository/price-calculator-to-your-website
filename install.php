<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


class MXPCTYW_Basis_Plugin_Class
{

	private static $table_slug = MXPCTYW_TABLE_SLUG;

	public static function activate()
	{

		// Create table
		global $wpdb;

		// Table name
		$table_name = $wpdb->prefix . self::$table_slug;

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

	public static function deactivate()
	{

		// Rewrite rules
		flush_rewrite_rules();

	}

	/*
	* This function sets the option in the table for CPT rewrite rules
	*/
	public static function create_option_for_activation()
	{

		// add_option( 'mxpctyw_flush_rewrite_rules', 'go_flush_rewrite_rules' );

	}

}