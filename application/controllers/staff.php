<?php
class Staff extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Staff_model' , 'staff');
        $this->_is_login();
    }
    /**
     * 成员列表
     */
    function index(){
        $name = $number = '';
        $number = $this->input->get('number');
        $name = $this->input->get('name');
        $condition = '';
        $number && $condition .= ($condition?' AND ' : '').'staff_number = "'.$number.'"';
        $name && $condition .= ($condition?' AND ' : '').'staff_name like "%'.$name.'%"';
        $data['staffs'] = $this->staff->get(array(
            'condition'=>$condition
        ));
        $data['tpl'] = 'staff/staff_list';
        $this->_display('main' , $data);
    }

    /**
     * 更新员工数据
     */
    function staff_update(){
        if(!$this->input->is_ajax_request()){
            return;
        }
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

    /**
     * 新增员工
     */
    function staff_add(){
        $data['tpl'] = 'staff/staff_add';
        $this->_display('main' , $data);
    }

    /**
     * 添加新员工
     */
    function staff_save(){
        $data['staff_name'] = $data['staff_number'] = $data['passwd'] = $data['sex'] = $data['brithday'] = $data['email'] = $data['education'] = $data['tel'] = $data['phone'] = '';
        $data['staff_name'] = $this->input->post('staff_name');
        $data['staff_number'] = $this->input->post('staff_number');
        $data['sex'] = $this->input->post('sex');
        $data['passwd'] = $this->input->post('passwd');
        $data['brithday'] = $this->input->post('brithday');
        $data['email'] = $this->input->post('email');
        $data['education'] = $this->input->post('education');
        $data['phone'] = $this->input->post('phone');
        $data['tel'] = $this->input->post('tel');
        $new_data = array();
        foreach($data as $key=>$val){
            if($val==''){
                echo json_encode(array('status'=>0 , 'msg'=>'数据不能为空!'));
                exit;
            }
            if($key == 'email'){
                if(!preg_match('/^[a-z][a-z0-9_]*@[a-z0-9]+.[a-z]+(.[a-z]+)*$/i' , $val)){
                    echo json_encode(array('status'=>0 , 'msg'=>'邮箱格式错误!'));
                    exit;
                }
            }
            if($key == 'passwd'){
                $new_data['passwd'] = md5($val);
                continue;
            }
            $new_data[$key] = strip_tags($val);
        }
        $new_data['ctime'] = time();
        if($this->staff->insert($new_data)){
            echo json_encode(array('status'=>1));
            exit;
        }
    }

    function passwd(){

    }

}
