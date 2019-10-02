<?php
include("db.php");
session_start();

$username = $txtpass1 = $msg = $msger = $name =  $txtfirst_name = $txtmiddle_name= $txtlast_name= $txtfull_name = $txtmember_code= $txtindex_no = $txtuser_id="";

if (isset($_POST["btnsubmit"])) {

  $txtpass1 = md5($_POST["pass1"]);
  $username = strtoupper($_POST["username"]);

  $result = $con->query(" SELECT * FROM tbl_user WHERE username ='" . $username . "' && new_password = '" . $txtpass1 . "' ");

  if ($row = $result->fetch_assoc()) {

    $name = $row['username'];
    $txtuser_id = $row['tbl_userID'];

    if (!empty($_POST["remember"])) {
      setcookie("member_login", $_POST["username"], time() + (4 * 365 * 24 * 60 * 60), "/", "", 0);
      setcookie("member_password", $_POST["pass1"], time() + (4 * 365 * 24 * 60 * 60), "/", "", 0);
    } else {
      if (isset($_COOKIE["member_login"])) {
        setcookie("member_login", "");
      }
      if (isset($_COOKIE["member_password"])) {
        setcookie("member_password", "");
      }
    }

    $_SESSION["user_id"] = $txtuser_id;

       // echo $_SESSION["full_name"] ;

    header("Location: index1.php");
  } else {
    $msger = "Please check your email address or password";
  }
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="JQuery/jquery-3.2.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style>
  body, html {
    height: 100%;
    margin: 0;
  }

  .hero-image {
    background-image: url("Images//Cover.jpg");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
  }

  .hero-text {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
  }

  .hero-text button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 10px 25px;
    color: black;
    background-color: #ddd;
    text-align: center;
    cursor: pointer;
  }

  .hero-text button:hover {
    background-color: #14A506;
    color: white;
  }
</style>

</head>
<body >
  <div class="hero-image">
    <div class="hero-text">
      <div class="container col-md-8 col-md-offset-8">
<center>
        <div class="panel-group" >
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #A6ACAF">

              <div class="wrapper-page" >
                <div class="m-t-30 card bg-dark card-box " style="height: 550px; background-color: #A6ACAF;">
                  <img class="card-img-top" src="Images//Mobitel_logo.png" alt="Card image" style="width:40%">
                  <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0" style="color: #black; font-weight: bold;">Trainee Management System</h4>
                  </div>
                  <?php if (isset($_POST["btnsubmit"])) { ?>
                  <?php if (!empty($msg)) { ?>
                  <div class="col-sm-12 alert alert-success" role="alert"> <?php echo $msg ?> </div>
                  <?php } ?>
                  <?php if (!empty($msger)) { ?>
                  <div class="col-sm-12 alert alert-danger" role="alert"> <?php echo $msger ?> </div>
                  <?php } ?>
                  <?php } ?>
                  <br/>

                  <div class="panel-body" style="background-color: transparent;">
                    <form class="form-horizontal m-t-10" action="" data-parsley-validate="" novalidate method="post">
                      <div class="form-group col-xs-12">
                        <input type="text" name="username" required="" class="form-control"
                        id="username" placeholder="User Name" autocomplete="off"
                        value="<?php if (isset($_COOKIE["member_login"])) {
                         echo $_COOKIE["member_login"];
                       } ?>" autofocus/>
                     </div>
                     <div class="form-group col-xs-12">
                      <input id="pass1" name="pass1" type="password" placeholder="Password" required=""
                      class="form-control" autocomplete="off"
                      value="<?php if (isset($_COOKIE["member_password"])) {
                       echo $_COOKIE["member_password"];
                     } ?>"/>
                     <div class="col-xs-12">
                      <div class="checkbox checkbox-custom">
                        <input id="checkbox-signup" type="checkbox" name="remember"
                        <?php if (isset($_COOKIE["member_login"])){ ?>checked<?php } ?>/>
                        <label for="checkbox-signup" style="color: #032634;"> Remember me </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-center m-t-30">
                    <div class="col-xs-11">
                      <button class="btn btn-primary btn-bordred btn-block waves-effect waves-light text-uppercase"
                      type="submit" name="btnsubmit">Log In </button>
                    </div>
                  </div>
                  <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12"> <a style="color: black;" class="text-muted" data-toggle="tooltip" title="Please Contact Administrator!"><i class="fa fa-lock m-r-5" ></i> Forgot your
                    password? </a>
                    <p style="color: #032634;" class="text-muted">Don't have an account? <br><a href="" class="text-primary m-l-5" data-toggle="tooltip" title="Username : GUEST  &nbsp &nbsp  &nbsp Password: mobitel#123"><b style="color: #033244">Login as Guest </b></a></p>
                    </div>
                   
                    <script>
                      $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip(); 
                      });
                    </script>
                  </div>
                </form>

              </div>
            </div>
            <!-- end card-box --> 

          </div>
        </div>
      </div>
    </div></center>
  </div>
  <!-- end container -->
</div></div>
</body>
</html>