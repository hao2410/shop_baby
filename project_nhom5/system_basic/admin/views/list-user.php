
<?php
require './inc/header.php';
?>
<?php
// var_dump($_SESSION);
$num_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tạiform-search form-inline
$offset = ($current_page - 1) * $num_per_page;
$sql =  "SELECT * FROM users ORDER BY id ASC LIMIT " . $num_per_page . " OFFSET " . $offset;
$res = $conn->query($sql);
$totalRecords = mysqli_query($conn, "SELECT * FROM `users`");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $num_per_page);
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách thành viên</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-checkall">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Quyền</th>
                    <th scope="col">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $res->fetch_array()) {
                    ?>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['role'] == 'admin' ? "admin" : "customer" ?></td>
                            <td>
                                <a onclick="return confirm('bạn muốn xóa người dùng này?');" href="?view=delete-user&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    if ($current_page > 3) {
                        $first_page = 1;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-user&per_page=<?= $num_per_page ?>&page=<?= $first_page ?>">First</a></li>
                    <?php
                    }
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                    ?>
                        <li  class="page-item"><a class="page-link" href="?view=list-user&per_page=<?= $num_per_page ?>&page=<?= $prev_page ?>">Prev</a></li>
                    <?php }
                    ?>

                    <?php for ($t = 1; $t <=  $totalPages; $t++) { ?>
                        <li class="page-item">
                            <a class="page-link" href="?view=list-user&per_page=<?= $num_per_page ?>&page=<?= $t ?>"> <?= $t ?> </a>
                        </li>
                    <?php }  ?>
                   
                    <?php
                    if ($current_page < $totalPages - 1) {
                        $next_page = $current_page + 1;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-user&per_page=<?= $num_per_page ?>&page=<?= $next_page ?>">Next</a></li>
                    <?php
                    }
                    if ($current_page < $totalPages - 3) {
                        $end_page = $totalPages;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-user&per_page=<?= $num_per_page ?>&page=<?= $end_page ?>">Last</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

