<?php
class Staff extends MY_Controller{
    function index(){
        $this->load->model('Staff_model' , 'staff');
        $data['staffs'] = $this->staff->staff_list();
        $data['tpl'] = 'staff/staff_list';
        $this->_display('main' , $data);
    }
}
