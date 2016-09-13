<form action="home.php">
	<input type="submit" value="Home">
</form>

<?php
	//class auto loading
	function loadClass($class){
	  require $class . '.php';
	}
	spl_autoload_register('loadClass');

?>