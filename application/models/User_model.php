<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    public function insert($parameter){
        $data = array (
            'no_pegawai' => $parameter['no_pegawai'],
            'nama' => $parameter['nama'],
            'username' => $parameter['username'],
            'email' => $parameter['email'],
            'posisi' => $parameter['posisi'],
            'password' => $this->encryption->encrypt($parameter['username'])
        );
        
        if($this->db->get_where('user',array('no_pegawai'=>$data['no_pegawai']))->num_rows()>=1)
        {
           return 1;
        }
        elseif($this->db->get_where('user',array('email'=>$data['email']))->num_rows()>=1)
        {
            return 2;
        }
        elseif($this->db->get_where('user',array('username'=>$data['username']))->num_rows()>=1)
        {
            return 5;
        }
        else
        {
            if($this->db->insert('user',$data))
            {
                return 3 ;
            }
            else 
            {
                return 4 ;
            }
        }
    }

    public function ShowUser()
    {
        
        $show=$this->db->select('no_pegawai,nama,username,email,posisi')->get('user');
        return $show->result_array();
    }


}