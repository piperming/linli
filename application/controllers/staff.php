<?php
class Staff extends MY_Controller{
    /**
     * 成员列表
     */
    function index(){
        $this->load->model('Staff_model' , 'staff');
        $data['staffs'] = $this->staff->staff_list();
        $data['tpl'] = 'staff/staff_list';
        $this->_display('main' , $data);
    }

    /**
     * 删除成员记录
     */
    function delelte($staff_id = ''){
        $staff_id = intval($staff_id)!=0 ? $staff_id:false;
        if(!$staff_id){
            echo '{"status":0}';
        }
        if($this->staff->del_staff_by_id($staff_id)){
            echo '{"status":1}';
        }else{
            echo '{"status":0}';
        }
    }
}
