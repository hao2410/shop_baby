<?php
// session_start();
// ob_start();
$errors =[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_md5 = md5($password);
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password_md5' AND role ='admin'";
    $res = $conn->query($sql);
    if ($res->num_rows >0) {
        $_SESSION['is_login_admin'] = true;
        $_SESSION['user_login_admin'] =$username;  
        header('location:?view=list-order');
    } else {
       echo $errors[]= 'Username or password is incorrect.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Login</title>
<style>
.container{
  width: 100%;
}
.error{
  color: red;
}
.title-login{
  font-weight: 500;
  font-size: 60px;
  color: #000000;
  line-height: 76px;
  padding: 51px 0;
}
.login{
  margin: 0 auto;
  text-align: center;
  width: 500px;
  padding: 20px;
}
.dang-nhap{
  font-weight: 400;
  font-size: 15px;
  color: #6D6A6A;
  padding: 14px 252px 14px  17px;
  border: 1px solid #6C6A6A;
  border-radius: 8px;
  margin-bottom: 10px;
}
.hint-question{
  display: flex;
  justify-content: flex-end;
  margin-bottom: 25px;
}
.hint-question:hover{
  cursor: pointer;
}
.nut-an{
  background: #93c240;
  border-radius: 8px;
  width: 100%;
  border: 0;
  padding: 12px 140px;
  font-weight: 400;
  font-size: 18px;
  color: #000000;
  margin-bottom: 35px;
  transition: .3s;
}
.nut-an:hover{
  background: #42b983;
  cursor: pointer;
}
.sign-up{
  font-weight: 400;
  font-size: 12px;
  color: #757171;
  margin-bottom: 35px;

}
.logo-app{
  background: #FFFFFF;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);
  border-radius: 8px;
  padding: 11px 25px;
}
.wrapper-logo-app{
  display: flex;
  gap:20px;
  justify-content: center;
  margin-bottom: 53px;
}
.logo{
  width: 27px;
  height: 27px;
}
.create-account{
  font-weight: 400;
  font-size: 13px;
  color: #636363;
}
.active{
  font-weight: 600;
  color: #0C1F22;
  border: 0;
}
</style>
</head>
<body>
  <div class="container">
    <div class="login">
        <div class="title-login">
            Login
        </div>
        <form action="" method="post">
          <input type="text" name="username" class="dang-nhap" placeholder="Username">
          <input type="password" name="password" class="dang-nhap" placeholder="Password">
          <button type="submit" name="login" class="nut-an">Login</button>
        </form>
</div>

</body>
</html>