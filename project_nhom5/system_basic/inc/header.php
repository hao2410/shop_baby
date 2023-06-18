<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GenGar</title>
  <link rel="stylesheet" href="./public/css/vendor.css">
  <link rel="stylesheet" href="./public/css/Theme.css">
  <link rel="stylesheet" href="./public/css/style.css">
  <link rel="stylesheet" href="./public/css/become.css">
  <link rel="stylesheet" href="./public/css/product-fashion.css">
  <link rel="stylesheet" href="./public/css/responsive.css">
  <link rel="stylesheet" href="./public/css/plugins.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="admin/js/jquery-2.2.4.min.js"></script>
  <style scoped>
    .categories-list {
      display: none;
    }

    p {
      margin-bottom: 0;
    }

    .categories-list {
      display: none;
    }

    p {
      margin-bottom: 0;
    }

    .toy {
      display: flex;
    }

    .bao-toy {
      display: flex;
    }

    .hand-tool {
      display: flex;
    }

    .bao-row {
      width: 100%;
    }

    .bgg-img {
      background-image: url("./public/img/slider/home5-slide1.jpg");
    }

    .img-big {
      height: 100%;
    }

    .hero-slider-item.stlder-style_2 {
      height: 612px;
    }

    .new-product {
      display: flex;
    }

    .send-messanger {
      color: #fff;
      background-color: #f1ac2b;
      border-color: #f1ac2b;
      padding: 15px;
    }
  </style>
</head>

<body>
  <div>
    <header class="header-area">
      <!-- main header start -->
      <div class="main-header d-none d-lg-block">
        <!-- header top start -->
        <div class="header-top theme-color-5">
          <div class="container bdr-bottom-5">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="header-top-settings">
                  <ul class="nav align-items-center">
                    <li class="language">
                      <span>Language:</span>
                      English
                      <i class="fa fa-angle-down"></i>
                      <ul class="dropdown-list">
                        <li><a href="#"><img src="./public/img/icon/en.png" alt=""> English</a></li>
                        <li><a href="#"><img src="./public/img/icon/fr.png" alt=""> French</a></li>
                      </ul>
                    </li>
                    <li class="curreny-wrap">
                      <span>Currency:</span>
                      $ USD
                      <i class="fa fa-angle-down"></i>
                      <ul class="dropdown-list curreny-list">
                        <li><a href="#">$ usd</a></li>
                        <li><a href="#"> € EURO</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="header-links">
                  <ul class="nav justify-content-end">
                    <?php
                    if (isset($_SESSION['user_login'])) {
                    ?>
                      <li>Welcome <?= $_SESSION['user_login'] ?> To Gengar</li>
                    <?php
                    } else {
                    ?>
                      <li><a href="?page=login">Sign In</a></li>
                    <?php
                    }
                    ?>
                    <!-- <li><a href="?page=register">Create an Account</a></li> -->
                    <?php
                    if (isset($_SESSION['user_login'])) {
                    ?>
                      <li><a href="?page=logout">Log Out</a></li>
                    <?php
                    } else {
                    ?>
                      <li><a href="?page=register">Create an Account</a></li>
                    <?php
                    }
                    ?>
                    <!-- <li><a href="?page=logout">Log Out</a></li> -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- header top end -->

        <!-- header middle area start -->
        <div class="header-middle-area theme-color-5">
          <div class="container">
            <div class="row align-items-center">
              <!-- start logo area -->
              <div class="col-lg-3">
                <div class="logo">
                  <a href="?page=home">
                    <img src="./public/img/logo/logo.png" alt="">
                  </a>
                </div>
              </div>

              <div class="col-lg-5">
                <div class="search-box-wrapper">
                  <form class="search-box-inner" method="GET" >
                    <input type="text" class="search-field" placeholder="Enter your search key" name="search_key">
                    <a  class="search-btn">
                      <i class="fa-solid fa-magnifying-glass" type="submit" style="font-size: 20px;"></i>
                    </a>
                  </form>
                </div>
              </div>
              <!-- mini cart area start -->
              <div class="col-lg-4">
                <div class="header-configure-wrapper">
                  <div class="header-configure-area">
                    <ul class="nav justify-content-end">

                      <li class="mini-cart-wrap">
                        <a href="?page=cart">
                          <i class="fa-solid fa-bag-shopping"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- mini cart area end -->
            </div>
          </div>
        </div>
        <!-- header middle area end -->

        <!-- main menu area start -->
        <div class="main-menu-area bg-white">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3">
                <div class="category-toggle-wrap">
                  <div class="category-toggle">
                    <i class="fa-solid fa-bars" style="font-size: 21px;"></i>
                    Shop By Categories
                  </div>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="main-menu home-main">
                  <!-- main menu navbar start -->
                  <nav class="desktop-menu">
                    <ul>
                      <li class="active"><a href="?page=home">Home</a>
                      </li>
                      <li><a href="?page=about_us">About us</a>
                      </li>
                      <li><a href="?page=stores">Stores</a></li>
                      <li><a href="#">Product <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown">
                          <li><a href="?page=baby_care">Baby Care</a></li>
                          <li><a href="?page=fashion">Fashion</a></li>
                          <li><a href="?page=toys">Toys</a></li>
                          <li><a href="?page=wellness_hygience">wellness and hygience</a></li>
                        </ul>
                      </li>
                      <li><a href="?page=news">News</a></li>
                      <li><a>Resources<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown">
                          <li><a href="?page=contact">Contact us</a></li>
                          <li><a href="?page=q_a">Q&As</a></li>
                        </ul>
                      </li>
                    </ul>
                  </nav>
                  <!-- main menu navbar end -->
                </div>
              </div>
              <div class="col-lg-2">
                <div class="header-support2">
                  <p><i class="fa-solid fa-phone" style="color:#b0b04c;"></i> +880123456789</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main menu area end -->
      </div>
      <!-- main header start -->

      <!-- mobile header start -->
      <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="mobile-main-header">
                <div class="mobile-logo">
                  <a href="/home">
                    <img src="./public/img/logo/logo-black.png" alt="Brand Logo">
                  </a>
                </div>
                <div class="mobile-menu-toggler">
                  <div class="mini-cart-wrap">
                    <a>
                      <i class="ion-bag"></i>
                    </a>
                  </div>
                  <div class="mobile-menu-btn">
                    <div class="off-canvas-btn">
                      <i class="ion-android-menu"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="category-toggle-wrap">
                <div class="category-toggle">
                  <i class="ion-android-menu"></i>
                  all categories
                  <span><i class="ion-android-arrow-dropdown"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- mobile header top start -->
      </div>
      <!-- mobile header end -->
    </header>
  </div>
</body>

</html>

<script>
  document.querySelector('.search-btn').addEventListener('click', function() {
    var searchKey = document.querySelector('.search-field').value;
    window.location.href = '?page=search&search_key=' + encodeURIComponent(searchKey);
  });
</script>