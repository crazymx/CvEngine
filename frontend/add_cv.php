<?php include('header.php'); ?>

<p>Hello !</p>

<?php 
	$name = $_POST['name'];
	$firstname = $_POST['firstname'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	$zipcode = $_POST['zipcode'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$phone = $_POST['phone'];
	$licence = $_POST['licence'];
	$hobbies = $_POST['hobbies'];
?>

<p>
name:  <?php echo $name ?><br/>
firstname:  <?php echo $firstname ?><br/>
name:  <?php echo $dob ?><br/>
name:  <?php echo $address ?><br/>
name:  <?php echo $zipcode ?><br/>
name:  <?php echo $city ?><br/>
name:  <?php echo $country ?><br/>
name:  <?php echo $phone ?><br/>
name:  <?php echo $licence ?><br/>
name:  <?php echo $hobbies ?><br/>
</p>

<p><a href="form_add_cv.php">Back</a></p>