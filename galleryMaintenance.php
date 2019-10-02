<?php
include("db.php");
$error = $msg_success = "";



if (isset($_POST['upload'])) {

    $fileName = $_FILES['image']['name'];
    $fileTmpLoc = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];
    $fileErrorMsg = $_FILES["image"]['error'];


      $sql="SELECT * FROM `tbl_gallery` WHERE name='". $fileName."'";
    $resultSet= $con->query($sql);

   echo $fileSize;

    if ($fileSize == 0 ) {
         $error = "Please select image";
    }else if ($fileSize >=2097152) {
         $error = "Your image file too large";
    }

    else if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
        $error = "Your image file was not jpg, jpeg, gif or png type";

    } 
    else if (strlen($fileName) >= 50) {
        $error = "File name less than 50 character";

    }
     else if (!preg_match("/^[a-zA-Z0-9\.\_\s\-]+$/", $fileName)) {
        $error ='Invalid file name (eg. " '. "'".'|;:<>!^+={}?@#$&*()%~`[])'.' can'."'".'t use';

    } 

    if(empty($error)){

           if ($resultSet->num_rows >=1){
                    $error="Image already exist";
                   
            }else{
                 $image = $_FILES['image']['name'];
        $target = "Gallery/" . basename($_FILES['image']['name']);

        ///////////////////////  UPLOAD FILE  /////////////////////

        $upload_image = "INSERT INTO tbl_gallery(name) VALUE ('$image')";
        if ($con->multi_query($upload_image)) {

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg_success = "Image uploaded successfully";
            } else {
                $error = "There was a problem uploading image";
            }

        }
            }

       

    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery Maintenance</title>
    <?php include("header.php") ?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<br><br><br>
  <center>
    <h2>Gallery Maintenance</h2>
  </center>
       
    <div class="container-fluid col-md-6 col-md-offset-3" style="margin-top: 50px;">

       <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
        <div class="container col-md-12  ">
          <div class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Upload Image</h4>
            </div>
            <?php if (!empty($msg_success)) { ?>
        <div class="col-sm-10 col-sm-offset-1 alert alert-success text-center" role="alert">
            <?php echo $msg_success ?>
        </div>
        <?php } ?>

        <?php if (!empty($error)) { ?>
        <div class="col-sm-10 col-sm-offset-1 alert alert-danger text-center" role="alert">
            <?php echo $error ?>
        </div>
        <?php } ?>
            <div class="row" style="margin-top: 30px;">

                <div class="col-sm-2 col-sm-offset-1 ">
                    <input type="file" name="image" class="btn btn-info waves-effect waves-light m-b-5"/>
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="upload" class="btn btn-info waves-effect waves-light m-b-5"
                    style="margin-left: 200px; margin-bottom: 30px;" id="insert"><i class="fa fa-cloud m-r-5"></i>
                    <span>Upload Image</span>
                </button>
            </div>

        </div>


        

    </div>

</form>

<form action="" method="post" enctype="multipart/form-data">



</form>

</div>
</body>
</html>
