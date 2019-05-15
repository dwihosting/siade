<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siade_auth {
        protected $CI;
        
        public function __construct() {
            $this->CI =& get_instance();
        }

        public function is_login()
        {
            return false;
        }
        
        
        public function check_login($username, $password)
        {
            $data = array(
                'status'    => 0,
                'message'   => 'Error: tidak bisa login'
            );
            $this->CI->load->model('All_login');
            $result = $this->CI->All_login->check_login($username, $password);
            if ($result){
                $data = array(
                    'status'    => 1,
                    'message'   => 'Berhasil: anda telah login'
                );                
            } else {
                $data = array(
                    'status'    => 0,
                    'message'   => 'Gagal: Akun anda tidak diketemukan'
                );
            }
            return $data;
        }        
}