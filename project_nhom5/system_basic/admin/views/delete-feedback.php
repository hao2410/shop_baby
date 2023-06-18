<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `feedback` WHERE `id` = '$id'";
    $res = $conn->query($sql);
        if ($res) {
            header("location:?view=list-feedback");
        } else {
            echo "Lỗi khi xóa!";
        }
    }
?>