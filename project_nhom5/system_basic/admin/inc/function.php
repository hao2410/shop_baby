<?php
function show_data($item){
    echo '<pre>';
    var_dump($item);
    echo '</pre>';
};

function sanitize($args){
    $args = trim($args);
    $args = stripslashes($args);
    // $args = strip_tags($args);
    $args = htmlspecialchars($args);
    return $args;
}