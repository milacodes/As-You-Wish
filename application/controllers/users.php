<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler();

	}

	public function index()		
	{
		$this->load->view('main');
	}

	public function login(){
		if($this->user->logpross($this->input->post())){ //user was logged in
			
			redirect('/wishes/show');
			
		}
		else{ //no user was found
			redirect('/');
		}
	}

	public function register(){

		$this->user->regpross($this->input->post());
		redirect('/');
	}


	
}

