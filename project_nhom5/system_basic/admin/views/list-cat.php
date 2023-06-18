
<?php
require './inc/header.php';
?>
<?php
$num_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
$offset = ($current_page - 1) * $num_per_page;
$sql =  "SELECT brand.*, category.cate_name FROM brand INNER JOIN category  ON brand.category_id  = category.id ORDER BY id ASC LIMIT " . $num_per_page . " OFFSET " . $offset;
$result = $conn->query($sql);
$totalRecords = mysqli_query($conn, "SELECT * FROM `brand`");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $num_per_page);
?>
<?php
$errors = [];
    if (isset($_POST['addnew'])) {
        $name_brand=$_POST['name_brand'];
        $cate=$_POST['cate'];

        if (empty($_POST['name_brand'])) {
            $errors[] = "tên danh mục không để trống";
        }

        if(!isset($_POST['cate'])){
            echo "Hãy chọn cate";
        }else{
            $cate=$_POST['cate'];
        }
        $sql = "INSERT INTO `brand` (`id`, `brand_name`,`category_id`) VALUES (NULL, '$name_brand','$cate')";
        $res = $conn->query($sql);
        if($res){
            echo "thành công insert";
        }else{
            echo $errors[]= 'lỗi';
        }

    }
?>
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Thêm danh mục sản phẩm
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="name_brand" id="name">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục cha</label>
                            <select class="form-control" id="" name="cate">
                                <option>---Chọn danh mục---</option>
                                <?php
                                    $sql = "SELECT * FROM category";
                                    $res = $conn->query($sql);
                                    while ($row = $res->fetch_array()) {
                                ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['cate_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="addnew" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh sách
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">Danh mục cha</th>
                                <th scope="col">Danh mục con</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php        
                            while ($row = $result->fetch_array()) {
                        ?>
                            <tr>
                                <td scope="row"><?= $row['id'] ?></td>
                                <td scope="row"><?= $row['cate_name'] ?></td>
                                <td scope="row"><?= $row['brand_name'] ?></td>
                                <td scope="row"><a onclick="return confirm('bạn muốn xóa danh mục này?');" href="?view=delete_cat&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a></td>
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
                                <li class="page-item"><a class="page-link" href="?view=list-cat&per_page=<?= $num_per_page ?>&page=<?= $first_page ?>">First</a></li>
                            <?php
                            }
                            if ($current_page > 1) {
                                $prev_page = $current_page - 1;
                            ?>
                                <li  class="page-item"><a class="page-link" href="?view=list-cat&per_page=<?= $num_per_page ?>&page=<?= $prev_page ?>">Prev</a></li>
                            <?php }
                            ?>

                            <?php for ($t = 1; $t <=  $totalPages; $t++) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?view=list-cat&per_page=<?= $num_per_page ?>&page=<?= $t ?>"> <?= $t ?> </a>
                                </li>
                            <?php }  ?>
                        
                            <?php
                            if ($current_page < $totalPages - 1) {
                                $next_page = $current_page + 1;
                            ?>
                                <li class="page-item"><a class="page-link" href="?view=list-cat&per_page=<?= $num_per_page ?>&page=<?= $next_page ?>">Next</a></li>
                            <?php
                            }
                            if ($current_page < $totalPages - 3) {
                                $end_page = $totalPages;
                            ?>
                                <li class="page-item"><a class="page-link" href="?view=list-cat&per_page=<?= $num_per_page ?>&page=<?= $end_page ?>">Last</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
       
        </div>
    </div>
</div>
