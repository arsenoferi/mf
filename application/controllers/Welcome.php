<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('seno');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function pita()
	{
		$data['coba']="aku";
		$data['wow']= array(
			array ("nama" => "arseno","umur" => 20),
		);

		array_push ($data['wow'],
			array ("nama" => "pita","umur" => 20),
			array ("nama" => "pita","umur" => 20),
			array ("nama" => "pita","umur" => 20),
			array ("nama" => "pita","umur" => 20));
		$this->seno->template('coba',$data,'aku','coba');
	}
}
