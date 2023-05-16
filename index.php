<?php
include_once("config/database.php");
session_start();

$sql1 = "SELECT * FROM tb_user";
  $check1 = $pdo->prepare($sql1);
  $check1->execute();

  $row1 = $check1->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['btn_login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
  $check = $pdo->prepare($sql);
  $check->execute();

  $row = $check->fetch(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($row1);
// echo "</pre>";

// var_dump($row);
// die();

  if(is_array($row)){
  //CHECK IF ROLE "admin"
    if($row['username']==$username AND $row['password']==$password AND $row['role']=="admin"){
      //CATCH THE ADMIN SESSION
      $_SESSION['username'] = $row['username'];
      $_SESSION['role'] = $row['role'];

      echo $notif = "<div class=\"alert alert-success col-md-12\" style=\"max-width:24%; flex:unset\">Berhasil Login </div>";
      header('refresh: 1;view/dashboard/admin_dashboard.php');
      //CHECK IF ROLE "operator"
    }elseif($row['username']==$username AND $row['password']==$password AND $row['role']=="operator"){
      echo $notif = "<div class=\"alert alert-danger col-md-12\" style=\"max-width:24%; flex:unset\">Berhasil Login </div>";
      header('refresh: 1;view/dashboard/operator_dashboard.php');
    }
  }
else{
    echo $notif = "<div class=\"alert alert-danger col-md-12\" style=\"max-width:24%; flex:unset\">Username / Password salah </div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS | BARCODE </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

    <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>POS</b>BARCODE</a>
        </div>
        <div class="card-body">

            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="username" class="form-control" placeholder="Masukkan Username Anda" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Masukkan Password Anda" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" name="btn_login" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>
</html>
