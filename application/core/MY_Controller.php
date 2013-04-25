<?php
/**
 * @property CI_Loader $load
 * @property CI_User_agent $agent
 * @property CI_Input $input
 * @property CI_Table $table
 * @property CI_Email $email
 * @property CI_Unit_test $unit
 * @property CI_Config $config
 * @property CI_DB_active_record $db
 * @property CI_Form_Validation $form_validation
 * @property CI_URI $uri
 * @property CI_Cache $cache
 * @property CI_Router $router
 * @property CI_Output $output
 * @property CI_Session $session
 * @property CI_Upload $upload
 * @property CI_Pager $pager
 * @property CI_Pager_topic $pager_topic
 *
 * @property Vcode    $vcode
 * @property Staff_model    $staff
 */
class MY_Controller extends CI_Controller{
    protected $tpl_data = array();
    protected $current_user = null;
    protected $force_json = FALSE;
    protected $membership = array();
    protected $group_info = array();
    protected $uid = 0;

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     * 给模板赋值
     * @param $key
     * @param null $value
     * @return MY_Controller
     */
    protected function _assign($key, $value = NULL){
        if(is_array($key)){
            foreach($key as $k => $v){
                $this->tpl_data[$k] = $v;
            }
        }else{
            $this->tpl_data[$key] = $value;
        }
        return $this;
    }

    /**
     * 引用模板
     * @param $page
     * @param array $data
     */
    protected function _display($page, $data = array()){
        $data = array_merge($this->tpl_data, $data);
        $this->load->view($page, $data);
    }

    protected function _check_login(){
        $this->load->model('Admin_model', 'admin');
        if(($this->current_user = $this->user->isLogin())){
            $this->session->set_userdata('logout_url', 'http://www.fumubang.com/group/');
            return TRUE;
        }
    }
}
?>
