<?php

try{

    require("connection.php");
    
    $q=$_GET['q'];
    $sql="SELECT count(QID) FROM vote  where QID={$q}  ";
    $rs= $db->query($sql);
    $w = $rs->fetch(PDO::FETCH_NUM);

    $r = $w[0];

    $rs= $db->exec("UPDATE question SET active='0' WHERE QID={$q}");
   
    
    
    header("location:main.php?q={$q}&o=0&a={$b}&p=0");
    
    
}catch(PDOException $e){
    die($e->getMessage());
}




?>