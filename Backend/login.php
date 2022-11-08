<?php 
session_start();

if (isset($_SESSION["login"])) {
  header('Location: index.php');
  exit;
}

require 'functions.php';

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  //$hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT);
  
  //die($hashed_password);		
  //cek apa username ada pada database
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  //cek username
  if (mysqli_num_rows($result) === 1 ) {

  //cek password
    $rows = mysqli_fetch_assoc($result);
    if (password_verify($password, $rows["password"])) {
      //set session
      $_SESSION["login"] = true;
	 // die("valid OK"); 	

      header("Location: index.php");
      exit;

    }else {
		$error = true;
	}

  }

  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Page</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="dist/ext/dist/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
              </div>
<?php if (isset($error)) :?>
                <p style="color: red; font-style: italic;">Password / Username Salah</p>
              <?php endif; ?>
              <form method="post" action="" class="user">
                <div class="form-group">
                  <input name="username" type="text" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter username...">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div>
                <button name="login" type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="dist/js/sb-admin-2.min.js"></script>

  </body>

  </html>