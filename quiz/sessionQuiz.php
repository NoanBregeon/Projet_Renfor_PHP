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

$sql= 'SELECT count(operation_type) FROM questions WHERE operation_type="addition"';
$temp = $pdo->query($sql);
$_SESSION["total+"]=$temp->fetch();
$sql= 'SELECT count(operation_type) FROM questions WHERE operation_type="soustraction"';
$temp = $pdo->query($sql);
$_SESSION["total-"]=$temp->fetch();
$sql= 'SELECT count(operation_type) FROM questions WHERE operation_type="multiplication"';
$temp = $pdo->query($sql);
$_SESSION["total*"]=$temp->fetch();
$sql= 'SELECT count(operation_type) FROM questions WHERE operation_type="division"';
$temp = $pdo->query($sql);
$_SESSION["total%"]=$temp->fetch();

$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=1 AND operation_type="addition"';
$temp = $pdo->query($sql);
$_SESSION["niv1+"]=$temp->fetch();
$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=1 AND operation_type="soustraction"';
$temp = $pdo->query($sql);
$_SESSION["niv1-"]=$temp->fetch();
$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=1 AND operation_type="multiplication"';
$temp = $pdo->query($sql);
$_SESSION["niv1*"]=$temp->fetch();
$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=1 AND operation_type="division"';
$temp = $pdo->query($sql);
$_SESSION["niv1%"]=$temp->fetch();

$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=2 AND operation_type="addition"';
$temp = $pdo->query($sql);
$_SESSION["niv2+"]=$temp->fetch();
$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=2 AND operation_type="soustraction"';
$temp = $pdo->query($sql);
$_SESSION["niv2-"]=$temp->fetch();
$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=2 AND operation_type="multiplication"';
$temp = $pdo->query($sql);
$_SESSION["niv2*"]=$temp->fetch();
$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=2 AND operation_type="division"';
$temp = $pdo->query($sql);
$_SESSION["niv2%"]=$temp->fetch();

$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=3 AND operation_type="addition"';
$temp = $pdo->query($sql);
$_SESSION["niv3+"]=$temp->fetch();
$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=3 AND operation_type="soustraction"';
$temp = $pdo->query($sql);
$_SESSION["niv3-"]=$temp->fetch();
$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=3 AND operation_type="multiplication"';
$temp = $pdo->query($sql);
$_SESSION["niv3*"]=$temp->fetch();
$sql= 'SELECT count(difficulty) FROM questions WHERE difficulty=3 AND operation_type="division"';
$temp = $pdo->query($sql);
$_SESSION["niv3%"]=$temp->fetch();




?>