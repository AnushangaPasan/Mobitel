<?php include("db.php"); ?>
<?php
$msg = $msger = "";

$username = $new_password =$access_ids =$User_err="";
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
    
   
    
  if ($_POST['v_user']==0) {
   $User_err="please select user";
  }else{
    $userID=$_POST['v_user'];
  }


    
    
      
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
                   <label for="inputText2" class="col-sm-4 control-label">Users Name</label>
                    
                                    <div class="col-sm-8">
                                        <select class="form-control" name="v_user" id="v_Institute_Code" autofocus="autofocus">
                                            <option value="0">--SELECT--</option>
                                            <?php
                                            $sql = "SELECT *  FROM tbl_user ";
                                            $user_data = $con->query($sql);
                                            if ($user_data->num_rows >= 1) :

                                                while ($row = mysqli_fetch_assoc($user_data)) :?>
                                                    <option value="<?=$row["tbl_userID"]?> ">
                                                        <?=$row["username"] ?> 
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

          if($accesspoint_discription!=NULL){
            foreach ($accesspoint_discription as $result):?>
            <tr>
              <td><?php echo $result["idaccessPoint"]?></td>
              <td><?php echo $result["description"]?></td>
              <td><input type="checkbox" name="cb[]" value="<?php echo $result["idaccessPoint"]?>"></td>
            </tr>
            <?php 
          endforeach;
        } ?>
      </table>
      <div> </div>
      <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnSubmit">
    </div>

  </form>
</center>
</body>
</html>