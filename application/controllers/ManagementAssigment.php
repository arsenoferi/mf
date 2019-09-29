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
        $data['project'] = $this->uri->segment(3);
        $class = array('katim','anggota');
        $data['pegawai']= $this->db->where_in('posisi',$class)->get('user')->result_array();
        $sort=array('project_idproject'=> $data['project']);//sort based on project
        $data['assigment']=$this->db->select('*')->from('assign')->join('user','assign.user_no_pegawai=user.no_pegawai')->where($sort)->get()->result_array();
        $this->seno->template('ManagementAssigment/assign',$data,'Assign Anggota','Assign Anggota');
        

    }

    Public function action_assign()
    {
        $id_karyawan = $this->uri->segment(3);
        $project_idproject = $this->uri->segment(4);
        $sort= array('user_no_pegawai'=>$id_karyawan,'project_idproject'=>$project_idproject);

        $query=$this->db->where($sort)->get('assign');

        if($query->num_rows()>0)
            {

            }
        else
            {
                $insert=array(
                    'user_no_pegawai' => $id_karyawan,
                    'project_idproject' => $project_idproject
                );

                if($this->db->insert('assign', $insert))
                {
                    $this->seno->popup('sukses memasukan data','sukses memasukan data',Base_url('ManagementAssigment/assign/'.$project_idproject));
                }
                else
                {
                    $this->seno->popup('Gagal Memasukan Data','Gagal Memasukan Data',Base_url('ManagementAssigment/assign/'.$project_idproject));
                }
            }
    }

    public function action_hapus()
    {
        
    }




    

}