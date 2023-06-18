<?php

require 'inc/header.php';
?>

<?php
$sql = "SELECT * FROM `products`";
$res = $conn->query($sql);
$row = $res->fetch_array();

?>
<?php
  if (!isset($_SESSION['user_login'])) {
    echo '<script>alert("Bạn phải đăng nhập để đặt hàng");window.location.href="?page=home";</script>';
    exit();
  }

  if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
  }

  if (isset($_GET['action']) && $_GET['action'] == 'add') {
    foreach ($_POST['quantity'] as $id => $quantity) {
      if ($quantity > 0) {
        if (isset($_SESSION["cart"][$id])) {
          $_SESSION["cart"][$id] += $quantity;
        } else {
          $_SESSION["cart"][$id] = $quantity;
        }
      }
    }
    header("location:?page=cart");
  }

  if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
    $res = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
  } else {
    header("location:?page=home");  
  }
?>

<div class="cart-main-wrapper pt-50 pb-50">
  <div class="container">
    <div class="section-bg-color">
      <div class="row">
        <div class="col-lg-12">
          <div class="cart-table table-responsive">
            <form action="" method="POST">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-number">STT</th>
                    <th class="pro-thumbnail">Thumbnail</th>
                    <th class="pro-title">Product</th>
                    <th class="pro-price">Price</th>
                    <th class="pro-quantity">Quantity</th>
                    <th class="pro-subtotal">Total</th>
                    <th class="pro-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                  $total_price = 0;
                  while ($row = mysqli_fetch_array($res)) {
                    $product_price = $row['price'];
                    $quantity = $_SESSION["cart"][$row['id']];
                    $sub_total = $product_price * $quantity;
                    $total_price += $sub_total;
                  ?>
                    <tr>
                      <td class="product-number"><?= $num++ ?></td>
                      <td class="pro-thumbnail">
                        <img class="img-fluid" src="<?= $base_url . $row['thumbnail']; ?>" alt="<?= $row['name_product'] ?>" ">
                    </td>
                    <td class=" pro-title"><?= $row['name_product'] ?>
                      </td>
                      <td class="pro-price"><?= $row['price'] ?> VND</td>
                      <td class="pro-quantity">
                          <a href="?page=addcart&tru=<?php  echo $row['id']; ?>"><i class="fa-solid fa-minus"></i></a>
                        <input  style="width:50px" type="number" value="<?= $item = isset($_SESSION["cart"][$row['id']]) ? $_SESSION["cart"][$row['id']] : false ?>" name="quantity[<?= $row['id'] ?>]">
                          <a href="?page=addcart&cong=<?php echo $row['id']; ?>"><i class="fa-solid fa-plus"></i></a>
                      </td>
                      <td class="pro-subtotal"> <?= number_format($sub_total, 0, ",", ".") ?> VND</td>
                      <td class="pro-remove"><a href="?page=delete_cart&id=<?= $row['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5" class="text-right"><strong>Tổng giá:</strong></td>
                    <td colspan="2" class="text-left"><strong><?= number_format($total_price, 0, ",", ".") ?> VND</strong></td>
                  </tr>
                </tfoot>
              </table>
 
<div class="form_order">
  
  <ul>
    <li class="li">
      <p class="form-p">To order, please add a delivery address</p>
    </li>
    <li class="li">
      <div class="form-inf">
        <div>
          <input  class="name input" type="text" value="" name="name" placeholder="Receiver:"/>
        </div>
        <div>
          <input  class="name phone input" type="text" value="" name="phone" placeholder="Phone:"/>
        </div>
      </div>
    </li>
    <li class="li">
      <div>
        <input class="address input" type="text" value="" name="address" placeholder="Address:"/>
      </div>
    </li>
    <li class="li">
      <div>
        <textarea class="textarea" rows="4" name="note" placeholder="Note: "></textarea>                    
      </div>
    </li>
    <li class="li">
      <input class="form-inp input" type="submit" name="order_click" value="Order" />
    </li>
  </ul>
</div>            
</form>
</div>
</div>
</div>
</div>
</div>
</div>

            <?php

          if (isset($_POST['order_click'])) {
              $name = $_POST['name'];
              $phone = $_POST['phone'];
              $address = $_POST['address'];
              $note = $_POST['note'];
              if (empty($_POST['name'])) {
                $error = "Bạn chưa nhập tên của người nhận";
              } elseif (empty($_POST['phone'])) {
                $error = "Bạn chưa nhập số điện thoại người nhận";
              } elseif (empty($_POST['address'])) {
                $error = "Bạn chưa nhập địa chỉ người nhận";
              } elseif (empty($_POST['quantity'])) {
                $error = "Giỏ hàng rỗng";
              }
                if (!empty($_POST['quantity'])) {
                  $res = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                  $total = 0;
                  $orderProducts = array();
                  while ($row = mysqli_fetch_array($res)) {
                      $orderProducts[] = $row;
                      $total += $row['price'] * $_POST['quantity'][$row['id']]; 
                      
                  }
                  
                  $insert_Order = mysqli_query($conn, "INSERT INTO `orders` (`id`, `fullname`, `note`, `phone`, `address`, `total`, `created_at`, `updated_at`) VALUES (null,'$name', '$note', '$phone', '$address', '$total','" . time() . "','" . time() . "')");
              
                  if ($insert_Order) { 
                      $orderID = mysqli_insert_id($conn);
                      $values = array();
                      foreach ($orderProducts as $item) {
                          $product_id = $item['id'];
                          $quantity = $_POST['quantity'][$item['id']];
                          $price = $item['price'];
                          $created_date = time();
                          $last_updated = time();
                          $values[] = "('$orderID', '$product_id', '$quantity', '$price', '$created_date', '$last_updated')";
                      }
                      $values = implode(",", $values);
                      $insertOrder_Detail = mysqli_query($conn, "INSERT INTO `order_detail` (`order_id`, `product_id`,`quantity`, `price`, `created_date`, `last_updated`) VALUES $values");
                      if ($insertOrder_Detail) {
                          unset($_SESSION['cart']);
                          header("location:?page=home");
                      } else {
                          $error = "Lỗi trong quá trình xử lý đơn hàng.";
                      }
                  } else {
                    $error = "Lỗi trong quá trình xử lý đơn hàng.";
                  }
                }
            
        }
            ?>

            <?php
            require 'inc/footer.php';
            ob_end_flush();
            ?>



        <style>
  .form_order{
    margin: 10px 0px 10px 0px;
    border: 1px ridge rgb(0,0,0,0.5);
    border-radius: 5px;
    width: 600px;
  }

  .form-p{
    margin-top: 20px;
    /* text-align: center; */
  }
  .form-inf{
    display: grid;
    grid-template-columns: 1fr 2fr;
    /* text-align: center; */
  }

  .input, .textarea{
    border-radius: 5px;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid rgba(0,0,0,.14);
  }

  .li{
    margin-left: 30px;
  }
  .form-inp{
    margin: 0px 0px 10px 0px;
  }
  .address{
    padding-right: 295px;
  }
  .name{
    padding-right: 50px;
  }
  .phone{
    margin-left: 12px;
  }
  .textarea{
    padding-right: 310px;
  }
</style>

