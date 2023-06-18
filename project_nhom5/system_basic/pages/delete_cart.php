<?php
$id = $_GET['id'];
if(isset($_SESSION['cart'])){
        if(!empty($id)){
            unset($_SESSION['cart'][$id]);
        }
        header("location:?page=cart");
}
?>