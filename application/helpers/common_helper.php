<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function print_arr($myArr) {
    echo '<pre>';
    print_r($myArr);
    die;
}

function getUserPictureSrc($student) {
    $pictureSrc = '';
    if (!empty($student[0]['thumbnail'])) {
        $pictureSrc = 'https://lakita.vn/' . $student[0]['thumbnail'];
    } else {
        if (!empty($student[0]['id_fb'])) {
            $pictureSrc = 'https://graph.facebook.com/' . $student[0]['id_fb'] . '/picture?type=large';
        } else {
            $pictureSrc = base_url() . 'styles/images/people/110/user.png';
        }
    }
    return $pictureSrc;
}