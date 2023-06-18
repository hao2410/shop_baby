<?php
unset($_SESSION['is_login_admin']);
unset($_SESSION['user_login_admin']);
header('location:?view=login');
?>