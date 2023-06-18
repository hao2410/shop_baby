<?php
require 'inc/connect_db.php';
$errors =[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_md5 = md5($password);
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password_md5'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row["role"] !== "admin") {
          $_SESSION['is_login'] = true;
          $_SESSION['user_login'] =$username;  
            header("location:?page=home");
        }
    } else {
       echo $errors[] = 'Username or password is incorrect.';
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
.contact{
  display: flex;
  justify-content: space-between;
}
.hint-question{
  font-size: 18px;
  margin-bottom: 15px;
}
.hint-question:hover,.hint-question a:hover{
  cursor: pointer;
  color: blue;
  text-decoration: underline;
}
.hint-question a{
  text-decoration: none;
  color: black;
}
.nut-an{
  background: #93c240;
  border-radius: 8px;
  width: 445px;
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
         <div class="contact">
            <p class="hint-question"><a href="?page=register">Register</a></p>
            <p class="hint-question"><a href="?page=forgot_password">Forget Password</a></p>
         </div>
        <div class="sign-up">Or sign up with</div>
       <div class="wrapper-logo-app">
        <div class="logo-app">
          <img class="logo" src="./public/img/logo/google logo.png""/>
        </div>
        <div class="logo-app">
          <img class="logo" src="./public/img/logo/face.png"/>
        </div>
        <div class="logo-app">
          <img class="logo" src="./public/img/logo/apple.png"/>
        </div>
      </div>
      <a href="?page=home" class="back-home">back to home page</a>
    </div>
</div>

</body>
</html>