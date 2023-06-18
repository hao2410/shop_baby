<?php
require './inc/header.php';
?>
<?php
$sql = "SELECT products.*,brand.* FROM products INNER JOIN brand ON products.brand_id = brand.id  WHERE products.id = " .$_GET['id'];
$result = $conn->query($sql);
$res = $result->fetch_array();
$files = $res['thumbnail'];
$brand_id = $res['brand_id'];
// echo $brand_id;
?>
<?php
$errors = [];
if (isset($_POST['update']) && ($_GET['view'] == 'edit-product')) {
    $name_product = sanitize($_POST['name_product']);
    $price_product = sanitize($_POST['price_product']);
    $content_product = strip_tags($_POST['content_product']);
    // echo  $content_product; exit();
    $brand=$_POST['brand'];
    if (empty($_POST['name_product'])) {
        $errors[] = "tên sản phẩm không để trống";
    }

    if (empty($_POST['content_product'])) {
        $errors[] = "nội dung sản phẩm không để trống";
    }
    if (empty($_POST['price_product'])) {
        $errors[] = "giá sản phẩm không để trống";
    }

    if(!isset($_POST['brand'])){
       echo "Hãy chọn brand";
    }else{
        $brand=$_POST['brand'];
    }
    //uploads file
    if (isset($_FILES['file'])) {
        $uploadedFiles = $_FILES['file'];
        if ($uploadedFiles['error'] == 0) {
            $uploadPath = "./uploads";
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777);
            }
            if ($uploadedFiles['size'] > 2 * 1024 * 1024) { 
                return false;
            }
            //Kiểm tra xem kiểu file có hợp lệ không?
            $validTypes = array("jpg", "jpeg", "png", "gif");
            $fileType = substr($uploadedFiles['name'], strrpos($uploadedFiles['name'], ".") + 1);
            if (!in_array($fileType, $validTypes)) {
                return false;
            }
            // check tên file trùng k
            $num = 1;
            $fileName = substr($uploadedFiles['name'], 0, strrpos($uploadedFiles['name'], "."));
            while (file_exists($uploadPath . '/' . $fileName . '.' . $fileType)) {
                $fileName = $fileName . "(" . $num . ")";
                $num++;
            }
            $uploadedFiles['name'] = $fileName . '.' . $fileType;
            if (move_uploaded_file($uploadedFiles["tmp_name"], $uploadPath . '/' . $uploadedFiles['name'])) {
                $files = $uploadPath . '/' . $uploadedFiles['name'];
                // echo $files; exit();
            } else {
                $error = error_get_last();
                echo "Lỗi khi upload file: " . $error['message'];
            }
            // echo $file; exit();
        }
    }else{
        $files = $res['thumbnail'];
    }
    if(count($errors) == 0){  
        $sql = "UPDATE products SET name_product = '$name_product', price = '$price_product', description= '$content_product' , thumbnail = '$files'  , brand_id = '$brand' WHERE id =" . $_GET['id'];
        $result = $conn->query($sql);   
        if($result){
            // echo "thành công";
            header("location:?view=list-product");
        }else{
            echo "Lỗi khi upload file ";
        }
    }
    else{       
        $errors[]= 'có lỗi gì đó khi nhập liệu';
    }  
    
}
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Sửa sản phẩm
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name_product" id="name" value="<?php echo $res['name_product'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="name">Giá</label>
                            <input class="form-control" type="text" name="price_product" id="name" value="<?php echo $res['price'] ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro">Mô tả sản phẩm</label>
                    <textarea name="content_product" class="ckeditor" id="intro" cols="30" rows="5"><p><?php echo $res['description'] ?></p></textarea>
                </div> 

                 <div class="form-group">
                    <label for="intro">Upload File</label>
                    <input type="file" name="file" id="intro" />
                    <span value=""><?php echo $res['thumbnail'] ?></span>
                </div>

                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" id="" name="brand"  />
                        <option>--Chọn danh mục--</option>
                        <?php
                            $sql = "SELECT * FROM brand";
                            $res = $conn->query($sql); 
                            while ($row = $res->fetch_array()) {
                                $selected = ($row['id'] == $brand_id) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo $selected ?>><?php echo $row['brand_name'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?php
   ob_end_flush();
?>