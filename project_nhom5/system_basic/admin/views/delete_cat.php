<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `brand` WHERE `id` = '$id'";
    $res = $conn->query($sql);
        if ($res) {
            header("location:?view=list-cat");
        } else {
            echo "Lỗi khi xóa!";
        }
    }
?>