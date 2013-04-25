<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
    /**
     * 后台登陆
     */
    function index(){
        $this->load->view('login');
    }

    /**
     * 验证码输出
     * 获取验证码保存到session
     */
    function vcode(){
//        session_start();
        $this->load->library('Vcode' , 'vcode');
       // $_SESSION['vcode'] = $this->vcode()->get_code();
        $this->vcode->show_img();
    }
}

