<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wishes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler();
	}


	public function show()		
	{
		$mines = $this->wish->get_mine();
		$alls = $this->wish->get_all();
		$user = $this->wish->get_user_info();
		$this->load->view('wishlist', array("user" => $user, "alls" => $alls, "mines" => $mines));
	}

	public function view_item($id){
		$items = $this->wish->get_item($id);
		$this->load->view("view_item", array("items" => $items));
	}


	public function logout()		
	{
		$this->session->sess_destroy();
		redirect('/');
	}


	public function addnew()		
	{
		$this->load->view("createnew");
	}


	public function add_it(){

		$this->wish->add_it($this->input->post());
		redirect("/wishes/show");
	}

	public function addmine($id){
		$this->wish->addmine($id);
		redirect("/wishes/show");
	}

	public function remove($id){
		$this->wish->remove($id);
		redirect("/wishes/show");
	}

	public function delete($id){
		$this->wish->delete($id);
		redirect('wishes/show');
	}
}