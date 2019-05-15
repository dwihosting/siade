<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'    => 'konfigurasi',
            'coloum'    => array(
                'email_akun'    => array('label'=>'Email Akun','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'' ),
                'password'      => array('label'=>'Password','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'protocol'      => array('label'=>'Protocol','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'port'          => array('label'=>'Port','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                
            ),
        );
    }
    
    
    
}