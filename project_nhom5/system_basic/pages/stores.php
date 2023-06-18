<?php
require 'inc/header.php';
?>
<?php
$num_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 15;
$current_page = !empty($_GET['pag']) ? $_GET['pag'] : 1;
$offset = ($current_page - 1) * $num_per_page;
$sql =  "SELECT * FROM products ORDER BY id ASC LIMIT " . $num_per_page . " OFFSET " . $offset;
$res = $conn->query($sql);
$totalRecords = mysqli_query($conn, "SELECT * FROM `products`");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $num_per_page);
// while ($row = $res->fetch_array()) {
//   // $num++;
//   print_r($row['thumbnail']);
// }
// exit();
?>
<div class="shop-main-wrapper pt-50 pb-50">
  <div class="container">
    <div class="row">
      <!-- sidebar area start -->
      <div class="col-lg-3 order-2 order-lg-1">
        <aside class="sidebar-wrapper">
          <!-- single sidebar start -->
          <div class="sidebar-single">
            <div class="sidebar-title">
              <h3>Categories</h3>
            </div>
            <div class="sidebar-body">
              <!-- mobile menu navigation start -->
              <div class="shop-categories">
                <nav>
                  <ul class="mobile-menu">
                    <li class="menu-item-has-children"><a>Hand tools</a>
                    </li>
                    <li class="menu-item-has-children"><a>Clothess</a>
                    </li>
                    <li class="menu-item-has-children"><a>Milk-food</a>
                    </li>
                    <li class="menu-item-has-children"><a>Houseware</a>
                    </li>
                  </ul>
                </nav>
              </div>
              <!-- mobile menu navigation end -->
            </div>
          </div>
          <!-- single sidebar end -->

          <!-- single sidebar start -->
          <div class="sidebar-single">
            <div class="sidebar-title">
              <h3>Price filter</h3>
            </div>
            <div class="sidebar-body">
              <ul class="radio-container">
                <li>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" name="price" id="customCheck11">
                    <label class="custom-control-label" for="customCheck11">$7.00 - $9.00 (2)</label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" name="price" id="customCheck21">
                    <label class="custom-control-label" for="customCheck21">$10.00 - $12.00 (3)</label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" name="price" id="customCheck31">
                    <label class="custom-control-label" for="customCheck31">$17.00 - $20.00 (3)</label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" name="price" id="customCheck41">
                    <label class="custom-control-label" for="customCheck41"> $21.00 - $22.00 (1)</label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" name="price" id="customCheck51">
                    <label class="custom-control-label" for="customCheck51">$25.00 - $30.00 (3)</label>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- single sidebar end -->
        </aside>
      </div>
      <!-- sidebar area end -->

      <!-- shop main wrapper start -->
      <div class="col-lg-9 order-1 order-lg-2">
        <div class="shop-product-wrapper">
          <!-- shop product top wrap start -->
          <div class="shop-top-bar">
            <div class="row align-items-center">
              <div class="col-lg-7 col-md-6 order-2 order-md-1">
                <div class="top-bar-left">
                  <div class="product-amount">
                    <p>Showing 1–16 of 21 results</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-6 order-1 order-md-2">
                <div class="top-bar-right">
                  <form action="" method="POST">
                    <div class="product-short">
                      <p>Sort By : </p>
                      <select class="nice-select" name="filter" id="filter">
                        <option value="relevance">Relevance</option>
                        <option value="name_asc">Name (A - Z)</option>
                        <option value="name_desc">Name (Z - A)</option>
                        <option value="price_asc">Price (Low &gt; High)</option>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="shop-product-wrap grid-view row">
            <?php
            $num = 0;
            while ($row = $res->fetch_array()) {
              // $path = $row['thumbnail'];
              // $path_f = ltrim($path, '.');
              $num++;
              // echo $path_f;
            ?>
              <div class="col-md-4 col-sm-6">
                <!-- product grid start -->
                <div class="product-item">
                  <div class="product-thumb">
                    <a href="?page=product_details&id=<?= $row['id'] ?>">
                      <img src="<?= $base_url .$row['thumbnail']; ?>" alt="<?= $row['name_product'] ?>" ">
                    </a>
                  </div>
                  <div class=" product-content">
                      <h5 class="product-name"><a href="?page=product_details&id=<?= $row['id'] ?>"><?= $row['name_product'] ?></a></h5>
                      <div class="price-box">
                        <span class="price-regular"><?= $row['price'] ?></span>
                      </div>
                  </div>

                </div>

              </div>
            <?php } ?>
          </div>

          <div class="paginatoin-area text-center">
            <ul class="pagination-box">
              <?php
              if ($current_page > 3) {
                $first_page = 1;
              ?>
                <li class="active"><a href="?page=stores&per_page=<?= $num_per_page ?>&pag=<?= $first_page ?>">First</a></li>
              <?php
              }
              if ($current_page > 1) {
                $prev_page = $current_page - 1;
              ?>
                <li><a href="?page=stores&per_page=<?= $num_per_page ?>&pag=<?= $prev_page ?>">Prev</i></a></li>
              <?php }
              ?>

              <?php for ($t = 1; $t <=  $totalPages; $t++) { ?>
                <li>
                  <a href="?page=stores&per_page=<?= $num_per_page ?>&pag=<?= $t ?>"> <?= $t ?> </a>
                </li>
              <?php }  ?>

              <?php
              if ($current_page < $totalPages - 1) {
                $next_page = $current_page + 1;
              ?>
                <li><a class="next" href="?page=stores&per_page=<?= $num_per_page ?>&pag=<?= $next_page ?>">Next</i></a></li>
              <?php
              }
              if ($current_page < $totalPages - 3) {
                $end_page = $totalPages;
              ?>
                <li><a href="?page=stores&per_page=<?= $num_per_page ?>&pag=<?= $end_page ?>">Last</a></li>
              <?php
              }
              ?>
              <!-- <li><a class="previous" href="#"><i class="ion-ios-arrow-left"></i>Prev</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a class="next" href="#">Next<i class="ion-ios-arrow-right"></i></a></li> -->
            </ul>
          </div>
          <!-- end pagination area -->
        </div>
      </div>
    </div>
  </div>
</div>


<style scoped>
  .product-short p {
    margin-bottom: 0;
  }

  .product-amount p {
    margin-bottom: 0;
  }

  .menu-item-has-children:hover {
    cursor: pointer;
  }

  .pagination-box {
    display: flex;
    justify-content: center;
    gap: 10px;
  }
</style>
<?php
require 'inc/footer.php';
?>