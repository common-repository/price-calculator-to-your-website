<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Main page Model
*/
class MXPCTYW_Main_Page_Model extends MXPCTYW_Model
{

	/*
	* Observe function
	*/
	public static function mxpctyw_wp_ajax()
	{

		add_action( 'wp_ajax_mxpctyw_update', array( 'MXPCTYW_Main_Page_Model', 'prepare_update_database_column' ), 10, 1 );

		add_action( 'wp_ajax_mx_cacl_remove', array( 'MXPCTYW_Main_Page_Model', 'prepare_calc_remove' ), 10, 1 );

	}

	/*
	* Prepare calc remove
	*/
	public static function prepare_calc_remove()
	{

		// Checked POST nonce is not empty
		if( empty( $_POST['nonce'] ) ) wp_die( '0' );

		if( wp_verify_nonce( $_POST['nonce'], 'mxpctyw_nonce_remove_calc_request' ) ) {
			
			global $wpdb;

			$table_name = $wpdb->prefix . MXPCTYW_TABLE_SLUG;

			$delete = $wpdb->delete( $table_name, array( 'id' => $_POST['calc_id'] ) );
			
			if( $delete == 1 ) {

				echo 'delete';

			} else {

				echo 'failed';

			}

		}

			wp_die();

	}

	/*
	* Prepare for data updates
	*/
	public static function prepare_update_database_column()
	{
		
		// Checked POST nonce is not empty
		if( empty( $_POST['nonce'] ) ) wp_die( '0' );

		// Checked or nonce match
		if( wp_verify_nonce( $_POST['nonce'], 'mxpctyw_nonce_request' ) ){

			$data = array();

			$data['calc_name'] = sanitize_text_field( $_POST['calc_name'] );

			$data['calc_currency'] = sanitize_text_field( $_POST['calc_currency'] );

			// 
			$data['calc_font'] = sanitize_text_field( $_POST['calc_font'] );

			$data['calc_max_width'] = sanitize_text_field( $_POST['calc_max_width'] );

			$data['calc_bg_color'] = sanitize_hex_color( $_POST['calc_bg_color'] );

			$data['elements'] = array();

			foreach( $_POST['obj_price_calcs_elem'] as $key => $value ) {

				$key = intval( $key );

				$data['elements'][$key] = array();

				$data['elements'][$key]['name'] = sanitize_text_field( $value['price_calc_element_name'] );

				$data['elements'][$key]['desc'] = sanitize_textarea_field( $value['price_calc_element_desc'] );

				$data['elements'][$key]['item_name'] = sanitize_text_field( $value['price_calc_element_item_name'] );

				$data['elements'][$key]['item_price'] = sanitize_text_field( $value['price_calc_element_item_price'] );

			}

			$calc_id = $_POST['edit_calc'];			

			if( $calc_id == '' ) {

				// // create calc
				self::cteate_calc( $data );	

			} else {

				// Update data
				self::update_calc( $data, $calc_id );	

			}

		}

		wp_die();

	}

		// Update data
		public static function update_calc( $data, $calc_id )
		{

			$serialized_data = maybe_serialize( $data );

			global $wpdb;

			$table_name = $wpdb->prefix . MXPCTYW_TABLE_SLUG;

			$_update_option = $wpdb->update( 
				$table_name, 
				array( 
					'calc_options' 	=> $serialized_data,
				), 
				array( 
					'id'	=> $calc_id
				) 
			);

			if( $_update_option == 1 ) {

				echo 'updated';

			} else {

				echo 'failed';

			}

		}

		// Create data
		public static function cteate_calc( $data )
		{

			$serialized_data = maybe_serialize( $data );

			global $wpdb;

			$table_name = $wpdb->prefix . MXPCTYW_TABLE_SLUG;

			$_update_option = $wpdb->insert( 
				$table_name, 
				array( 
					'calc_options' 				=> $serialized_data,
				), 
				array( 
					'%s'
				) 
			);

			if( $_update_option == 1 ) {

				echo 'updated';

			} else {

				echo 'failed';

			}

		}

	public function mxpctyw_get_results()
	{

		global $wpdb;

		$tablename = $wpdb->prefix . MXPCTYW_TABLE_SLUG;

		$results = $wpdb->get_results( "SELECT * FROM $tablename ORDER BY id DESC" );

		return $results;

	}
	
}