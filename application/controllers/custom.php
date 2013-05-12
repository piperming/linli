<?php
class Custom extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Custom_model' , 'custom');
        $this->_is_login();
    }
    public function index(){
        $name = $number = '';
        $number = $this->input->get('number');
        $name = $this->input->get('name');
        $condition = '';
        $number && $condition .= ($condition?' AND ' : '').'custom_number = "'.$number.'"';
        $name && $condition .= ($condition?' AND ' : '').'custom_name like "%'.$name.'%"';
        $data['customs'] = $this->custom->get(array(
            'condition'=>$condition
        ));
        $data['tpl'] = 'custom/custom_list';
        $this->_display('main' , $data);
    }
    /**
     * 新增客户申请记录
     */
    public function custom_add(){
        $data['tpl'] = 'custom/custom_add';
        $this->_display('main' , $data);
    }

    /**
     * 保存新增客户申请记录
     */
    public function custom_save(){
        $application = array(
            'staff_id'=>'',
            'custom_id'=>''
        );
        $data = array(
            'custom_name'=>'',
            'staff_name'=>'',
            'sex'=>'',
            'brithday'=>'',
            'education'=>'',
            'marital_status'=>'',
            'job'=>'',
            'phone'=>'',
            'credit_card_number'=>'',
            'id_card_number'=>'',
            'address'=>'',
        );
        $application['staff_id'] = $this->input->post('staff_id');
        $data['custom_name'] = $this->input->post('custom_name');
        $data['staff_name'] = $this->input->post('staff_name');
        $data['sex'] = $this->input->post('sex');
        $data['brithday'] = $this->input->post('brithday');
        $data['education'] = $this->input->post('education');
        $data['marital_status'] = $this->input->post('marital_status');
        $data['job'] = $this->input->post('job');
        $data['phone'] = $this->input->post('phone');
        $data['credit_card_number'] = $this->input->post('credit_card_number');
        $data['id_card_number'] = $this->input->post('id_card_number');
        $data['address'] = $this->input->post('address');
        $new_data = array();
        foreach($data as $key=>$val){
            if($val==''){
                echo json_encode(array('status'=>0 , 'msg'=>'数据不能为空!'.$key));
                exit;
            }
            $new_data[$key] = strip_tags($val);
        }
        $new_data['ctime'] = time();
        if($this->custom->insert($new_data)){
            $application['custom_id'] = $this->db->insert_id();
            $this->load->model('Apply_model' , 'apply');
            if($this->apply->insert($application)){
                echo json_encode(array('status'=>1));
                exit;
            }
        }
        echo json_encode(array('status'=>0 , 'msg'=>'新增数据失败!'));
        exit;
    }
}
