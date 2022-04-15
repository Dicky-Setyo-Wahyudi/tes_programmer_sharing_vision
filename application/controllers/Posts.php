<?php


defined('BASEPATH') OR exit ('No direct script access allowed');


/**
* 
*/
class Posts extends CI_Controller
{
	
	function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('Model_Post');
		}

	function index()
		{
			$publish 	= $this->Model_Post->get_article_publish();
			$draft		= $this->Model_Post->get_article_draft();
			$trash 		= $this->Model_Post->get_article_trash();

			$data 		= array(
									'lstPublish' 	=> $publish,
									'lstDraft'		=> $draft,
									'lstTrash'		=> $trash
							   );
			$this->load->view('Posts/v_posts',$data);
		}

	function edit_article($id)
		{
			$edit 	= $this->Model_Post->get_edit_article($id);

			$data 	= array(
								'edtArticle' => $edit
						   );
			$this->load->view('Posts/v_edit',$data);
		}

	function hapus_article($id)
		{
			$data 	= array(
								'Status' => 'Trash'
						   );
			date_default_timezone_set('Asia/Jakarta');
	    	$this->db->set('Updated_Date',date('Y-m-d H:i:s'));
			$this->db->where('Id',$id);
			$this->db->update('posts', $data);
			redirect('Posts');
		}

	function get_article_page($limit,$offset)
		{
			$query 	 = "SELECT Title,Content,Category,Status FROM posts LIMIT $limit OFFSET $offset";
			$article = $this->db->query($query)->result();
	        if ($article) 
	        	{
		        	$response['status'] = "sukses";
		        	$response['pesan'] 	= "Data Ada";
		        	$response['data'] 	= $article;
	        	} 
	        else 
	        	{
		        	$response['status'] = "error";
		        	$response['pesan'] 	= "Data Tidak Ada";
	        	}
	        header('Content-Type: application/json');
	        echo json_encode($response, JSON_PRETTY_PRINT);
		}	

	function get_article($id)
		{
			$query 	 = "SELECT Title,Content,Category,Status FROM posts WHERE Id = '$id'";
			$article = $this->db->query($query)->result();
	        if ($article) 
	        	{
		        	$response['status'] = "sukses";
		        	$response['pesan'] 	= "Data Ada";
		        	$response['data'] 	= $article;
	        	} 
	        else 
	        	{
		        	$response['status'] = "error";
		        	$response['pesan'] 	= "Data Tidak Ada";
	        	}
	        header('Content-Type: application/json');
	        echo json_encode($response, JSON_PRETTY_PRINT);
		}	


	function post_article() 
    	{
    		$title 		= $this->input->post('Title');
    		$content 	= $this->input->post('Content');
    		$category 	= $this->input->post('Category');
    		$status 	= $this->input->post('Status');

    		$this->form_validation->set_rules('Title','Title','required|min_length[20]');
    		$this->form_validation->set_rules('Content','Content','required|min_length[100]');
    		$this->form_validation->set_rules('Category','Category','required|min_length[3]');
    		$this->form_validation->set_rules('Status','Status','required|callback_status');
    		$this->form_validation->set_message('callback_status','Silahkan Pilih Publish, Draft, atau Trash');

    		if($this->form_validation->run() == FALSE)
    			{
    				print_r($this->form_validation->error_array());
    			}

    		else 
	    		{
	    			$data = array(
			        				'Title'			=> $title,
			        				'Content'		=> $content,
			        				'Category'		=> $category,
			            			'Status'		=> $status
		        			 	 );
	    			date_default_timezone_set('Asia/Jakarta');
	    			$this->db->set('Created_Date',date('Y-m-d H:i:s'));
			        $insert = $this->db->insert('posts', $data);
			        if ($insert) 
			        	{
			        		$response['status'] = "sukses";
			        		$response['pesan'] 	= "Data Berhasil disimpan";
			        	} 
			        else 
			        	{
			            	$response['status'] = "error";
			        		$response['pesan'] 	= "Data Gagal disimpan";
			        	}
			        header('Content-Type: application/json');
			        echo json_encode($response, JSON_PRETTY_PRINT);
	    		}
    	}

    function status($cek)
		{	
			if($cek!=="Publish" && $cek!=="Draft" && $cek!=="Trash")
				{
					$this->form_validation->set_message('status', 'Silahkan Pilih Publish, Draft, atau Trash');
					return false;
				}

			else
				{
					return true;
				}
		}

	function update_article($id)
		{
			$title 		= $this->input->post('Title');
    		$content 	= $this->input->post('Content');
    		$category 	= $this->input->post('Category');
    		$status 	= $this->input->post('Status');

    		$this->form_validation->set_rules('Title','Title','required|min_length[20]');
    		$this->form_validation->set_rules('Content','Content','required|min_length[100]');
    		$this->form_validation->set_rules('Category','Category','required|min_length[3]');
    		$this->form_validation->set_rules('Status','Status','required|callback_status');
    		$this->form_validation->set_message('callback_status','Silahkan Pilih Publish, Draft, atau Trash');

    		if($this->form_validation->run() == FALSE)
    			{
    				print_r($this->form_validation->error_array());
    			}

    		else 
	    		{
	    			$data = array(
			        				'Title'			=> $title,
			        				'Content'		=> $content,
			        				'Category'		=> $category,
			            			'Status'		=> $status
		        			 	 );
	    			date_default_timezone_set('Asia/Jakarta');
	    			$this->db->set('Updated_Date',date('Y-m-d H:i:s'));
	    			$this->db->where('Id',$id);
			        $update = $this->db->update('posts', $data);
			        if ($update) 
			        	{
			        		$response['status'] = "sukses";
			        		$response['pesan'] 	= "Data Berhasil diupdate";
			        	} 
			        else 
			        	{
			            	$response['status'] = "error";
			        		$response['pesan'] 	= "Data Gagal diupdate";
			        	}
			        header('Content-Type: application/json');
			        echo json_encode($response, JSON_PRETTY_PRINT);
	    		}
		}

    function delete_article()
    	{
    		$id 	= $this->input->post('Id');
	        $this->db->where('Id', $id);
	        $delete = $this->db->delete('posts');
	        if ($delete) 
	        	{
	        		$response['status'] = "sukses";
	        		$response['pesan'] 	= "Data Berhasil dihapus";
	        	} 
	        else 
	        	{
	            	$response['status'] = "error";
	        		$response['pesan'] 	= "Data Gagal dihapus";
	        	}
	        header('Content-Type: application/json');
	        echo json_encode($response, JSON_PRETTY_PRINT);
    	}
}


?>