<?php include('header.php'); ?>


<?php

$db_host = 'localhost';
$db_name = 'cvmotor';
$db_login = 'root';
$db_pw = '';
$bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_login, $db_pw);


$request = 'SELECT * FROM cv';
$response = $bdd->query($request);


while($data = $response->fetch()){
	echo 'Name: ' . $data['name'];
	echo '<br/>FirstName: ' . $data['firstname'];
}




$response->closeCursor();
?>