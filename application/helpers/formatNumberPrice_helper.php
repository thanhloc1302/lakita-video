<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function format($n){
    $result = $n;
    if(strlen($result)>=2){
    while($result[0] == '.' && $result[1] != '.'){
        $result= substr($result, 1);
    }
    }
    return $result;
}
