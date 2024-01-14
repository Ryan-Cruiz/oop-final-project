<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Golden Link College | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="dashboard.php"><b>GLC</b></a>
    </div>

    <div class="register-box-body">
      <?php
      session_start();
      require_once('../connection.php');
      if (isset($_POST["submit"])) {
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["Retype_password"];

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        if (empty($fullname) or empty($email) or empty($password) or empty($passwordRepeat)) {
          array_push($errors, "FILL UP ALL FIELDS");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          array_push($errors, "email is not valid");
        }

        if (count($errors) > 0) {
          foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
          }
        } else {
          $chck_stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
          $chck_stmt->execute([$email]);
          $check_email = $chck_stmt->fetch();
          if (!$check_email) {
            $sql = "INSERT INTO users(full_name, email, password, created_at) VALUES ( ?, ?, ?, datetime('now') )";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$fullname, $email, $passwordhash]);
            $id = $connection->lastinsertId();
            $_SESSION["user_id"] = $id;
            $currentUser_query = "SELECT * FROM users WHERE id = ? ";
            $logstmt = $connection->prepare($currentUser_query);
            $logstmt->execute([$id]);
            $current_user = $logstmt->fetch();
            $_SESSION['name_of_user'] = $current_user['full_name'];
            $_SESSION['date_registered'] = $current_user['created_at'];
            header("Location: dashboard.php ");
          } else {
            header("location: register.php");
          }
        }
      }
      ?>


      <form action="register.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="fullname" placeholder="Full name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="Retype_password" placeholder="Retype password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" value="register"
              name="submit">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>