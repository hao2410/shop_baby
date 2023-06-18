<?php
    require 'inc/header.php';
?>

    <div>
        <div class="main-banner-area">
            <div class="container">
                <div class="row custom-row g-0">
                    <div class="col-xl-3"></div>
                    <!-- slider area start -->
                        <div class="col-xl-6 col-lg-8">
                            <section class="slider-area">
                            <div class="hero-slider-active slick-arrow-style slick-dot-style img-big">
                                <!-- single slider item start -->
                                <div class="hero-slider-item stlder-style_2 imgg-big">
                                <div class="d-flex align-items-center bg-img h-100 bgg-img" data-bg="./public/img/slider/home5-slide1.jpg">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="hero-slider-content hero-slider-content_2">
                                        <h2>biggest</h2>
                                        <h1>sale <br>75% off</h1>
                                        <h3>tool storage</h3>
                                        <a href="shop.html" class="btn-hero">shop now</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </section>
                        </div>
                    <!-- slider area end -->

                    <!-- banner-statistics-area start -->
                    <div class="col-xl-3 col-lg-4">
                        <div class="row g-0">
                        <div class="col-md-12 col-sm-6">
                            <div class="img-container">
                            <a href="#"><img src="./public/img/banner/img1_home5.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="img-container">
                            <a href="#"><img src="./public/img/banner/img2_home5.jpg" alt=""></a>
                            </div>
                        </div>
                        </div>
                    </div>
                <!-- banner-statistics-area end -->
                </div>
            </div>
        </div>
    </div>
   



<section class="features-categories-area pt-50">
    <div class="container">
      <div class="section-wrapper bg-white">
        <div class="row">
          <div class="col-12">
            <div class="section-header">
              <div class="section-title">
                <h4>Baby Care</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9 col-md-9 bao-row">
            <div class="products-area-wrapper mt-30">
              <div class="tab-content">
                <div class="tab-pane fade active show" id="one">
                  <div class="features-categories-wrapper">
                    <div class="features-categories-active slick-arrow-style hand-tool">
                    <?php        
                       $sql = "SELECT  products.*,brand.id as brand_id,brand.brand_name FROM products INNER JOIN brand ON products.brand_id = brand.id where brand.id = 2 ORDER BY products.id DESC LIMIT 4";
                        $res = $conn->query($sql); 
                        while ($row = $res->fetch_array()) {         
                    ?>
                      <div class="product-slide-item">
                        <div class="product-item">
                          <div class="product-thumb">
                          <a href="?page=product_details&id=<?= $row['id'] ?>">
                            <img src="<?= $base_url . $row['thumbnail']; ?>" alt="<?= $row['name_product'] ?>" ">
                          </a>
                          </div>
                          <div class="product-content">
                            <h5 class="product-name"><a href="?page=product_details&id=<?= $row['id'] ?>"><?= $row['name_product'] ?></a></h5>
                            <div class="price-box">
                              <span class="price-regular"><?= $row['price'] ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php  } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="most-viewed-products pt-46 pb-50">
    <div class="container">
      <div class="deals-wrapper p-0">
        <div class="row">
          <div class="col-12">
            <div class="section-header-inner_2">
              <div class="section-title-deals">
                <h4>Fashion</h4>
              </div>
            </div>
            <div class="product-item-wrapper most-viewed bg-white">
              <div class="most-viewed-carousel  new-product">
                     <?php        
                        $sql = "SELECT  products.*,brand.id as brand_id,brand.brand_name FROM products INNER JOIN brand ON products.brand_id = brand.id where brand.id = 8 ORDER BY products.id DESC LIMIT 4";
                        $res = $conn->query($sql);
                        while ($row = $res->fetch_array()) {
                            // echo "<pre>";
                            // var_dump($row);     exit();              
                    ?>
                <div class="product-slide-item">
                  <div class="product-item mb-0">
                    <div class="product-thumb">
                        <a href="?page=product_details&id=<?= $row['id'] ?>">
                            <img src="<?= $base_url . $row['thumbnail']; ?>" alt="<?= $row['name_product'] ?>" ">
                        </a>
                    </div>
                    <div class="product-content p-0">
                      <h5 class="product-name pb-0"><a href="?page=product_details&id=<?= $row['id'] ?>"><?= $row['name_product'] ?></a></h5>
                      <div class="price-box">
                        <span class="price-regular"><?= $row['price'] ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php  } ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <section class="most-viewed-products pt-46 pb-50">
    <div class="container">
      <div class="deals-wrapper p-0">
        <div class="row">
          <div class="col-12">
            <div class="section-header-inner_2">
              <div class="section-title-deals">
                <h4>Toys</h4>
              </div>
            </div>
            <div class="product-item-wrapper most-viewed bg-white">
              <div class="most-viewed-carousel  new-product">
                     <?php        
                        $sql = "SELECT  products.*,brand.id as brand_id,brand.brand_name FROM products INNER JOIN brand ON products.brand_id = brand.id where brand.id = 14 ORDER BY products.id DESC LIMIT 4";
                        $res = $conn->query($sql); 
                        while ($row = $res->fetch_array()) {
                            // echo "<pre>";
                            // var_dump($row);     exit();              
                    ?>
                <div class="product-slide-item">
                  <div class="product-item mb-0">
                    <div class="product-thumb">
                        <a href="?page=product_details&id=<?= $row['id'] ?>">
                            <img src="<?= $base_url . $row['thumbnail']; ?>" alt="<?= $row['name_product'] ?>" ">
                        </a>
                    </div>
                    <div class="product-content p-0">
                      <h5 class="product-name pb-0"><a href="?page=product_details&id=<?= $row['id'] ?>"><?= $row['name_product'] ?></a></h5>
                      <div class="price-box">
                        <span class="price-regular"><?= $row['price'] ?></span>
                      </div>
                    </div>
</div>
                </div>
                <?php  } ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 

  <section class="most-viewed-products pt-46 pb-50">
    <div class="container">
      <div class="deals-wrapper p-0">
        <div class="row">
          <div class="col-12">
            <div class="section-header-inner_2">
              <div class="section-title-deals">
                <h4>Wellness And Hygience</h4>
              </div>
            </div>
            <div class="product-item-wrapper most-viewed bg-white">
              <div class="most-viewed-carousel  new-product">
                     <?php        
                        $sql = "SELECT  products.*,brand.id as brand_id,brand.brand_name FROM products INNER JOIN brand ON products.brand_id = brand.id where brand.id = 16 ORDER BY products.id DESC LIMIT 4";
                        $res = $conn->query($sql); 
                        while ($row = $res->fetch_array()) {             
                    ?>
                <div class="product-slide-item">
                  <div class="product-item mb-0">
                    <div class="product-thumb">
                        <a href="?page=product_details&id=<?= $row['id'] ?>">
                            <img src="<?= $base_url . $row['thumbnail']; ?>" alt="<?= $row['name_product'] ?>" ">
                        </a>
                    </div>
                    <div class="product-content p-0">
                      <h5 class="product-name pb-0"><a href="?page=product_details&id=<?= $row['id'] ?>"><?= $row['name_product'] ?></a></h5>
                      <div class="price-box">
                        <span class="price-regular"><?= $row['price'] ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php  } ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <style>
  .hero-slider-item.stlder-style_2 {
    height: 552px;
  }

  .product-thumb img {
    width: 300px;
    height: 300px;
    padding: 15px;

  }

  .bgg-img {
    height: 553px;
  }

  @media(max-width: 768px) {
    .bgg-img {
      height: 397px;
    }

    .d-md-block {
      padding: 20px 0px;
    }

    .product-thumb img {
      width: 200px;
      height: 180px;
    }
    .hero-slider-item.stlder-style_2 {
    height: 415px;
}
  }
</style>                  

<?php
    require 'inc/footer.php';
?>


