<?php
class Custom_model extends MY_Model{
    function __construct(){
        parent::__construct();
        $this->set_table('custom' , 'id');
    }
}
