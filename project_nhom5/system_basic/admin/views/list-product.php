
<?php
require './inc/header.php';
?>
<?php
$num_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; 
$offset = ($current_page - 1) * $num_per_page;
$sql =  "SELECT products.*, brand.brand_name FROM products INNER JOIN brand ON products.brand_id = brand.id ORDER BY id ASC LIMIT " . $num_per_page . " OFFSET " . $offset;
$res = $conn->query($sql);
$totalRecords = mysqli_query($conn, "SELECT * FROM `products`");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $num_per_page);
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày update</th>
                        <!-- <th scope="col">Trạng thái</th> -->
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php        

                        while ($row = $res->fetch_array()) {

                    ?>
                        <tr class="">
                            <td scope="row"><?= $row['id'] ?></td>
                            <td scope="row"><img src="<?= $row['thumbnail']; ?>" alt="<?= $row['name_product'] ?>" style="width:100px;height:100px" ></td>
                            <td><?= $row['name_product'] ?></td> 
                            <td><?= $row['price'] ?></td> 
                            <td><?= $row['brand_name'] ?></td> 
                            <td><?= $row['created_at'] ?></td> 
                            <td><?= $row['updated_at'] ?></td> 
                            <td>
                                <a href="?view=edit-product&id=<?= $row['id'] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                <a onclick=" return Conf('<?= $row['name_product'] ?>')" href="?view=delete-product&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
                        <li class="page-item"><a class="page-link" href="?view=list-product&per_page=<?= $num_per_page ?>&page=<?= $first_page ?>">First</a></li>
                    <?php
                    }
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                    ?>
                        <li  class="page-item"><a class="page-link" href="?view=list-product&per_page=<?= $num_per_page ?>&page=<?= $prev_page ?>">Prev</a></li>
                    <?php }
                    ?>

                    <?php for ($t = 1; $t <=  $totalPages; $t++) { ?>
                        <li class="page-item">
                            <a class="page-link" href="?view=list-product&per_page=<?= $num_per_page ?>&page=<?= $t ?>"> <?= $t ?> </a>
                        </li>
                    <?php }  ?>
                   
                    <?php
                    if ($current_page < $totalPages - 1) {
                        $next_page = $current_page + 1;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-product&per_page=<?= $num_per_page ?>&page=<?= $next_page ?>">Next</a></li>
                    <?php
                    }
                    if ($current_page < $totalPages - 3) {
                        $end_page = $totalPages;
                    ?>
                        <li class="page-item"><a class="page-link" href="?view=list-product&per_page=<?= $num_per_page ?>&page=<?= $end_page ?>">Last</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script>
    function Conf(name){
        return confirm("Bạn có chắc muốn xóa sản phẩm " + name + "?");
    }
</script>