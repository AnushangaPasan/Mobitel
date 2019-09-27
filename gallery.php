
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Gallery</title>


    <?php include("header.php") ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <br><br>
    <div>
      <center>
         <h2>Gallery</h2>
     </center>
 </div>


 <div class="container">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
      <!--   <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol> -->

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <?php
            $result = $con->query(" SELECT * FROM tbl_gallery ");

            while ($row = $result->fetch_assoc()):?>

            <div class="item">
                <img src="<?php echo "Gallery/" . $row['name']; ?>" style="width:100% ; height: 80% ;">
            </div>

            <?php endwhile; ?>

            <div class="item active">
                <img src="Images//home.jpg" style="width:100% ; height: 80% ;">
                <br>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>



</body>
</html>