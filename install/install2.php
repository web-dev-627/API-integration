<html>
<head><title> Installation of the Site</title>
<link rel="stylesheet" href="main.css" />
</head>
<body id="install">
<h2> Installation of the site!</h2>
<form class="install" method="post" action="install.php">
	<h3> Please fill all the fields</h3>
</form>
<form class="install" action="install2.php" method="post">
	<h3>Admin's Details </h3>
	<label><b>Username:</b><input type="text" name="a_user" autocomplete="off" />&nbsp;&nbsp; Admin Username</label><br><hr>
	<label><b>Password:</b><input type="text" name="a_pass" autocomplete="off" />&nbsp;&nbsp; Admin Password</label><br><hr>
	<label><b>Email:</b><input type="text" name="a_email" autocomplete="off" />&nbsp;&nbsp; Admin Email</label><br><hr>

	<input class="button" type="submit" value="Install Now" name="install" />
</form>

<div class="info">
	<h4>Information!</h4>
	<p class="install2">This will create your Administrator account. These are the basic informations which is required. You can access other setting later though Admin Control Panel.<br><br><font color="#c00">If you are facing any problem, delete the complete database and start the installation again.</font></p>
</div>

<?php 
include ('../includes/database.php');

$con = dbCon();

if (isset($_POST['install'])){
	if($_POST['a_user'] == NULL) { echo "<div class=\"error\">Enter your USERNAME</div>"; }
	if($_POST['a_pass'] == NULL) { echo "<div class=\"error\">Enter your PASSWORD</div>"; }
	if($_POST['a_email'] == NULL) { echo "<div class=\"error\">Enter your EMAIL ADDRESS</div>"; }
		
	else if(isset($_POST['install'])) {
	
		$admin = $_POST['a_user'];
		$pass = $_POST['a_pass'];
		$password = sha1($pass);
		$email = $_POST['a_email'];
		$error = 0;

		
			$query1 = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `shop_admins` (
						`id` int(11) NOT NULL auto_increment,
						`username` varchar(255) NOT NULL,
						`password` varchar(255) NOT NULL,
						`email` varchar(255) NOT NULL,
						PRIMARY KEY (`id`) )
						ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;");	
				if($query1) { echo 'admin - yes'; }
				else { $error=1; echo "<div class=\"error\">Error creating table `admins`</div>".mysqli_error($con); }
			$query1b = mysqli_query($con, " INSERT INTO `shop_admins` (`id`, `username`, `password`, `email`) VALUES
						(NULL, '$admin', '$password', '$email')");
				if($query1b) { echo 'admin Filled - yes'; }
				else { $error=1; echo "<div class=\"error\">Error filling table `admins`</div>".mysqli_error($con); }
				
				$query2 = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `shop_tyres` (
						`id` int(11) NOT NULL auto_increment,
						`category` varchar(255) NOT NULL,
						`brand` varchar(255) NOT NULL,
						`model` varchar(255) NOT NULL,
						`speed` varchar(255) NOT NULL,
						`load` varchar(255) NOT NULL,
						`size` varchar(255) NOT NULL,
						`price` varchar(255) NOT NULL,
						`fuel` varchar(10) NOT NULL,
						`grip` varchar(10) NOT NULL,
						`noise` varchar(10) NOT NULL,
						`image` varchar(255) NOT NULL,
						`recommended` int(10) NOT NULL,
						`season` varchar(100) NOT NULL,
						`misc` text,
						PRIMARY KEY (`id`) )
						ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;");	
				if($query1) { echo 'tyres - yes'; }
				else { $error=1; echo "<div class=\"error\">Error creating table `tyres`</div>".mysqli_error($con); }
				
				$q = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `shop_orders` (
						`id` int(11) NOT NULL auto_increment,
						`orderID` varchar(100) NOT NULL,
						`orderedOn` varchar(255) NOT NULL,
						`name` varchar(255) NOT NULL,
						`regNr` varchar(255) NOT NULL,
						`mobile` varchar(255) NOT NULL,
						`email` varchar(255) NOT NULL,
						`brand` varchar(255) NOT NULL,
						`size` varchar(255) NOT NULL,
						`tyres` varchar(255) NOT NULL,
						`price` varchar(255) NOT NULL,
						`changeDate` varchar(255) NOT NULL,
						`status` varchar(255) NOT NULL,
						`misc` varchar(255) NOT NULL,
						`tyreID` int(10) NOT NULL,
						`customerID` int(10) NOT NULL,
						PRIMARY KEY (`id`) )
						ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;");	
				if($q) { echo 'shop_orders - yes'; }
				else { $error=1; echo "<div class=\"error\">Error creating table `shop_orders`</div>".mysqli_error($con); }
				
				$q = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `shop_misc` (
						`id` int(20) NOT NULL auto_increment,
						`property` varchar(200) NOT NULL,
						`attribute1` varchar(255) NOT NULL,
						`attribute2` varchar(255) NOT NULL,
						`attribute3` varchar(255) NOT NULL,
						`attribute4` varchar(255) NOT NULL,
						`attribute5` varchar(255) NOT NULL,
						PRIMARY KEY (`id`) )
						ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;");
				if($q) { echo 'misc - yes'; }
				else { $error=1; echo "<div class=\"error\">Error creating table `misc`</div>".mysqli_error($con); }
				
				$q = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `shop_contact` (
						`id` int(20) NOT NULL auto_increment,
						`date` varchar(100) NOT NULL,
						`name` varchar(200) NOT NULL,
						`email` varchar(255) NOT NULL,
						`phone` varchar(255) NOT NULL,
						`subject` varchar(255) NOT NULL,
						`message` TEXT NULL,
						`misc` TEXT NULL,
						PRIMARY KEY (`id`) )
						ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;");
				if($q) { echo 'misc - yes'; }
				else { $error=1; echo "<div class=\"error\">Error creating table `contact`</div>".mysqli_error($con); }
				
				$q = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `shop_stock` (
						`id` int(20) NOT NULL auto_increment,
						`tyreID` int(20) NOT NULL,
						`stock` int(20) NOT NULL,
						`ordered` int(20) NOT NULL,
						`misc` TEXT NULL,
						PRIMARY KEY (`id`) )
						ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;");
				if($q) { echo 'misc - yes'; }
				else { $error=1; echo "<div class=\"error\">Error creating table `stock`</div>".mysqli_error($con); }
				
				$q = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `shop_customers` (
						`id` int(20) NOT NULL auto_increment,
						`createdOn` varchar(100) NOT NULL,
						`username` varchar(200) NOT NULL,
						`password` varchar(255) NOT NULL,
						`fullName` varchar(255) NOT NULL,
						`email` varchar(255) NOT NULL,
						`regNr` varchar(255) NOT NULL,
						`mobile` varchar(255) NOT NULL,
						`postCode` varchar(255) NOT NULL,
						`address` varchar(255) NOT NULL,
						`city` varchar(255) NOT NULL,
						`misc` TEXT NULL,
						PRIMARY KEY (`id`) )
						ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;");
				if($q) { echo 'misc - yes'; }
				else { $error=1; echo "<div class=\"error\">Error creating table `customers`</div>".mysqli_error($con); }
	
			
	if($error == 0) {
		echo "<div class=\"info\"><font color=\"green\"><p class=\"install2\"><b>THE SCRIPT INSTALLATION IS COMPLETE!!!</b></font><br><br>
					<font color=\"#c00\"><b>NOW DELETE THE 'install' FOLDER</b></font><br><br>
					You can now login in to your <a href=\"../admin/index.php\">Admin Panel</a><br><br>
					Admin Username: <b>".$admin."</b><br>
					Admin Password: <b>".$pass."</b>				
					<p></div><br>";
	}
				
} }
	 
	 
	 
?>







</body>
</html>
