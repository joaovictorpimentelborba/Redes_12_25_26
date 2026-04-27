<?php

$con = mysqli_connect('localhost','root','root', '',3306);

$sql = "CREATE DATABASE IF NOT EXISTS db_frutas";
mysqli_query($con, $sql);

header("Location: index.php");
exit();

?>