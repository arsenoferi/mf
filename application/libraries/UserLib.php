<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLib {


        public function __construct()
        {
               $this->seno =& get_instance();
        }
       
        public function parameter()
        {
              $data['title']='arpita zhafarina haesah';
        }

        public function template($content,$aku,$modul=NULL,$judul=NULL)
        {
             $data['modul']=$modul;
             $data['judul']=$judul;
             $data['content']=$this->seno->parser->parse($content,$aku,TRUE);
             $data ['menu'] = $this->_akses();
             $this->seno->parser->parse('template/blank',$data,FALSE);
        }

        private function _akses()
        {
            $coba = array(
                'nama'=>'test', 'link'=> base_url(welcome/pita), 'icon'=>''
            );

            return $coba
        }


}