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
        $sort2= array('project_idproject'=>$project_idproject, 'user.posisi'=>'katim');

        $query=$this->db->select('*')->from('assign')->join('user','assign.user_no_pegawai=user.no_pegawai')->where($sort)->get();
        $query2=$this->db->select('*')->from('assign')->join('user','assign.user_no_pegawai=user.no_pegawai')->where($sort2)->get();
        $extract_posisi = $test = $this->db->get_where('user',array('no_pegawai'=>$id_karyawan))->result_array();
        $posisi=$extract_posisi[0]['posisi'];
            if($posisi == "katim"){
                if($query->num_rows()>0)
                    {
                        $this->seno->popup('Gagal Memasukan Data ','Gagal Memasukan Data Katim Hanya boleh 1 orang',Base_url('ManagementAssigment/assign/'.$project_idproject));
                    }
                else
                    {
                        if ($query2->num_rows() >= 1)
                        {
                            $this->seno->popup('Gagal Memasukan Data','Gagal Memasukan Data',Base_url('ManagementAssigment/assign/'.$project_idproject));
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
                $id_karyawan = $this->uri->segment(3);
                $project_idproject = $this->uri->segment(4);
                $sortir = array('user_no_pegawai'=>$id_karyawan,'project_idproject'=>$project_idproject);
                if($this->db->delete('assign',$sortir))
                {
                    $this->seno->popup('Sukses menghapus user','Sukses Menghapus User',Base_url('ManagementAssigment/assign/'.$project_idproject));
                }
                else
                {
                    $this->seno->popup('Gagal menghapus user','Gagal Menghapus User',Base_url('ManagementAssigment/assign/'.$project_idproject));
                }
    }

    
}