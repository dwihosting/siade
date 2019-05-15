<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propinsi_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'propinsi',
            'coloum'    => array(
                'kode_propinsi'     => array('label'=>'Kode Propinsi','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'' ),
                'nama_propinsi'     => array('label'=>'Nama Propinsi','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'' )
            ),
            'keyfield'  => 'kode_propinsi',
            'order'     => array(
                array('nama_propinsi', 'asc'),
            )
        );
    }
}