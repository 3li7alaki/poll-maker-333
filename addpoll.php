<?php
session_start();

try{

    require("connection.php");

    $s = $_SESSION['true'];

    $q = $_POST['q'];
    $cat = $_POST['cat'];
    $c = $_POST['c'];
    $ed = $_POST['ed'];
    

    $sql="INSERT INTO question values('$s',null,'$q','$cat',1,'$ed','0') ";

    $db->exec($sql);

    $sql="SELECT * From question Where Question='$q'";

    $rs=$db->query($sql);
    $row = $rs->fetch(PDO::FETCH_NUM);
    $m = $row[1];


    foreach($c as $c1){
    $sql="INSERT INTO Choices values('$m',null,'$c1','0') ";
    $db->exec($sql);
    }

    header("location:main.php");




}catch(PDOException $e){

    die($e->getMessage());
}


?>