<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wish extends CI_Model {

	
	public function add_it($post){

		
			$query = "INSERT INTO items (user_id, name, added_by, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
			$values = array($this->session->userdata("id"), $post["item_name"], $this->session->userdata("username"));
			
			$this->db->query($query, $values);
			
	
	}

	public function get_all(){
		$query = "SELECT id, name, added_by, created_at FROM items
				WHERE id NOT IN
				(SELECT item_id FROM wishes WHERE user_id = ?)";
		$values = $this->session->userdata("id");
		return $this->db->query($query, $values)->result_array();
	}


	public function addmine($id){
		$query = "INSERT INTO wishes (user_id, item_id) VALUES (?,?)";
		$values = array($this->session->userdata("id"), $id);
		$this->db->query($query, $values);

	}


	public function get_mine(){
		$query = "SELECT * FROM wishes
				LEFT JOIN users ON users.id = wishes.user_id
				LEFT JOIN items ON items.id = wishes.item_id
				WHERE users.id = ?";
		$values = $this->session->userdata("id");
		return $this->db->query($query, $values)->result_array();
	}


	public function get_item($id){
		$query = "SELECT * FROM wishes
				LEFT JOIN items ON items.id = wishes.item_id
				LEFT JOIN users ON users.id = wishes.user_id
				WHERE items.id = ?";
		$values = $id;
		return $this->db->query($query, $values)->result_array();
	}


	public function get_user_info(){
		$query = "SELECT first_name, username, email FROM users WHERE id = ?";
		$values = $this->session->userdata("id");
		return $this->db->query($query, $values)->row_array();
	}

	
	public function remove($id){
		$query = "DELETE FROM wishes WHERE item_id = ? AND user_id = ?";
		$values = array($id, $this->session->userdata("id"));
		$this->db->query($query, $values);
	}


	public function delete($id){
		$query = "DELETE FROM items WHERE id = ? AND user_id = ?";
		$values = array($id, $this->session->userdata("id"));
		$this->db->query($query, $values);
	}


}