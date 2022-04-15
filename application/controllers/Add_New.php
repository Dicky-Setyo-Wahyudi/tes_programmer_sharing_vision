<?php


defined('BASEPATH') OR exit ('No direct script access allowed');


/**
* 
*/
class Add_New extends CI_Controller
{
	
	function index()
		{
			$this->load->view('New/v_add_new');
		}
}

?>