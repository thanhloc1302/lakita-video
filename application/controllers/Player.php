<?php

class Player extends MY_Controller {

    function index() {        
        $input = $this->input->post('video_id');
        if (empty($input)) {
            die;
        }
        $arr_id = explode('#', $input);
        $id = $arr_id[2];
        if (!isset($arr_id[2]) || empty($arr_id[2])) {
            die;
        }
        $this->load->model('learn_model');
        $input = [];
        $input['select'] = 'video_file';
        $input['where'] = ['id' => $id];
        $primary_video = $this->learn_model->load_all($input);
        //$primary_video = $this->lib_mod->detail('learn', array('id' => $id));

        if (empty($primary_video)) {
            die;
        }

        $iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
        $iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
        $iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
        // $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
        if ($iPod || $iPhone || $iPad) {
            echo "http://171.244.19.161:1935/vod/mp4://" . str_replace('data/source/video_source/', '', $primary_video[0]['video_file']) . "/playlist.m3u8";
            die;
        } else {
            echo "http://171.244.19.161:1935/vod/_definst_/mp4:" . str_replace('data/source/video_source/', '', $primary_video[0]['video_file']) . '/manifest.mpd';
            die;
        }
//        else if ($Android) {
//            echo "rtsp://lakita.vn:1935/vod/mp4:" . str_replace('data/source/video_source/', '', $primary_video[0]['video_file']);
//            die;
//        } 
    }

    function next_learn() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id)) {
            echo '0';
            die;
        }
        $id = $this->input->post('curr_learn_id');
        $curr_learn = $this->lib_mod->detail('learn', array('id' => $id));

        $this->load->model('chapter_model');
        $this->load->model('learn_model');

        $input_curr_learn_chapter['select'] = 'id,name,sort,courses_id,chapter_id,slug';
        $input_curr_learn_chapter['where'] = array('chapter_id' => $curr_learn[0]['chapter_id'],
            'courses_id' => $curr_learn[0]['courses_id'], 'status' => 1);
        $input_curr_learn_chapter['order'] = array('sort' => 'asc');
        //danh sách bài học thuộc cùng 1 chương với bài học hiện tại
        $curr_learn_chapter = $this->learn_model->load_all($input_curr_learn_chapter);

        //bài học cuối cùng trong danh sách bài học thuộc cùng chương bài học hiện tại
        $last_learn_curr_chapter = array_pop($curr_learn_chapter);

        if ($id != $last_learn_curr_chapter['id']) {
            $next_learn = $this->learn_model->load_all(array('where' => array('sort' => $curr_learn[0]['sort'] + 1, 'chapter_id' => $curr_learn[0]['chapter_id'], 'courses_id' => $curr_learn[0]['courses_id'])));
            if (count($next_learn)) {
                echo base_url() . $next_learn[0]['slug'] . '-4' . $next_learn[0]['id'] . '.html';
            }
        } else {
            //chương hiện tại
            $curr_chapter = $this->chapter_model->load_all(array('where' => array('id' => $curr_learn[0]['chapter_id']), 'order' => array('sort' => 'asc')));

            //chương tiếp theo
            $next_chapter = $this->chapter_model->load_all(array('where' => array('sort' => $curr_chapter[0]['sort'] + 1, 'courses_id' => $curr_learn[0]['courses_id'])));

            if (count($next_chapter)) {
                //danh sách bài học trong chương tiếp theo của chương hiện tại
                $next_learn_chapter = $this->learn_model->load_all(array('where' => array('chapter_id' => $next_chapter[0]['id'], 'status' => 1), 'order' => array('sort' => 'asc')));

                //bài học đầu tiên của chương tiếp theo khóa học hiện tại
                $first_learn_next_chapter = array_shift($next_learn_chapter);
                echo base_url() . $first_learn_next_chapter['slug'] . '-4' . $first_learn_next_chapter['id'] . '.html';
            }
        }
    }

}
