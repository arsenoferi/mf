<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAdmin extends CI_Controller {
	
	
	
	public function __construct()
	{
		parent::__construct();
        $this->load->library('seno');
        $this->load->model('User_model');
    }

    public function tambah_user()
    {
        $data['action']=base_url('UserAdmin/post');
        $data['form']=array(
            array('label'=>'Nomor Pegawai','name'=>'no_pegawai','type'=>'text'),
            array('label'=>'Nama','name'=>'nama','type'=>'text'),
            array('label'=>'Username','name'=>'username','type'=>'text'),
            array('label'=>'Email','name'=>'email','type'=>'email'),
        );
        $this->seno->template('UserAdmin/UserAdmin_dashboard',$data,'admin user','admin user');
    }

    public function post()
    {
        $data = array (
            'no_pegawai' => $this->input->post('no_pegawai'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'posisi' => $this->input->post('posisi')
        );

        $status=$this->User_model->insert($data);

        switch ($status) {
            case 1:
                $this->seno->popup('Sukses','Data '.$data['nama'].' gagal dimasukkan dikarenakan no pegawai sudah ada',base_url('UserAdmin'));
                break;
            case 2:
                $this->seno->popup('Sukses','Data '.$data['nama'].' gagal dimasukkan dikarenakan email pegawai sudah ada',base_url('UserAdmin'));
                break;
            case 3:
                $this->seno->popup('Sukses','Data '.$data['nama'].' sukses dimasukkan',base_url('UserAdmin'));
                break;
            case 4:
                $this->seno->popup('Sukses','Data '.$data['nama'].' gagal dimasukkan di karenakan kesalahan proses system',base_url('UserAdmin'));
                break;
            case 5:
                $this->seno->popup('Sukses','Data '.$data['nama'].' gagal dimasukkan di karenakan username sudah ada',base_url('UserAdmin'));
                break;
        }
                    
    }

    public function index()
    {
        
        $data['daftar']=$this->User_model->ShowUser();
        $data['tambah_user']=base_url('UserAdmin/tambah_user');
        $this->seno->template('UserAdmin/UserList',$data,'admin user','admin user');
    }

    public function DeleteUser()
    {
        $user = $this->uri->segment(3);

        if($this->db->delete('user',array('no_pegawai'=>$user)))
        {
            $this->seno->popup('Sukses','Sukses Menghapus User',base_url('UserAdmin/UserList'));
        }
        else
        {
            $this->seno->popup('Gagal','Gagal Menghapus User',base_url('UserAdmin'));
        }
    }

    public function edit()
    {
        
        $no_pegawai = $this->uri->segment(3);
        $value = $this->db->get_where('user',array('no_pegawai'=>$no_pegawai))->result();
        
        foreach($value as $a){
            $no_pegawai = $a->no_pegawai;
            $nama = $a->nama;
            $username = $a->username;
            $email = $a->email;
        }
        
        $data['action']=base_url('UserAdmin/action_edit/'.$no_pegawai);
        $data['link_reset']=base_url("UserAdmin/reset_password/".$no_pegawai);
        $data['form']=array(
            array('label'=>'Nama','name'=>'nama','type'=>'text','value'=>$nama),
            array('label'=>'Username','name'=>'username','type'=>'text','value'=>$username),
            array('label'=>'Email','name'=>'email','type'=>'email','value'=>$email),
        );
        $this->seno->template('UserAdmin/Edit',$data,'admin user','admin user');
    }

    public function action_edit()
    {   
        $no_pegawai = $this->uri->segment(3);
        
        $update = array(
        'nama' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'posisi' => $this->input->post('posisi')
        );

        if($this->db->update('user',$update,array('no_pegawai'=>$no_pegawai)))
        {
            $this->seno->popup('Sukses','sukses mengupdate data',base_url('UserAdmin'));
        }
        else
        {
            $this->seno->popup('Gagal','Gagal mengupdate data',base_url('UserAdmin'));
        }

    }

    public function reset_password()
    {
        $this->load->library('encryption');
        $no_pegawai=$this->uri->segment(3);
        $value = $this->db->get_where('user',array('no_pegawai'=>$no_pegawai))->result();
        
        foreach($value as $a)
        {
            $username = $a->username;       
        }

        $password = $this->encryption->encrypt($username);
    
        $update = array(
            'password' => $password
        );

        if($this->db->update('user',$update,array('no_pegawai'=>$no_pegawai)))
        {
            $this->seno->popup('Sukses','sukses mereset password',base_url('UserAdmin/edit/'.$no_pegawai));
        }
        else
        {
            $this->seno->popup('Gagal','Gagal mereset password',base_url('UserAdmin/edit/'.$no_pegawai));
        }
    }

}