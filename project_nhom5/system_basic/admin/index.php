
<?php
    session_start();
    ob_start();
   require '../inc/connect_db.php';
   require 'inc/function.php';
?>

<?php
    $view = isset($_GET['view']) ? $_GET['view'] : 'login';
    $path = "./views/{$view}.php"; 
?>
<!-- sidebar_content -->
<div id="wp-content">
    <?php
    if (file_exists($path)) {
        require "{$path}";
    } else {
        require "./views/404.php";
    }
    ?>
</div>