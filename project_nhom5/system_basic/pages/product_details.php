<?php
require 'inc/header.php';
?>
<?php
$sql = "SELECT * FROM `products` WHERE `id` = " . $_GET['id'];
$res = $conn->query($sql);
while ($row = $res->fetch_array()) {
  //      echo "<pre>";
  // var_dump($row);
  // exit();
?>
  <div class="product-details-inner">
    <div class="row">
      <div class="col-lg-5">
        <div class="product-large-slider mb-20">
          <div class="pro-large-img img-zoom">
            <img class="img-big" src="<?= $base_url . $row['thumbnail']; ?>" alt="<?= $row['name_product'] ?>" ">
          </div>
        </div>
      </div>
      <div class=" col-lg-7">
            <div class="product-details-des">
              <h1 class="product-name"><?= $row['name_product'] ?></h1>
              <div class="price-box">
                <span class="price-regular"></span>
                <label>Price: </label><span name="price" id="price" class="product-old"><?= number_format($row['price'], 0, ",", ".") ?> VND</span><br />
              </div>
              <p><?= htmlspecialchars_decode($row['description']) ?></p>
              <div class="quantity-cart-box d-flex align-items-center">
                <form method="POST" action="?page=cart&action=add">
                  <div class="quantity">
                    <div class="pro-qty">
                      <input v-model="totalOrder" type="number" id="quantity" name="quantity[<?= $row['id'] ?>]" value="1" min="1" size="1">
                    </div>
                  </div>
                  <div class="action_link" >
                    <button style="margin-top: 20px"  id="add_product" type="submit" class="btn btn-cart">Add To Cart</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
  </div>
    <?php  } ?>
<?php


 ?>

    <style scoped>
      .img-big {
        padding: 50px;
      }

      .ratings {
        margin-bottom: 20px;
      }

      .pro-large-img img {
        width: 80%;
      }
    </style>
    <?php
    require 'inc/footer.php';
    ?>