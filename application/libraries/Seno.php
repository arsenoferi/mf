<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seno {


        public function __construct()
        {
               $this->seno =& get_instance();
        }
       
        public function parameter()
        {
              $data['title']='arpita zhafarina haesah';
        }

       public function template($content,$aku=NULL,$modul=NULL,$judul=NULL)
       {
            $data['modul']=$modul;
            $data['judul']=$judul;
            $data['content']=$this->seno->parser->parse($content,$aku,TRUE);
            $data ['side_menu'] = $this->_akses();
            $this->seno->parser->parse('template/blank',$data,FALSE);
       }
       
       private function _akses()
       {
            $akses=array
            (
               array ('nama'=>'User Admin', 'link'=> base_url('UserAdmin'), 'icon'=>'glyphicon glyphicon-grain'),
               array ('nama'=>'Anggota Bursa', 'link'=> base_url('AnggotaBursa'), 'icon'=>'glyphicon glyphicon-grain'),
               array ('nama'=>'Project', 'link'=> base_url('Project'), 'icon'=>'glyphicon glyphicon-grain')
            );

            return $akses;
       }

       public function popup($title,$text,$link)
       {
          $data['title']=$title;
          $data['text']=$text;
          $data['link']=$link;
          $this->seno->seno->template('popup/Popup',$data,'Warning','Warning');
       }

       

}