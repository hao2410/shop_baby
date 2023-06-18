<?php
require './inc/header.php';
?>

<?php
$errors = [];
if (isset($_POST['add_product']) && ($_GET['view'] = 'add_product')) {
    $name_product = sanitize($_POST['name_product']);
    $price_product = sanitize($_POST['price_product']);
    $content_product = strip_tags($_POST['content_product']);
    // echo  $content_product ; exit();
    $brand=$_POST['brand'];
    if (empty($_POST['name_product'])) {
        $errors[] = "tên sản phẩm không để trống";
    }

    if (empty($_POST['price_product'])) {
        $errors[] = "giá sản phẩm không để trống";
    }

    if (empty($_POST['content_product'])) {
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
            if ($uploadedFiles['size'] > 2 * 1024 * 1024) { //max upload is 2 Mb = 2 * 1024 kb * 1024 bite
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
                // die();
            }
            $uploadedFiles['name'] = $fileName . '.' . $fileType;
            if (move_uploaded_file($uploadedFiles["tmp_name"], $uploadPath . '/' . $uploadedFiles['name'])) {
                $files = $uploadPath . '/' . $uploadedFiles['name'];
            } else {
                $error = error_get_last();
                echo "Lỗi khi upload file: " . $error['message'];
            }
        }
    }
   
    $sql = "INSERT INTO products ( `id`, `name_product`, `price`, `description`, `thumbnail`, `brand_id`, `created_at`, `updated_at`) VALUES 
    (NULL,'$name_product', '$price_product','$content_product', '$files',$brand," . time() . "," . time() . ")";
    $res = $conn->query($sql);
    if($res){
        // echo "thành công insert";
        header_remove();
        header("location:?view=list-product");
    }else{
        echo $errors[]= 'lỗi';
    }

}
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name_product" id="name"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Giá</label>
                            <input class="form-control" type="text" name="price_product" id="name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="intro">Mô tả sản phẩm</label>
                    <textarea name="content_product" class="ckeditor" id="intro" cols="30" rows="5"></textarea>
                </div> 

                 <div class="form-group">
                    <label for="intro">Upload File</label>
                    <input type="file" name="file" id="intro" />
                </div>

                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" id="" name="brand">
                        <option>--Chọn danh mục--</option>
                        <?php
                            $sql = "SELECT * FROM brand";
                            $res = $conn->query($sql); 
                            while ($row = $res->fetch_array()) {
                        ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['brand_name'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" name="add_product" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
<?php
   ob_end_flush();
?>