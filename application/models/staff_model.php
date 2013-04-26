<?php
/**
 *
 * 作者 PM
 * 时间 13-4-22  上午12:17
 * 邮箱 topmpen@gmail.com
 * 个人主页 pengming.net
 */
class Staff_model extends MY_Model{
    function __construct(){
        parent::__construct();
        $this->set_table('staff' , 'id');
    }

    /**
     * 获取员工列表
     * @param $page 页数
     * @param $page_size 每页显示数目
     * @return mixed
     */
    function staff_list($page=1 , $page_size=1000){
        $options = array(
            'page'=>$page,
            'page_size'=>$page_size
        );
        return $this->get($options);
    }

    /**
     * 更具ID删除员工记录
     * @param $id
     * @return bool
     */
    function del_staff_buy_id($id){
        if(empty($id) || intval($id)==0){
            return false;
        }
        return $this->delete($id);
    }

    /**
     * 更新员工信息记录
     * @param $id
     * @param $data
     * @return bool
     */
    function update_staff($id , $data){
        if(!is_array($data) || intval($id)==0){
            return false;
        }
        return $this->update($data , $id);
    }
}