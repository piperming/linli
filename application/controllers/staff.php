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
     * 更新员工数据
     */
    function save_staff(){
        if(!$this->input->is_ajax_request()){
            return;
        }
        $this->load->model('Staff_model' , 'staff');
        $id = $data['email'] = $data['education'] = $data['phone'] = $data['tel'] = '';
        $id = $this->input->post('id');
        $data['email'] = $this->input->post('email');
        $data['education'] = $this->input->post('education');
        $data['phone'] = $this->input->post('phone');
        $data['tel'] = $this->input->post('tel');
        if(intval($id)==0||empty($data['email'])||empty($data['education'])||empty($data['phone'])||empty($data['tel'])){
            echo json_encode(array('status'=>0 , 'msg'=>'参数错误'));
            return;
        }
        if($this->staff->update_staff($id , $data)){
            echo json_encode(array('status'=>1));
            return;
        }else{
            echo json_encode(array('status'=>0 , 'msg'=>'更新失败'));
            return;
        }
    }

    /**
     * 删除成员记录
     */
    function del_staff($staff_id = ''){
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

    function add_staff(){
        $data['tpl'] = 'staff/add_staff';
        $this->_display('main' , $data);
    }
}
