
<?php
require './inc/header.php';
?>
<?php
$num_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 3;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
$offset = ($current_page - 1) * $num_per_page;
$sql =  "SELECT * FROM `feedback`  ORDER BY id ASC LIMIT " . $num_per_page . " OFFSET " . $offset;
$res = $conn->query($sql);
$totalRecords = mysqli_query($conn, "SELECT * FROM `feedback`");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $num_per_page);
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách phản hồi</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Note</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày sửa</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $res->fetch_array()) {
                    ?>
                        <tr>
                            <td scope="row"><?= $row['fullname'] ?></td>
                            <td scope="row"><?= $row['email'] ?></td>
                            <td scope="row"><?= $row['address'] ?></td>
                            <td scope="row"><?= $row['phone'] ?></td>
                            <td scope="row"><?= $row['note'] ?></td>
                            <td scope="row"><?= $row['created_at'] ?></td>
                            <td scope="row"><?= $row['update_at'] ?></td>
                            <td>
                                <a onclick="return confirm('bạn muốn xóa phản hồi này?');" href="?view=delete-feedback&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    if ($current_page > 3) {
                        $first_page = 1;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-feedback&per_page=<?= $num_per_page ?>&page=<?= $first_page ?>">First</a></li>
                    <?php
                    }
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                    ?>
                        <li  class="page-item"><a class="page-link" href="?view=list-feedback&per_page=<?= $num_per_page ?>&page=<?= $prev_page ?>">Prev</a></li>
                    <?php }
                    ?>

                    <?php for ($t = 1; $t <=  $totalPages; $t++) { ?>
                        <li class="page-item">
                            <a class="page-link" href="?view=list-feedback&per_page=<?= $num_per_page ?>&page=<?= $t ?>"> <?= $t ?> </a>
                        </li>
                    <?php }  ?>
                   
                    <?php
                    if ($current_page < $totalPages - 1) {
                        $next_page = $current_page + 1;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-feedback&per_page=<?= $num_per_page ?>&page=<?= $next_page ?>">Next</a></li>
                    <?php
                    }
                    if ($current_page < $totalPages - 3) {
                        $end_page = $totalPages;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-feedback&per_page=<?= $num_per_page ?>&page=<?= $end_page ?>">Last</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
