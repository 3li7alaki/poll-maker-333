<?php

try{

    require("connection.php");
    
    $q=$_GET['q'];
    $sql="SELECT count(QID) FROM vote  where QID={$q}  ";
    $rs= $db->query($sql);
    $w = $rs->fetch(PDO::FETCH_NUM);

    $r = $w[0];

    $rs= $db->exec("UPDATE question SET result={$r} WHERE QID={$q}");
    
    $mm="SELECT CID FROM vote where QID='$q'";
    $rso= $db->query($mm);
    $rsos=$rso->fetchAll(PDO::FETCH_NUM);
    
    
    
    
    foreach($rsos as $j){
        echo $j[0]."<br>";
        
        $mm="SELECT count(CID) FROM vote where CID='$j[0]'";
        $rso= $db->query($mm);
        $rsos=$rso->fetch(PDO::FETCH_NUM);
        $c = $rsos[0];
        
        $rm= $db->exec("UPDATE choices SET result={$c} WHERE CID='$j[0]'");
        
        
    }
    
    
    
    
    
    
    
    $sl="SELECT Question FROM question  where QID={$q}  ";
    $rsi= $db->query($sl);
    $wi = $rsi->fetch(PDO::FETCH_NUM);
    $b = $wi[0];
    
    
    
    header("location:main.php?q={$q}&o=0&a={$b}&p=1&f={$r}");
    
    
}catch(PDOException $e){
    die($e->getMessage());
}




?>