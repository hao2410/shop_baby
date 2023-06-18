<?php
require './inc/header.php';
?>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql =  "SELECT * FROM  orders INNER JOIN order_detail ON  orders.id =order_detail.order_id  INNER JOIN products ON order_detail.product_id = products.id WHERE orders.id = $id  ORDER BY order_detail.id ASC";
$res = $conn->query($sql);
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Chi tiết đơn hàng</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id_sp</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Sản phẩm</th> 
                        <th scope="col">Số lượng</th> 
                        <th scope="col">Giá trị</th> 
                        <th scope="col">Tổng</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày Update</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php        
                        $num = 0;
                        while ($row = $res->fetch_array()) {
                        $num++;
                    ?>      
                    <tr>
                        <td><?= $num ?></td>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['fullname'] ?></td>
                        <td><a href="#"><?= $row['name_product'] ?></a></td>
                        <td><?= $row['quantity'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td><?= $row['quantity'] * $row['price'] ?></td>
                        <td><?= $row['created_date'] ?></td>
                        <td><?= $row['last_updated'] ?></td>
                    </tr>
                    <?php  } ?>
                    
                </tbody>
            </table>
            <?php
                $sql =  "SELECT total FROM  orders WHERE id =$id";
                $res = $conn->query($sql);
                $row = $res->fetch_array();
            ?>
            <div >Tổng: <?= $row['total'] ?> VND</div>   
        </div>
    </div>
</div>