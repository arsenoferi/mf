<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
   
   
    public function __construct()
	{
		parent::__construct();
        $this->load->library('seno');
        $this->load->model('User_model');
        $this->load->library('file');
    }

    //home page halaman project
    public function index()
    {
        $data['list'] = $this->db->get('project')->result_array();
        $this->seno->template('Project/index',$data,'Project','Project');
    }

    public function tambah()
    {
        $data['action'] = base_url('Project/action_tambah');
        $data['kode_ab'] = $this->uri->segment(3);
        $this->seno->template('Project/tambah',$data,'Tambah Project','Tambah Project');
    }

    //aksi untuk menambah project
    public function action_tambah()
    {
        $data_ab_kode_ab = $this->input->post('kode_ab');
        $tahun = $this->input->post('tahun');
        $scope = $this->input->post('scope');
        $area = $this->input->post('area');
        $keterangan = $this->input->post('keterangan');

        $data=array(
            'data_ab_kode_ab' => $data_ab_kode_ab,
            'tahun' => $tahun,
            'scope' => $scope,
            'area' =>$area,
            'keterangan' => $keterangan
        );

        $query = $this->db->get_where('project',array('data_ab_kode_ab'=>$data_ab_kode_ab,'tahun'=>$tahun,'scope'=>$scope,'area'=>$area))->num_rows();

        if($query==0)
        {

            if($this->db->insert('project',$data) and $this->file->make_folder($data_ab_kode_ab,$tahun,$area,$scope))
            {
                $this->seno->popup('Berhasil Membuat Project','Selamat anda berhasil membuat project dengan kode ab: '.$data_ab_kode_ab.' untuk project tahun '.$tahun.' dengan scope '.$scope.' dan area '.$area,base_url('Project'));
            }
            else
            {
                $this->seno->popup('Berhasil Membuat Project','gagal membuat project',base_url('Project'));
            }

        }
        else
        {
            $this->seno->popup('Project sudah ada','Project tidak dapat di buat karena project sudah terdaftar',base_url('AnggotaBursa'));
        }
    }

    //halaman edit
    public function edit ()
    {

    }

    //fungsi delete
    public function delete()
    {
        $id = $this->uri->segment(3);
        $query = $this->db->get_where('project',array('idproject'=>$id));
        foreach($query->result() as $a)
        {
            $data_ab_kode_ab = $a->data_ab_kode_ab;
            $tahun =$a->tahun;
            $scope = $a->scope;
            $area = $a->area;
            $keterangan = $a->keterangan;
        }

        if($this->db->delete('project',array('idproject'=>$id)) and $this->file->delete($data_ab_kode_ab,$tahun,$area,$scope))
        {
            $this->seno->popup('berhasil menghapus','berhasil menghapus project',base_url('project'));
        }
        else
        {
            $this->seno->popup('gagal menghapus','gagal menghapus project',base_url('project'));
        }
    }

    public function coba()
    {
        $this->load->library('file');
    }
}
?>