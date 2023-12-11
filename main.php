   <?php
session_start();


    try{

require("connection.php");

$sql="SELECT * FROM question where active='1' ";
$rs= $db->query($sql);



foreach($rs as $r){
    $d1 =date_create(date(''));
    $d2 =date_create($r[5]);
    $diff=date_diff($d1,$d2);
    $z= $diff->format("%R%a");
   if($z < 0){
    $sqlo="UPDATE question SET active='0' where QID={$r[1]} ";
    $rs8= $db->exec($sqlo);}
}
$sql="SELECT * FROM question where active='1' ";
$rs= $db->query($sql);


$rj= $db->query("SELECT * FROM question where active='0'");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="m.css">
    <title>Document</title>
</head>
<body>

    

    <header>
        <p>Polls Creater</p>
        <nav>
            <a href="login.html">Login</a>
            <a href="signup.html">Register</a>
            <a href="addpoll.html" style="visibility: hidden;" id="1">Create poll</a>
        </nav>
    </header>


    <?php
if(isset($_SESSION['true'])){ 
    $x =$_SESSION['true'];
echo" 
<script>
document.getElementById('1').style.visibility='visible';
</script>  ";
}

?>


    <div class='a1'>
    <h1>Polls for voting</h1>
   
   <?php
foreach($rs as $r){
echo "<a href='?q={$r[1]}&a={$r[2]}&o=1' '> {$r[2]} Category : {$r[3]} </a><br><br>";
}?>

<h1>Polls for viewing</h1>
   
   <?php
foreach($rj as $r){
echo "<a href='?q={$r[1]}&a={$r[2]}&o=0' '> {$r[2]} Category : {$r[3]} </a><br><br>";
}?>
</div>



<div id='a2' >
    
    
<?php


if(isset($_GET['q'])){
$sqs="SELECT * FROM choices where QID={$_GET['q']} ";
$rsl= $db->query($sqs);
$n = $_GET['q'];




echo"<p id='a5'>Qustion:{$_GET["a"]}</p>

<form action='vote.php?q={$n}' method='post'>";


foreach($rsl as $r){
    echo" <input type='checkbox' name='c' value='{$r[1]}'><p class='a4'>{$r[2]}</p><br>";
}


echo"

<input type='submit' id='2' value='vote' style='visibility:visible'>
</form>

<form action='view.php?q={$n}' method='post'>
<input type='submit' id='3' value='view results' style='visibility:visible' ><br><br>

</form>

<form action='end.php?q={$n}' method='post'>
<input type='submit' id='4'  value='End Poll' style='visibility:visible' >
</form>
";}


$ry= $db->query("SELECT * FROM vote where UID={$x} AND QID='$n'");
$row= $ry->fetchAll(PDO::FETCH_NUM);
$t= count($row);
if($t > 0 ||$_GET['o'] == 0){
     echo"
     <script >
        document.getElementById('2').style.visibility='hidden';
     </script> ";
}

$ryl = $db->query("SELECT active FROM question where QID='$n'");
 $x= $ryl->fetch();



if( $x[0] == 1 ){
     echo"
     <script >
        document.getElementById('3').style.visibility='hidden';
     </script> ";
}

?>

</div>





<div id='a3' style="visibility: hidden;" >
    
    
<?php

if(isset($_GET['q'])){
    $sqr="SELECT * FROM choices where qid={$n} ";
    $rslo= $db->query($sqr);
    $rslos= $rslo->fetchALL(PDO::FETCH_NUM);
    
    echo"<p id='a3'>Qustion:{$_GET["a"]} Votes : {$_GET['f']}</p>";
    
    foreach($rslos as $p){
        $s1= $_GET['f'];
        $s2= $p[3];
        $s3 = ($s2/$s1)*100;
        $s4 = ($s2/$s1)*500;
        $EW=round($s4);
        
        echo"<p>{$p[2]} Votes: {$s3}%({$p[3]})</p>";
        echo"<div class='a5'><span class='a6' style='padding-right:{$EW}px'>
        </span><br><br><br><br><br><br><br></div>";
    }
    
}

if(isset($_GET['p'])){
if( $_GET['p'] == 1 ){
     echo"
     <script >
        document.getElementById('a3').style.visibility='visible';
     </script> ";}}
?>

</div>


</body>
</html>
<?php


}catch(PDOException $e){
    die($e->getMessage());
}

?>