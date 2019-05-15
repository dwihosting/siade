<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otoritas_mdl extends Main_mdl {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'    => 'pengguna_otoritas',
            'coloum'    => array(
                'otoritas_id'           => array('label'=>'ID', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),                
                'group_pengguna_id'     => array('label'=>'Group Pengguna', 'visible'=>true, 'format'=>'DROPDOWN_MDL', 'placeholder'=>'', 'option'=>array()),
                'menu_id'               => array('label'=>'Menu', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'')
            ),
        );
    }
    
}