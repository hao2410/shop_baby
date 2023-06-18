<?php
    $conn = new mysqli('localhost', 'root', '');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE DATABASE IF NOT EXISTS `db_tinytots` ";
    $res = $conn->query($sql);

    if($res === TRUE){
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // use database
    $conn->select_db('db_tinytots');
    echo "<br>";

    // create table người dùng
  
    try {
        $sql = "CREATE table if not exists users  (
            `id` INT PRIMARY KEY AUTO_INCREMENT,
            `fullname` VARCHAR(255) NOT NULL,
            `username` VARCHAR(255) NOT NULL,
            `password` VARCHAR(40) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `address` LONGTEXT,
            `phone` VARCHAR(255),
            `created_at` INT,
            `role` ENUM('admin', 'customer') DEFAULT 'customer'
        )";

        $res = $conn->query($sql);

        if ($res === TRUE) {
            echo "Table users created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } catch (Exception $e) {
        echo  $e->getMessage();
    }
    echo "<br>";
    // bảng danh mục
    try {
        $sql = "CREATE table if not exists category (
              id INT PRIMARY KEY AUTO_INCREMENT,
              cate_name VARCHAR(255) NOT NULL
        )";

        $res = $conn->query($sql);

        if ($res === TRUE) {
            echo "Table category created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } catch (Exception $e) {
        echo  $e->getMessage();
    }
    echo "<br>";
// bảng chi brand (cate->brand->product)
   
    try {
        $sql = "CREATE table if not exists brand (
              id INT PRIMARY KEY AUTO_INCREMENT,
              brand_name VARCHAR(255) NOT NULL,
              `category_id` INT,
              FOREIGN KEY (category_id) REFERENCES category(id)
        )";

        $res = $conn->query($sql);

        if ($res === TRUE) {
            echo "Table brand created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } catch (Exception $e) {
        echo  $e->getMessage();
    }
    echo "<br>";
  
    // bảng sản phẩm
    echo "<br>";
    try {
        $sql = "CREATE TABLE IF NOT EXISTS products  (
            `id` INT PRIMARY KEY AUTO_INCREMENT,
           `name_product` VARCHAR(255) NOT NULL,
            `price` DECIMAL(10, 2) NOT NULL,
           `description` LONGTEXT,
            `thumbnail` VARCHAR(255),
            `brand_id` INT,
            `created_at` INT,
  		    `updated_at` INT,
            FOREIGN KEY (brand_id) REFERENCES brand(id)
        )";

        $res = $conn->query($sql);

        if ($res === TRUE) {
            echo "Table products created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } catch (Exception $e) {
        echo  $e->getMessage();
    }

    echo "<br>";
    
    //  bảng đơn hàng
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `orders`(
            `id` INT PRIMARY KEY AUTO_INCREMENT,
            `fullname` VARCHAR(255) NOT NULL,
            `note` text,
            `phone` VARCHAR(255) NOT NULL,
            `address` VARCHAR(500) NOT NULL,
            `total` DECIMAL(10, 2),
            `created_at` INT,
            `updated_at` INT
        )";

        $res = $conn->query($sql);

        if ($res === TRUE) {
            echo "Table orders created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } catch (Exception $e) {
        echo  $e->getMessage();
    }
    echo "<br>";

    // bảng chi tiết đơn hàng 
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `order_detail` (
            `id` INT PRIMARY KEY AUTO_INCREMENT,
            `order_id` INT,
            `product_id` INT,
            `quantity` INT,
            `price` DECIMAL(10,2),
            `total_price` INT,
            `created_date` INT,
            `last_updated` INT,
            FOREIGN KEY (order_id) REFERENCES orders (id),
            FOREIGN KEY (product_id) REFERENCES products (id)
        )";

        $res = $conn->query($sql);

        if ($res === TRUE) {
            echo "Table order_detail created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } catch (Exception $e) {
        echo  $e->getMessage();
    }

    echo "<br>";

    // bảng phản hồi

    try {
        $sql = "CREATE TABLE IF NOT EXISTS `feedBack`(
            `id` INT PRIMARY KEY AUTO_INCREMENT,
            `fullname`  VARCHAR(255),
            `email` VARCHAR(255) NOT NULL,
            `address` LONGTEXT,
            `phone` VARCHAR(255),
            `note` VARCHAR(255),
            `created_at` INT,
            `update_at` INT
        )";

        $res = $conn->query($sql);

        if ($res === TRUE) {
            echo "Table feedBack created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } catch (Exception $e) {
        echo  $e->getMessage();
    }
    