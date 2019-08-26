<?php
/**
 * Created by PhpStorm.
 * User: sandunprageeth
 * Date: 12/4/2017
 * Time: 3:14 PM
 */
$servername = "172.19.10.20";
$username = "root";
$password = "inoc@123";
$dbname = "ims_inoc";

    //create connection
    //$con = mysqli_connect("localhost", "root", "", "ims_inoc");

$con = new mysqli($servername, $username, $password, $dbname);
?>
