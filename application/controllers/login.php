<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('staff_model' , 'staff');
    }
    /**
     * 后台登陆
     */
    function index(){
        $_SESSION['vcode2'] = 'vocode2';
        $this->load->view('login');
    }

    /**
     * 验证码输出
     * 获取验证码保存到session
     */
    function vcode(){
        $this->load->library('Vcode' , 'vcode');
        $this->vcode->show_img();
        $_SESSION['vcode'] = $this->vcode->get_code();
    }

    /**
     * 登出
     */
    function logout(){
        $this->load->helper('url');
        session_destroy();
        redirect('/');
    }
    /**
     * 检查登陆
     */
    function login_check(){
        $email = $this->input->post('name');
        $passwd = $this->input->post('password');
        $vcode = $this->input->post('vcode');
        if(empty($email) || empty($passwd) || empty($vcode)){
            echo json_encode(array(
                'status'=>0,
                'msg'=>'数据不能为空'
            ));
            exit;
        }
        if($vcode != strtolower(trim($_SESSION['vcode']))){
            echo json_encode(array(
                'status'=>0,
                'msg'=>'验证码不正确'
            ));
            exit;
        }
        if($this->staff->check_login($email , $passwd)){
            echo json_encode(array(
                'status'=>1
            ));
        }else{
            echo json_encode(array(
                'status'=>0,
                'msg'=>'邮箱或密码不正确'
            ));
        }
    }
}

