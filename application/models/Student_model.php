<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_model
 *
 * @author Beto
 */
class Student_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->table = 'student';
    }

//    function load_all($input = array()) {
//        if (!array_key_exists('order', $input)) {
//            $this->db->order_by('id', 'DESC');
//        }
//        //xu ly ca du lieu dau vao
//        $this->get_list_set_input($input);
//
//        //thuc hien truy van du lieu
//        $query = $this->db->get($this->table);
//        //echo $this->db->last_query();
//        return $query->result_array();
//    }

}
