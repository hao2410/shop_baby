<?php
require './inc/header.php';
?>
<?php
$num_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
$offset = ($current_page - 1) * $num_per_page;
$sql =  "SELECT * FROM orders ORDER BY id DESC LIMIT " . $num_per_page . " OFFSET " . $offset;   
$res = $conn->query($sql);
$totalRecords = mysqli_query($conn, "SELECT * FROM `orders`");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $num_per_page);
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày Update</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php 
                    $num = 1;       
                        while ($row = $res->fetch_array()) {
                    ?>      
                    <tr>
                        <td><?= $num++ ?></td>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['fullname'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td><?= $row['updated_at'] ?></td>
                        <td>
                            <a href="?view=list_order_detail&id=<?= $row['id'] ?>" >Chi tiết</a>
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
                        <li class="page-item"><a class="page-link" href="?view=list-order&per_page=<?= $num_per_page ?>&page=<?= $first_page ?>">First</a></li>
                    <?php
                    }
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                    ?>
                        <li  class="page-item"><a class="page-link" href="?view=list-order&per_page=<?= $num_per_page ?>&page=<?= $prev_page ?>">Prev</a></li>
                    <?php }
                    ?>

                    <?php for ($t = 1; $t <=  $totalPages; $t++) { ?>
                        <li class="page-item">
                            <a class="page-link" href="?view=list-order&per_page=<?= $num_per_page ?>&page=<?= $t ?>"> <?= $t ?> </a>
                        </li>
                    <?php }  ?>
                   
                    <?php
                    if ($current_page < $totalPages - 1) {
                        $next_page = $current_page + 1;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-order&per_page=<?= $num_per_page ?>&page=<?= $next_page ?>">Next</a></li>
                    <?php
                    }
                    if ($current_page < $totalPages - 3) {
                        $end_page = $totalPages;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-order&per_page=<?= $num_per_page ?>&page=<?= $end_page ?>">Last</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>