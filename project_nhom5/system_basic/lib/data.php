<?php

function  show_array($item){
    if(is_array($item)){
        echo "<pre>";
        print_r($item);
        echo "</pre>";
    }
}

function sanitize($args){
    $args = trim($args);
    $args = stripslashes($args);
    $args = htmlspecialchars($args);
    return $args;
}
