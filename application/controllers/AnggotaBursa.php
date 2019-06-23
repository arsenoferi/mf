<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnggotaBursa extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
        $this->load->library('seno');
        $this->load->model('User_model');
    }

    public function index()
    {
        
        $data['list'] = $this->db->get('data_ab')->result_array();
        $data['tambah_ab'] = base_url('AnggotaBursa/tambah_ab');
        $this->seno->template('AnggotaBursa/index',$data,'Anggota Bursa','Daftar Anggota Bursa');
    }


    public function tambah_ab()
    {
        $data['action']=base_url('AnggotaBursa/action_tambah_ab');
        $data['form']=array
        (
            array('label'=>'Kode AB','type'=>'text', 'name'=>'kode_ab','maxlength'=>'3'),
            array('label'=>'Nama AB','type'=>'text', 'name'=>'Nama_ab','maxlength'=>'255'),
            array('label'=>'Alamat AB','type'=>'text', 'name'=>'Alamat','maxlength'=>'255'),
            array('label'=>'Telp AB','type'=>'text', 'name'=>'telp','maxlength'=>'255'),
        );
        $this->seno->template('AnggotaBursa/tambah_ab',$data,'Tambah Anggota Bursa','Tambah Anggota Bursa');
    }
    
    public function action_tambah_ab()
    {
        $insert=array(
            'kode_ab'=>$this->input->post('kode_ab'),
            'Nama_ab'=>$this->input->post('Nama_ab'),
            'Alamat'=>$this->input->post('Alamat'),
            'telp'=>$this->input->post('telp')
        );

        if($this->db->get_where('data_ab',array('kode_ab'=>$insert['kode_ab']))->num_rows()>=1)
        {
            $this->seno->popup('Gagal memasukan database','kode AB '.$insert['kode_ab'].' sudah terdaftar masukkan kode lain',base_url('AnggotaBursa/tambah_ab'));
        }
        else if($this->db->insert('data_ab',$insert))
        {
            $this->seno->popup('sukses memasukan database','selamat sukses memasukan anggota bursa bernama '.$insert['Nama_ab'],base_url('AnggotaBursa/tambah_ab'));
        }
        else
        {
            $this->seno->popup('gagal memasukan database','gagal  memasukan anggota bursa bernama '.$insert['Nama_ab'],base_url('AnggotaBursa/tambah_ab'));
        }
    } 

    public function edit()
    {
        $kode_ab=$this->uri->segment(3);
       $query = $this->db->get_where('data_ab',array('kode_ab'=>$kode_ab));

       foreach($query->result() as $a)
       {
           $data['form']=array(
               array('label'=>'Nama AB', 'name'=>'Nama_ab','type'=>'text','maxlength'=>'255','value'=>$a->Nama_ab),
               array('label'=>'Alamat AB', 'name'=>'Alamat','type'=>'text','maxlength'=>'255','value'=>$a->Alamat),
               array('label'=>'telp', 'name'=>'telp','type'=>'text','maxlength'=>'255','value'=>$a->telp)
           );
           $kode_ab = $a->kode_ab;

       }
       $data['action']=base_url('AnggotaBursa/action_edit/'.$kode_ab);

       $this->seno->template('AnggotaBursa/edit',$data,'Edit AB','Edit Data AB');
    }

    //belum fix nih brok
    public function action_edit()
    {
        
        $input=array(
            'kode_ab'=>$this->uri->segment(3),
            'Nama_ab'=>$this->input->post('Nama_ab'),
            'Alamat'=>$this->input->post('Alamat'),
            'telp'=>$this->input->post('telp')
        );
        
        $query = $this->db->get_where('data_ab',array('kode_ab'=>$input['kode_ab']));
        if($this->db->replace('data_ab',$input))
        {
        
            $this->seno->popup('Sukses Mengupdate','Update Data Berhasil',base_url('AnggotaBursa'));
        }
        else
        {
            $this->seno->popup('Gagal Mengupdate','Update Data Gagal',base_url('AnggotaBursa'));
        }

    }

    public function DeleteAb()
    {
        $kode_ab = $this->uri->segment(3);
        
        if($this->db->delete('data_ab',array('kode_ab'=>$kode_ab)))
        {
            $this->seno->popup('Sukses','Sukses Menghapus AB',base_url('AnggotaBursa'));
        }
        else
        {
            $this->seno->popup('Gagal','Gagal Menghapus User',base_url('AnggotaBursa'));
        }
    }
    
}