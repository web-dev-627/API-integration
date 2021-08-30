<!DOCTYPE HTML>
<html><head>
<title>Installation</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>
<body id="install">
<h2>Installation of the site!</h2>
	<form action="install.php" method="post" >
		<h3> Please fill all the fields</h3>
		<hr>
		<label><b>Hostname:</b> <input type="text" name="hostname" autocomplete="off">&nbsp; &nbsp;Database Hostname(Usually localhost)</label><br><hr>
		<label><b>Database:</b> <input type="text" name="database" autocomplete="off" >&nbsp; &nbsp;Database Name</label><br><hr>
		<label><b>Username:</b> <input type="text" name="db_user" autocomplete="off">&nbsp; &nbsp;Database Username</label><br><hr>
		<label><b>Password:</b> <input type="password" name="db_pass" autocomplete="off">&nbsp; &nbsp;Database Password</label><br><hr>
		<input class="button" type="submit" name="submit" value="Create Database!" />
	</form>
<div class="info"> 
	<h4> Information!</h4>
	<p class="install">Hey! <br> This is the installation process of your website.<br><br><font color="red">The folder /includes/database/ must be writable(chmod 777)</font>. It can be dont using the FTP Client.<br><br> Enter your database details. It can be found from your Control Panel of your hosting site.<br><br> If you encounterred any error then you can contact first your hosting site for these details and if even that doesn't solves the problem then i'm always ready to help you at [mukim15@gmail.com]</p>
</div>

<?php
if (isset($_POST['submit'])){
	if($_POST['hostname'] == NULL) { echo "<div class=\"error\">Enter your HOSTNAME</div>"; }
	if($_POST['database'] == NULL) { echo "<div class=\"error\">Enter your DATABASE name</div>"; }
	if($_POST['db_user'] == NULL) { echo "<div class=\"error\">Enter your DATABASE USERNAME</div>"; }
	

	
	else if(isset($_POST['submit'])){
    $host = $_POST['hostname'];
    $database = $_POST['database'];
    $user = $_POST['db_user'];
    $password = $_POST['db_pass'];
    $archivo = '../includes/database.php';
    $fp = fopen($archivo, "w");
    $string = '<?php
                $host =		"'.$host.'";
                $user =		"'.$user.'";
                $passwd =	"'.$password.'";
                $db =		"'.$database.'";
				$con = mysqli_connect($host,$user,$passwd,$db);
               ?>';
    $write = fputs($fp, $string);
    fclose($fp);
	$link = mysqli_connect("$host", "$user", "$password");
	if($link) {
				Echo "<div class=\"success\"> connected</div>";
		$sql = "CREATE DATABASE ".$database;
			if(mysqli_query($link, $sql)){ 
				header('Location: install2.php');
			}
			else {	echo mysqli_error($link); }
    
    }
	else { echo "<div class=\"error\"> Could not connect to MySQL. Check your details</div>"; }
	}

}
?>



</body>
</html>                                 
