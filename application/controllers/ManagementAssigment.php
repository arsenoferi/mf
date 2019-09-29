<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ManagementAssigment extends CI_Controller {

	

	

	public function __construct()

	{

		parent::__construct();

        $this->load->library('seno');

        $this->load->model('User_model');

    }

    public function index()
    {
        $this->seno->template();

    }


    Public function assign()
    {
        $class = array('katim','anggota');
        $data['pegawai']= $this->db->where_in('posisi',$class)->get('user')->result_array();
        $this->seno->template('ManagementAssigment/assign',$data,'Assign Anggota','Assign Anggota');

    }



    

}