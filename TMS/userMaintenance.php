<?php include("db.php"); ?>
<?php
$msg = $msger = "";

$username = $new_password =$access_ids ="";
/*$sql1 = "SELECT *  FROM tbl_usertype ";
$user_data = $con->query($sql1);

if ($user_data->num_rows == 1) {
    $row1 = mysqli_fetch_assoc($user_data);
    $txtUID = $row1['tbl_UserType'];
    $txtUserType = $row1['UserType'];


  }*/
  $error=$error1=$selectOption=$tid="";
  if (isset($_POST["btnSubmit"])) {

// Check connection
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    $selectOption=$_POST['selectOption'];
    $new_password = md5($_POST["txtpassword"]);
    $con_password=md5($_POST["txtconpassword"]);
    $username = $_POST["txtusername"];
    
    if($selectOption=="ADMIN"){
      $selectOption="ADMIN";
    }else if($selectOption=="SECURITY_1"){
      $selectOption="SECURITY_1";
    }else if($selectOption=="SECURITY_2"){
      $selectOption="SECURITY_2";
    }else if($selectOption=="EXECTIVE_1"){
      $selectOption="EXECTIVE_1";
    }else if($selectOption=="EXECTIVE_2"){
      $selectOption="EXECTIVE_2";
    }else if($selectOption=="GUEST"){
      $selectOption="GUEST";
    }


    $sql3="SELECT * FROM tbl_user WHERE Trainee_ID='".$selectOption."'";
    $resultSet= $con->query($sql3);
    echo $selectOption;
    
    if($selectOption=="0"){

      $error="Please select user";
      
    }else if($new_password!=$con_password){
      $error1="password dosen't match";
    }else if($_POST['cb']!= true){
      $error4="please select privileges";
    }else if ($resultSet->num_rows >=1){
      $error4="user already exist";
      
    }else{


      $access_ids = array();
      $access_ids =  implode(',', $_POST['cb']);
      $status="ACTIVE";
      

      $sql = "INSERT INTO tbl_user(username,Trainee_ID,new_password,status)VALUES('$username','$selectOption','$new_password','$status') ";
      
      if ($con->query($sql) === TRUE) {

        $sql2 = "SELECT tbl_userID  FROM tbl_user ORDER BY tbl_userID DESC LIMIT 0,1";
        $lastid_data = $con->query($sql2);
        $tbl_userID="";
        if ($lastid_data->num_rows >= 1) {
          while ($row = mysqli_fetch_assoc($lastid_data)){
            $tbl_userID =$row['tbl_userID'];
          }

          $sql_access_ids = "INSERT INTO tbl_accesspoint(access_point, id_user) VALUES ('$access_ids','$tbl_userID') ";

          if ($con->query($sql_access_ids) === TRUE) {
            $error3= "New record created successfully";
          }
        } else {
          echo "Error: " . $sql . "<br>" . $con->error;
        }
      }
      
    }
    
    
  }

  ?>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>User Maintenance</title>
    <?php include("header.php") ?>
  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <br>
    <br>
    <br>
    <div>
      <center>
        <h2>User Maintenance</h2>
      </center>
    </div>
    <center>
      <form class="form-horizontal" method="post" action="#">
        <div class="container col-md-6 col-sm-offset-3 ">
          <div class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Create User</h4>
              </div>
              <?php if (isset($_POST["btnSubmit"])) { ?>
              <?php if (!empty($error3)) { ?>
              <div class="col-sm-8 col-sm-offset-2 alert alert-success" role="alert"> <?php echo $error3; ?> </div>
              <?php }elseif (!empty($error4)) {?>
              <div class="col-sm-8 col-sm-offset-2 alert alert-danger" role="alert"> <?php echo $error4; ?> </div>
              <?php }} ?>
              <div>
                <div class="panel-body">
                  <div class="form-group">
                    <label for="inputText2" class="col-sm-4 control-label">Employee Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="selectOption" autofocus="autofocus">
                        <option value="0">--SELECT--</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="SECURITY_1">SECURITY_1</option>
                        <option value="SECURITY_2">SECURITY_2</option>
                        <option value="EXECTIVE_1">EXECTIVE_1</option>
                        <option value="EXECTIVE_2">EXECTIVE_2</option>
                        <option value="GUEST">GUEST</option>
                        <?php
                        $sql = "SELECT *  FROM tbl_trainee";
                        $trainee_data = $con->query($sql);

                        if ($trainee_data->num_rows >= 1) {
                          while ($row = mysqli_fetch_assoc($trainee_data)) :?>
                          <option value="<?php echo $row['Trainee_ID']; ?>">
                            <?php echo $row['Full_Name']; ?>
                          </option>
                          <?php
                        endwhile;
                      } ?>
                    </select>
                  </div>
                  <?php if (isset($_POST["btnSubmit"])) { ?>
                  <span class="text-danger"><?php echo $error; ?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="inputText2" class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="txtusername"
                    id="txtusername"
                    placeholder="Enter User name"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputText2" class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="txtpassword"
                    id="txtpassword"
                    placeholder="Enter Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputText2" class="col-sm-4 control-label">Confirm Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="txtconpassword"
                    id="txtconpassword"
                    placeholder="Re-type password" required>
                  </div>
                  <?php if (isset($_POST["btnSubmit"])) { ?>
                  <span class="text-danger"><?php echo $error1; ?></span>
                  <?php } ?>
                </div>
              </div>

            </div>
          </div>
        </div> <table class="table table-hover table-bordered ">
          <tr>
            <th>NO</th>
            <th>Privilege</th>
            <th>Select</th>
          </tr>
          <?php 
		  $sql = "SELECT *  FROM tbl_accesspoint_discription";
                                    $accesspoint_discription = $con->query($sql);
                                    if ($accesspoint_discription->num_rows >= 1) :
                                        while ($row = mysqli_fetch_assoc($accesspoint_discription)):?>
            <tr>
              <td><?php echo $row["idaccessPoint"]?></td>
              <td><?php echo $row["description"]?></td>
              <td><input type="checkbox" name="cb[]" value="<?php echo $row["idaccessPoint"]?>"></td>
            </tr>
            <?php 
          endwhile;
        endif; ?>
      </table>
      <div> </div>
      <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">
	  </br></br>
    </div>

  </form>
</center>
</body>
</html>