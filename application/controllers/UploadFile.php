<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class UploadFile extends CI_Controller {

	

	

	public function __construct()

	{

		parent::__construct();

        $this->load->library('seno');

        $this->load->model('User_model');

    }

    public function index()
    {
        
    }
}
?>