<?php include("db.php"); ?>
<?php
@session_start();
$userID=$_SESSION['user_id'];
$error=$error1=$error2=$error3="";

if (isset($_POST['btnSubmit'])) {
  $f_oldPassword=md5($_POST['txtOldPassword']);
  $f_newPassword=md5($_POST['txtnewPassword']);
  $f_conPassword=md5($_POST['txtconPassword']);

  $sql="SELECT * FROM tbl_user WHERE tbl_userID='".$userID."'";
  $resultSet= $con->query($sql);

  if ($resultSet->num_rows >=1){

   while( $rows = $resultSet-> fetch_assoc()){

    $oldpw=$rows['new_password'];

  }

}else{
  $error="Can't find user";
}

if($oldpw==$f_oldPassword){
  if($f_newPassword!=$f_conPassword){
    $error1="pasword dosen't match";
  }else{
          ////update////////////
    $sql1="UPDATE `tbl_user` SET `new_password`=? WHERE `tbl_userID`=?";

    $stmt = $con->prepare($sql1);
    $stmt->bind_param('ss',$f_newPassword,$userID);
    $stmt->execute();
    
    if ($stmt->errno) {
      $error="FAILURE!!! " . $stmt->error;
    }else{
     $error2= "Password Updated successfully";
     session_destroy();
   }
   $stmt->close();
 }
}else{
  $error3= "Please enter correct password";
}


}

?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <title>Change Password</title>
  <?php include("header.php") ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <br/>
  <br/>
  <br/>
  <br/>

  <center>
    <form class="form-horizontal" method="post" action="#">
      <div class="container col-md-6 col-md-offset-3 ">
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
             <h4 class="panel-title">Change Password</h4>
             
           </div>
           <?php if (isset($_POST["btnSubmit"])) { ?>
           <?php if (!empty($error)) { ?>
           <div class="col-sm-8 col-sm-offset-2 alert alert-danger" role="alert"> <?php echo $error; ?> </div>
           <?php }elseif (!empty($error2)) {?>
           <div class="col-sm-8 col-sm-offset-2 alert alert-success" role="alert"> <?php echo $error2; ?> </div>
           <?php }} ?>
           <div class="panel-body">
            <div class="form-group">
              <label for="inputText2" class="col-sm-4 control-label">Old Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="txtOldPassword"
                id="txtOldPassword"
                placeholder="Enter Password" required>
              </div>
              <?php if (isset($_POST["btnSubmit"])) { ?>
              <span class="text-danger"><?php echo $error3; ?></span>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="inputText2" class="col-sm-4 control-label">New Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="txtnewPassword"
                id="txtnewPassword"
                placeholder="Enter Password" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputText2" class="col-sm-4 control-label">Confirm Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="txtconPassword"
                id="txtconpassword"
                placeholder="Re-type password" required>
              </div>
              <?php if (isset($_POST["btnSubmit"])) { ?>
              <span class="text-danger"><?php echo $error1; ?></span>
              <?php } ?>
            </div>
          </div>
        </div>
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">
      </div>
    </div>
    
    
  </div>
  
  
</form>
</body>
</html>