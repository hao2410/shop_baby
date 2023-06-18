<?php
    session_start();
    ob_start();
    require_once 'inc/connect_db.php';
?>

<?php
//  đường dẫn file 
    $base_url =" http://localhost/project_nhom5/project_nhom5/system_basic/admin";

    // đường dẫn file đến home
    $page = !empty($_GET['page']) ? $_GET['page'] : "home" ;
    $path = "pages/{$page}.php";
    
    if(file_exists($path)){
        require_once $path;
    }else{
        require_once "pages/404.php";
    }
?>



