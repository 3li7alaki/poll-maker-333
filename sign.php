<?php

require("connection.php");

try{

// Password requirements :length is (8,16), at least [ one Uppercase letter ,one special character , one digit]  
$reg = "/(?=.*[A-Z])(?=.*[0-9])(?=.*[@#%_\*\-]){8,16}/";

if(preg_match($reg,$_POST['pass'])){


    $pass = $_POST['pass'];
    $hps = password_hash($pass,PASSWORD_DEFAULT);
    $un =$_POST['un'];
    $email =$_POST['email'];

    $sql = "INSERT into users VALUES('','$un','$email','$hps')";
    $db->exec($sql);
    echo"Signed Successfully";

    

}else{
    die("Unable to sign-up try again!");
}
}catch(PDOException $e){
    die($e->getMessage());
}

?>