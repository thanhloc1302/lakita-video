<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ACETIENDUNG
 * Date: 7/18/13
 * Time: 9:09 AM
 * To change this template use File | Settings | File Templates.
 */
class Search_mod extends CI_Model
{
	function __construct()
	{  
      parent::__construct();  
    } 

    function count_admin($key_word, $status)
    {
        $this->db->from('admin');
        
        if($key_word != 'empty')
        {
        	$key_word = str_replace('-', ' ', $key_word);
           
            $this->db->where("(`admin_name` LIKE '%$key_word%' OR `admin_id` LIKE '%$key_word%' OR `admin_fullname` LIKE '%$key_word%' OR `admin_email` LIKE '%$key_word%') ");
        }

        if($status != '' && $status != 2)
        {
            $this->db->where('admin_status', $status);
        }
        
        $this->db->where('admin_id !=', 35);

        return $this->db->count_all_results();
    }

    function load_admin($key_word, $status, $limit, $offset)
    {
        if($key_word != 'empty')
        {
        	$key_word = str_replace('-', ' ', $key_word);
           
            $this->db->where("(`admin_name` LIKE '%$key_word%' OR `admin_id` LIKE '%$key_word%' OR `admin_fullname` LIKE '%$key_word%' OR `admin_email` LIKE '%$key_word%') ");
        }

        if($status != '' && $status != 2)
        {
            $this->db->where('admin_status', $status);
        }

        $this->db->where('admin_id !=', 35);
      
        $this->db->order_by('admin_id','DESC');

        $this->db->limit($limit, $offset);

        return $this->db->get('admin')->result_array();
    }

    
    function student_count_learn($user_id, $learn_id)
    {
        $this->db->from('student_learn');
        $this->db->where('student_id', $user_id);

        if($courses_id != 0)
        {
            $this->db->where('course_id', $courses_id);
        }

        return $this->db->count_all_results();
    }
    
    
    function student_load_learn($user_id,  $learns_id, $limit, $offset)
    {
        $this->db->where('student_id', $user_id);

        if($learn_id != 0)
        {
            $this->db->where('learn_id', $learn_id);
        }
        
        $this->db->order_by('id','DESC');

        $this->db->limit($limit, $offset);

        return $this->db->get('student_learn')->result_array();
    }
    
    
}
