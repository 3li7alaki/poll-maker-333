<?php
session_start();

try{

    require("connection.php");

    
    echo $_POST['c'];
    $s = $_SESSION['true'];

 
        
            $sql="INSERT INTO vote VALUES({$s},null,{$_GET['q']},{$_POST['c']}) ";
            $rs= $db->exec($sql);




    header("location:main.php?l={$_GET['q']}");

    



    
}catch(PDOException $e){
    die($e->getMessage());
    }

?>