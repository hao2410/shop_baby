<?php
$loi="";
// print_r($_POST);
if (isset($_POST['nutguiyeucau'])==true){
  $email = $_POST['email'];
  $conn = new PDO("mysql:host=localhost;dbname=db_tinytots", "root", "");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($sql); // tạo 1 prepare stement
  $stmt->execute ([$email]);
   $count = $stmt->execute();
    $count = $stmt->rowCount();
   if ($count==0) {
      $loi ="Email của bạn chưa đăng ký";
   }
   else{
    $password_new = strval(rand(100000, 999999)); // generate a random 4-digit number
    $password_md5 = md5($password_new);
    //  echo $password_new =  substr( md5(rand(0,999)), 0 );
     $sql = "UPDATE  users SET password = ? WHERE email = ?";
     $stmt = $conn->prepare($sql); // tạo 1 prepare stement
     $stmt->execute([$password_md5 , $email]);
    //  echo "đã cập nhật";
    GuiMatKhauMoi($email,$password_new);
   }
}
?>
<?php
function GuiMatKhauMoi($email,$password_new){
  require_once "inc/PHPMailer-master/src/PHPMailer.php"; 
  require_once "inc/PHPMailer-master/src/SMTP.php"; 
  require_once 'inc/PHPMailer-master/src/Exception.php'; 
  $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
  try {
      $mail->SMTPDebug = 0; //0,1,2: chế độ debug
      $mail->isSMTP();  
      $mail->CharSet  = "utf-8";
      $mail->Host = 'smtp.gmail.com';  //SMTP servers
      $mail->SMTPAuth = true; // Enable authentication
      $mail->Username = 'doanhainb123@gmail.com'; // SMTP username
      $mail->Password = 'cpxldtoctoskfftf';   // SMTP password
      $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
      $mail->Port = 465  ;  // port to connect to                
      $mail->setFrom('doanhainb123@gmail.com', 'Đoàn Hải' ); 
      $mail->addAddress($email); 
      $mail->isHTML(true);  // Set email format to HTML
      $mail->Subject = 'Thư đổi lại mật khẩu';
      $password_base64 = base64_encode($password_new); // mã hóa mật khẩu
      $noidungthu = "<p>Đây là mật khẩu mới của bạn để đang nhập tại khoản trang web của chúng tôi</p>
          Mật khẩu mới của bạn là {$password_new}
      "; 
      $mail->Body = $noidungthu;
      $mail->smtpConnect( array(
          "ssl" => array(
              "verify_peer" => false,
              "verify_peer_name" => false,
              "allow_self_signed" => true
          )
      ));
      $res = $mail->send();
      // echo 'Đã gửi mail xong';
      return true;
  } catch (Exception $e) {
      echo $e->getMessage();
      // echo 'Error: ', $mail->ErrorInfo;
      return false;
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<form method="post" style="width:600px;" class="border border-primary border-2 m-auto p-2">
  <h1 class="mb-3 text-center">
    QUÊN MẬT KHẨU
  </h1>
  <?php if($loi!=""){?>
      <div class = "alert alert-danger"><?php echo $loi ?></div>
  <?php } ?>
  <div class="mb-3">
    <label for="email" class="form-label">Nhập Email</label>
    <input value="<?php if (isset($email)==true) echo $email?>" type="email" class="form-control" id="email" name="email">
  </div>
  <button type="submit" class="btn btn-primary" name="nutguiyeucau" value="nutgui">Gửi yêu cầu</button>
  <button type="submit" class="btn btn-primary" style="color: #0d6efd; background-color: #0d6efd;">
    <a href="?page=home" style="text-decoration: none; color: white;">Trang Chủ</a>
  </button>
</form>
</body>
</html>