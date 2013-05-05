<?php
class Task extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Task_model' , 'task');
    }
    /**
     * 工作任务
     */
    public function index(){
        $data['tpl'] = 'task/task_add';
        $this->_display('main' , $data);
    }

    /**
     * 新增工作任务
     */
    public function task_add(){
        $data['staff_name'] = $data['staff_number'] =  $data['plan_no'] = $data['fact_no'] = $data['fail_reason'] = '';
        $data['staff_name'] = $this->input->post('staff_name');
        $data['staff_number'] = $this->input->post('staff_number');
        $data['plan_no'] = $this->input->post('plan_no');
        $data['fact_no'] = $this->input->post('fact_no');
        $data['fail_no'] = $this->input->post('fail_no');
        $data['fail_reason'] = $this->input->post('fail_reason');
        $new_data = array();
        foreach($data as $key=>$val){
            if($val==''){
                echo json_encode(array('status'=>0 , 'msg'=>'数据不能为空!'));
                exit;
            }
            $new_data[$key] = strip_tags($val);
        }
        $new_data['ctime'] = time();
        if($this->task->insert($new_data)){
            echo json_encode(array('status'=>1));
            exit;
        }
    }

    /**
     * 每日工作指标统计
     */
    public function task_day(){
        $name = $number = $lt = $rt = '';
        $number = $this->input->get('number');
        $name = $this->input->get('name');
        $lt = $this->input->get('lt');
        $rt = $this->input->get('rt');
        $name = $this->input->get('name');
        $condition = '';
        $number && $condition .= ($condition?' AND ' : '').'staff_number = "'.$number.'"';
        $name && $condition .= ($condition?' AND ' : '').'staff_name like "%'.$name.'%"';
        $lt && $rt && $condition .= ($condition?' AND ' : '').'ctime > '.strtotime($lt).' AND ctime < '.strtotime($rt);
        $data['tasks'] = $this->task->get(array(
            'condition'=>$condition
        ));
        //$data['ltime'] = $lt;
        //$data['rtime'] = $rt;
        $data['title'] = '工作指标报表';
        $data['tpl'] = 'task/task_list';
        $this->_display('main' , $data);
    }
}
