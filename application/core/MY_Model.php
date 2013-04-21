<?php
/**
 * @property CI_Loader $load
 * @property CI_User_agent $agent
 * @property CI_Input $input
 * @property CI_Table $table
 * @property CI_Email $email
 * @property CI_Config $config
 * @property CI_DB_active_record $db
 * @property CI_Form_Validation $form_validation
 * @property CI_URI $uri
 * @property CI_Cache $cache
 * @property CI_Router $router
 * @property CI_Output $output
 * @property CI_Session $session
 */
class MY_Model extends CI_Model{
    protected $_table_name = '';
    protected $_id = 'id';
    public $error = '';
    protected $_default_get_options = array(
        'page' => 1,
        'page_size' => 1000
    );

    /**
     * 设置表名和主键默认主键是id
     * @param $table_name
     * @param string $id
     */
    public function set_table($table_name, $id = 'id'){
        $this->_table_name = $table_name;
        $this->_id = $id;
    }

    /**
     * 查找一条记录
     * @param $id
     * @param string $select
     * @return mixed
     */
    public function find($id, $select = '*'){
        $this->db->select($select);
        $this->db->where($this->_id, $id);
        return $this->db->get($this->_table_name)->row_array();
    }

    /**
     * 传入主键删除记录
     * @param $id
     * @return bool
     */
    public function delete($id){
        $this->db->where($this->_id, $id);
        return $this->db->delete($this->_table_name)?TRUE:FALSE;
    }

    /**
     * 插入数据
     * @param $new_data
     * @return bool
     */
    public function insert($new_data){
        return $this->db->insert($this->_table_name, $new_data)?TRUE:FALSE;
    }

    /**
     * 更具主键更新数据
     * @param $new_data
     * @param int $id
     * @return bool
     */
    public function update($new_data, $id = 0){
        $this->db->where($this->_id, $id);
        return $this->db->update($this->_table_name,$new_data)?TRUE:FALSE;
    }

    /**
     * 查询数据
     * 查询条件类似于
     * $this->user->get(array(
     *      'select'=>'id, username , email ,ctime',
     *      'page'=>2,
     *      'page_size'=>10,
     *      'condition'=>array(
     *          'orderby'=>'ctime ASC'
     *      )
     * ));
     * @param array $options
     * @return mixed
     */
    public function get($options = array()){
        $options = array_merge($this->_default_get_options, $options);
        $page = $options['page'];
        $page_size = $options['page_size'];
        $this->db->limit($page_size, $page_size * ($page - 1));

        isset($options['distinct'])&& $this->db->distinct();
        isset($options['select']) && $this->db->select($options['select']);
        isset($options['condition']) && $options['condition']!='' && $this->db->where($options['condition']);
        isset($options['orderby']) && $this->db->order_by($options['orderby']);

        return $this->db->get($this->_table_name)->result_array();
    }

    /**
     * 获取查询结果数目
     * @param string $condition
     * @return string
     */
    public function num($condition = ''){
        if($condition){
            $this->db->where($condition);
        }
        $num = $this->db->count_all_results($this->_table_name);
        return $num;
    }

    /**
     * 查询方法
     * 与get不同的是不带limit数据
     * @param $field
     * @param array $options
     * @return array
     */
    public function get_list($field, $options = array()){
        $options['select'] = $this->_id.", $field";
        $items = $this->get($options);
        $return = array();
        foreach($items as $item){
            $return[$item[$this->_id]] = $item[$field];
        }
        return $return;
    }

}