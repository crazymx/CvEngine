<?php include('header.php'); ?>

<h2>Liste des CV</h2>
<?php
/*
$db_host = 'localhost';
$db_name = 'cvmotor';
$db_login = 'root';
$db_pw = '';
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_login, $db_pw);


$request = 'SELECT * FROM cv';
$response = $db->query($request);


while($data = $response->fetch()){
	echo 'Name: ' . $data['name'];
	echo '<br/>FirstName: ' . $data['firstname'];
}*/

$db = new PDO('mysql:host=localhost;dbname=cvmotor', 'root', '');
$manager = new CvManager($db);

$cvList = [];
$cvList = $manager->getList();
$len = count($cvList);
//$cvList[$len-1]->show();


foreach ($cvList as $key) {
	$key->show();
}





//$response->closeCursor();
?>