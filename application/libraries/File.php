<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File {


        public function __construct()
        {
               $this->file =& get_instance();
        }  

        Public function make_folder($kode_ab,$tahun,$area,$scope)
        {
            $url = 'audit';
            $folder_kode_ab = $url.'/'.$kode_ab;
            $folder_tahun=$folder_kode_ab.'/'.$tahun;
            $folder_area = $folder_tahun.'/'.$area;
            $folder_scope = $folder_area.'/'.$scope;

            //check folder kode ab

            if(file_exists($folder_kode_ab))
            {
               $a = 1;
            }
            else
            {
                mkdir($folder_kode_ab);
                $a = 0;
            }
            
            //checkk folder tahun 

            if(file_exists($folder_tahun))
            {
                $b = 1;
            }
            else
            {
                mkdir($folder_tahun);
                $b = 0;
            }

            //check folder area

            if(file_exists($folder_area))
            {
                $c = 1;
            }
            else
            {
                mkdir($folder_area);
                $c = 0;
            }

            //check folder scope
            if(file_exists($folder_scope))
            {
                $d =1 ;
            }
            else
            {
                mkdir($folder_scope);
                $d =0 ;
            }

            if($a == 0 or $b == 0 or $c == 0 or $d == 0)
            {
                return TRUE ;
            }
            else
            {
                return FALSE ;
            }

        }

        public function delete($kode_ab,$tahun,$area,$scope)
        {
            $url = 'audit';
            $folder_kode_ab = $url.'/'.$kode_ab;
            $folder_tahun=$folder_kode_ab.'/'.$tahun;
            $folder_area = $folder_tahun.'/'.$area;
            $folder_scope = $folder_area.'/'.$scope;

            if(file_exists($folder_scope))
            {
                rmdir($folder_scope);
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }

}