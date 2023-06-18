
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT `role` FROM `users` WHERE `id` = '$id'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $role = $row['role'];
        if ($role == 'admin') {
            echo "Bạn không có quyền xóa người dùng này!";  
            header("location:?view=list-user");
        } else {
            $sql = "DELETE FROM `users` WHERE `id` = '$id'";
            $res = $conn->query($sql);
            if ($res) {
                header("location: ?view=list-user");
            } else {
                echo "Lỗi khi xóa!";
            }
        }
    } else {
        echo "Người dùng không tồn tại!";
    }
}
?>