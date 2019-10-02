<?php include("db.php"); ?>
<?php
// @session_start();
// $userID=$_SESSION['user_id'];
$error=$error1=$error2=$error3=$User_err="";

if (isset($_POST['btnSubmit'])) {
  
  $f_newPassword=md5($_POST['txtnewPassword']);
  $f_conPassword=md5($_POST['txtconPassword']);

  if ($_POST['v_user']==0) {
   $User_err="Please select user";
  }else{
    $userID=$_POST['v_user'];
  }

  if($f_newPassword!=$f_conPassword){
    $error1="Pasword dosen't match";
  }else{
      $f_conPassword=md5($_POST['txtconPassword']);
  }

  if (empty($User_err) && empty($error1)) {
         ////update////////////
    $sql1="UPDATE `tbl_user` SET `new_password`=? WHERE `tbl_userID`=?";

    $stmt = $con->prepare($sql1);
    $stmt->bind_param('ss',$f_conPassword,$userID);
    $stmt->execute();
    
    if ($stmt->errno) {
      $error="FAILURE!!! " . $stmt->error;
    }else{
     $error2= "Password Updated successfully";
    $_POST['txtnewPassword']="";
    // session_destroy();
   }
   $stmt->close();
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
                                    <label for="inputText2" class="col-sm-4 control-label">Users Name</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="v_user" id="v_Institute_Code" autofocus="autofocus">
                                            <option value="0">--SELECT--</option>
                                            <?php
                                            $sql = "SELECT *  FROM tbl_user ";
                                            $user_data = $con->query($sql);
                                            if ($user_data->num_rows >= 1) :

                                                while ($row = mysqli_fetch_assoc($user_data)) :?>
                                                    <option value="<?php echo $row["tbl_userID"]?> ">
                                                        <?php echo $row["username"] ?> 
                                                    </option>


                                                <?php
                                            endwhile;
                                        endif;
                                        ?> 
                                    </select>

                                </div>
                                <?php if (isset($_POST["btnSubmit"])) { ?>

                                                <span class="text-danger"><?php echo $User_err; ?></span>

                                                <?php } ?>
                            </div>




            <div class="form-group">
              <label for="inputText2" class="col-sm-4 control-label">New Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="txtnewPassword"
                id="txtnewPassword"
                placeholder="Enter Password" value="<?php if(isset($_POST['btnSubmit'])){
                                        echo $_POST['txtnewPassword'];} ?>"  required>
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
        <br/>
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">
      </div>
    </div>
    
    
  </div>
  
  
</form>
</body>
</html>