<?php


defined('BASEPATH') OR exit ('No direct script access allowed');


/**
* 
*/
class Preview extends CI_Controller
{
	
	function __construct()
		{
			parent::__construct();
			$this->load->model('Model_Post');
		}

	function index()
		{
			$preview 	= $this->Model_Post->get_article_preview();

			$data 		= array(
									'lstPreview' => $preview
							   );
			$this->load->view('Preview/v_preview',$data);
		}
}

?>