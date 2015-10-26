<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function logpross($post){
		$this->form_validation->set_rules("email", "Email Address", "trim|required");
		$this->form_validation->set_rules('password', "Password", "trim|required");

		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata("errors", validation_errors());
		}

		else{
			//check if user info is in db.
			$query = "SELECT * from users where email = ? AND password = ?";
			$values = array($post['email'], $post['password']);
			$person = $this->db->query($query, $values)->row_array();

			if(empty($person)){
				$this->session->set_flashdata("errors", "Your email or password is incorrect. Try again.");
				return false;
			}
			else{
				$this->session->set_userdata("id", $person['id']);
				$this->session->set_userdata("username", $person['username']);
		
				return true;
			}
		}
	}

	public function regpross($post){
		
		//validate
		$this->form_validation->set_rules('first', "First Name", "trim|required|min_length[3]");
		$this->form_validation->set_rules('username', "Username", "trim|required|min_length[3]");
		$this->form_validation->set_rules("email", "Email Address", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules('password', "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules('confirm', "Password Confirmation", "trim|required|matches[password]");
		$this->form_validation->set_rules('birthday', "Birthday", "trim|required");

		if ($this->form_validation->run() === FALSE) {
			
			$this->session->set_flashdata("errors", validation_errors());
			redirect('/');
		}
		else{
			$this->session->set_flashdata("success", "You've completed registration. Now log in!");
			$query = "INSERT INTO users (first_name, username, email, password, birthday, created_at, updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
			$values = array($post["first"], $post["username"], $post["email"], $post["password"], $post["birthday"]);
			$this->db->query($query, $values);
		}
		
	}

	
}