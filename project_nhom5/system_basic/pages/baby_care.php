
<?php
    require 'inc/header.php';
?>

    <div class="header">
        <div class="header-ct"><a href="">
                <p style="color: black">Home</p>
            </a></div>
        <div class="header-ct i1"><i class="fa fa-angle-right"></i></div>
        <div class="header-ct p1">
            <p>Product: baby care</p>
        </div>
    </div>
    <div class="centent">
        <div class="centent-ct ct-ct1">
            <h5 class="mb-7">Brand</h5><br>
            <li><a href="#eat">Baby Eat</a><br></li>
            <li><a href="#sleep">Sleeping Baby</a><br></li>
            <li><a href="#diapers">Baby Diapers</a><br></li>
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
            <div class="sidebar-single">
                <div class="sidebar-title">
                    <h3>size</h3>
                </div>
                <div class="sidebar-body">
                    <ul class="checkbox-container">
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck111">
                                <label class="custom-control-label" for="customCheck111">S (4)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck222">
                                <label class="custom-control-label" for="customCheck222">M (5)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck333">
                                <label class="custom-control-label" for="customCheck333">L (7)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck444">
                                <label class="custom-control-label" for="customCheck444">XL (3)</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- danh sách sp  -->
        <div class="centent-ct">
            <h4 id="eat">Baby eat</h4>
            <div class="shop-product-wrap grid-view row">
                    <?php      
                        $num = 0;  
                        $sql = "SELECT products.*,brand.id as brand_id,brand.brand_name FROM products INNER JOIN brand ON products.brand_id = brand.id where brand.id = 2";
                        $res = $conn->query($sql); 
                        while ($row = $res->fetch_array()) {
                            $num++;              
                    ?>
                            <div class="col-md-4 col-sm-6">
                                <!-- product grid start -->
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
            <h4 id="sleep">Sleeping baby</h4>
            <div class="shop-product-wrap grid-view row">
                    <?php        
                        $sql = "SELECT products.*,brand.id as brand_id,brand.brand_name FROM products INNER JOIN brand ON products.brand_id = brand.id where brand.id = 1";
                        $res = $conn->query($sql); 
                        while ($row = $res->fetch_array()) {
                  
                    ?>
                <div class="col-md-4 col-sm-6">
                    <!-- product grid start -->
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
            <h4 id="diapers">Baby diapers</h4>
            <div class="shop-product-wrap grid-view row">
                    <?php        
                        $sql = "SELECT products.*,brand.id as brand_id,brand.brand_name FROM products INNER JOIN brand ON products.brand_id = brand.id where brand.id = 3";
                        $res = $conn->query($sql); 
                        while ($row = $res->fetch_array()) {                 
                    ?>
                        <div class="col-md-4 col-sm-6">
                            <!-- product grid start -->
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
                                    <!-- <div class="product-item-action">
                                        <a class="btn btn-cart" href="?page=cart">Add To Cart</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                
            </div>
        </div>
    </div>

    <style scoped>
        .centent{
            background: white;
        }
       
        @media(max-width:768px){
            .ct-ct1 {
                width: 36px;
            }
            .header{
                font-size: 14px;
            }
        }

    </style>
<?php
    require 'inc/footer.php';
?>