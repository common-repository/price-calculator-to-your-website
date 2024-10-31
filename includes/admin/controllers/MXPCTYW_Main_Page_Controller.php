<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXPCTYW_Main_Page_Controller extends MXPCTYW_Controller
{
	
	public function index()
	{

		$model_inst = new MXPCTYW_Main_Page_Model();

		$data = $model_inst->mxpctyw_get_results();

		return new MXPCTYW_View( 'index', $data );

	}

	public function add_new()
	{		

		return new MXPCTYW_View( 'add-new' );

	}

	public function edit_calc()
	{

		return new MXPCTYW_View( 'edit-calc' );

	}
	
	
}