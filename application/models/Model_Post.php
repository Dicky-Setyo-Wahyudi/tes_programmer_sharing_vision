<?php


defined('BASEPATH') OR exit ('No direct script access allowed');


/**
* 
*/
class Model_Post extends CI_Model
{
	function get_article_publish()
		{
			$sql  	= "SELECT * FROM posts WHERE STATUS = 'Publish'";
			$db 	= $this->db->query($sql);
			return $db->result();
		}

	function get_article_draft()
		{
			$sql  	= "SELECT * FROM posts WHERE STATUS = 'Draft'";
			$db 	= $this->db->query($sql);
			return $db->result();
		}

	function get_article_trash()
		{
			$sql  	= "SELECT * FROM posts WHERE STATUS = 'Trash'";
			$db 	= $this->db->query($sql);
			return $db->result();
		}

	function get_article_preview()
		{
			$sql  	= "SELECT * FROM posts WHERE STATUS = 'Publish'";
			$db 	= $this->db->query($sql);
			return $db->result();
		}

	function get_edit_article($id)
		{
			$query 	= "SELECT * FROM posts WHERE Id ='$id'";
			$db 	= $this->db->query($query);
			return $db->result();
		}
}

?>