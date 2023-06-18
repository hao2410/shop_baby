
<?php
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] += 1;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
    header('Location:?page=cart');
}
    

if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] -= 1;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
    header('Location:?page=cart');
}

?>