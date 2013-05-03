<?php
class Task_model extends MY_Model{
    function __construct(){
        parent::__construct();
        $this->set_table('task' , 'id');
    }

}
?>
