<?php

class Courses_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->table = 'courses';
    }

    function find_course_id($course_code) {
        $courseId = 10;
        if (is_array($course_code)) {
            $courseId = [];
            foreach ($course_code as $course) {
                $input2 = array();
                $input2['where'] = array('course_code' => $course);
                $courses = $this->load_all($input2);
                if (!empty($courses)) {
                    $courseId[] = $courses[0]['id'];
                }
            }
        } else {
            if ($course_code == 'CBKT210') {
                $courseId = [78, 37, 65];
            }
            if ($course_code == 'CBKT400') {
                $courseId = [73, 37, 65];
            }
            if ($course_code == 'CBKT800') {
                $courseId = [77, 37, 65];
            }
            if ($course_code == 'CBKT110') {
                $courseId = [82, 37, 65];
            }
            if ($course_code == 'CBKT130') {
                $courseId = [81, 37, 65];
            }
            $input2 = array();
            $input2['where'] = array('course_code' => $course_code);
            $courses = $this->load_all($input2);
            if (!empty($courses)) {
                $courseId = $courses[0]['id'];
            }
        }
        return $courseId;
    }

    function find_course_price($course_code) {
        $input2 = array();
        $input2['where'] = array('course_code' => $course_code);
        $courses = $this->load_all($input2);
        if (!empty($courses)) {
            return str_replace('.', '', $courses[0]['price_root2']);
        }
        return 600000;
    }

    function find_price_course_event($course_code) {
        $input2 = array();
        $input2['where'] = array('course_code' => $course_code);
        $input2['select'] = 'price_sale';
        $courses = $this->load_all($input2);
        if (!empty($courses)) {
            return str_replace('.', '', $courses[0]['price_sale']);
        }
        return 295000;
    }

    function get_all_price_sale() {
        $result = array();
        $input2 = array();
        $input2['select'] = 'course_code, price_sale';
        $input2['where'] = array('status' => 1);
        $courses = $this->load_all($input2);
        foreach ($courses as $value) {
            $result[$value['course_code']] = $value['price_sale'];
        }
        return $result;
    }
    
    public function GetCourseSlug($id){
        
    }
}
