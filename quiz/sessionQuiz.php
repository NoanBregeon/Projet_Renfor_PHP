<?php
$_SESSION["total+"]=0;
$_SESSION["niv1+"]=0;
$_SESSION["niv2+"]=0;
$_SESSION["niv3+"]=0;
$_SESSION["total-"]=0;
$_SESSION["niv1-"]=0;
$_SESSION["niv2-"]=0;
$_SESSION["niv3-"]=0;
$_SESSION["total*"]=0;
$_SESSION["niv1*"]=0;
$_SESSION["niv2*"]=0;
$_SESSION["niv3*"]=0;
$_SESSION["total%"]=0;
$_SESSION["niv1%"]=0;
$_SESSION["niv2%"]=0;
$_SESSION["niv3%"]=0;

$sql= 'SELECT * FROM questions';
$temp = $pdo->query($sql);
$resultats=$temp->fetch();
?>