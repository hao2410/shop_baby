<?php
require 'inc/connect_db.php';
require 'lib/data.php';
$errors = [];
if (isset($_POST['register'])) {
    // var_dump('hello');
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $password = sanitize($_POST['password']);
    $repassword = sanitize($_POST['repassword']);
    if (!isset($_POST['agree'])) {
        array_push($errors, 'You must agree to the terms');
    }
    if ($password != $repassword) {
        array_push($errors, 'Password and retype password must be the same');
    }

    if (empty($username)) {
        array_push($errors, 'Username is required');
    }
    if (!preg_match("/^[A-Z][a-z][0-9a-zA-Z_\.]{4,30}$/", $username)) {
        array_push($errors, 'Username must be at least 6 characters and maximium 20 characters');
    }

    if (empty($email)) {
        array_push($errors, 'Email is required');
    }
    if (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/", $email)) {
        array_push($errors, 'email is invalid');
    }

    if (empty($phone)) {
        $errors[] = "Phone is required";
    }

    if (!preg_match("/^[0-9]{10,11}$/", $phone)) {
        $errors[] = "Phone number is invalid";
    }

    if (empty($password)) {
        array_push($errors, 'Password is required');
    }


    $pattern = '/^[0-9a-zA-Z_\.!@#$%^&*]{6,32}$/';
    if(!preg_match($pattern, $password)){
        $error['password'] = "password sai định dạng";
    }else{
        $password =sanitize($_POST['password']);
    }

    if (count($errors) == 0) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0){
            array_push($errors, 'Username already exists');
        }else{
            $password = md5($password);
            $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";
            $result = $conn->query($sql);
            // var_dump($result);
            if($result==true){
                header('location:?page=login');
            }else{
               echo array_push($errors, 'Something went wrong');
            }
        }
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
    
    <title>Register</title>
    <style>
         body {
        background-image: url(./img/anh_login.jpg);
        background-size: cover ;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
         }
        .card{
            background-color: rgba(0, 0, 0, 0.3);
        }
    </style>
    <style >
        .container{
        padding: 100px;
        /*background: #edeaea;*/
        }
        .card{
        border:none;
        }
        .btn-register{
        width: 100%;
        background: #0b5ed7;
        color: #FFFFFF;
        padding: 10px;
        border-radius: 10px;
        margin-top: 20px;
        }
        .btn:hover{
        color: #c09a9a;
        }
        a{
        text-decoration: none;
        color: #FFFFFF;
        }
        .back-home{
        color: black;

        }
    </style>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-0 col-md-3 col-lg-4">

      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
          <div>
            <h2 class="text-center">Register</h2>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <p class="text-center">Register a new membership</p>
              User name: <input type="text" name="username" class="form-control mb-2" placeholder="User name">
              Email: <input type="email" name="email" class="form-control mb-2" placeholder="Email">
              Phone: <input type="phone" name="phone" class="form-control mb-2" placeholder="Phone">
              Password: <input type="password" name="password" class="form-control mb-2" placeholder="Password">
              Retype password:<input type="password" name="repassword" class="form-control mb-2" placeholder="Retype password">
              <!-- <router-link class="back-home" to="/home"><u>back to home</u></router-link> -->
              <div class="register-btn-wrap d-flex flex-wrap align-items-center justify-content-between">
              <strong><input type="checkbox" name="agree" value="agree" /> I agree to the <span class="text-primary">terms</span></strong>
                <button type="submit" name="register" class="btn-register">Register</button>
              </div>
            </form>
            <p><a href="?page=login">I already have membership</a></p>
            <?php
                    if (count($errors) > 0) :
                        echo '<div class="alert alert-danger" role="alert">';
                        foreach ($errors as $error) :
                    ?>
                        <p><?php echo $error; ?></p>
                    <?php
                        endforeach;
                        echo '</div>';
                    endif;
                    ?>
          </div>
          </div>
        </div>
        <div class="col-0 col-md-3 col-lg-4">
        </div>
      </div>
    </div>


</body>
</html>

