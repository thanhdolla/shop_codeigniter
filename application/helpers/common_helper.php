<?php
function public_url($url ='') {
    return base_url('public/' .$url);
}

function pre($list,$exit = true){//indu lieu
    echo '<pre>';
    print_r($list);
    if($exit){
        die();
    }
}