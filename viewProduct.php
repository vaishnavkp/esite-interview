<?php 
session_start();
$con = mysqli_connect('localhost','root','','machinetest');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Machine Test</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<style type="text/css">
		header {
			background-color: darkorange;
			height: 50px;
		}
		table,td {
			padding: 3px;
		}
	</style>
</head>
<body>
	<header>
		<h3>Shopping Site</h3>
	</header>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="uploadPic.php" class="nav-link">Upload Profile Pic</a>
			</li>
			<li class="nav-item">
				<a href="editProfile.php" class="nav-link">Edit Profile</a>
			</li>
			<li class="nav-item">
				<a href="addProduct.php" class="nav-link">Add Products</a>
			</li>
			<li class="nav-item">
				<a href="viewProduct.php" class="nav-link active">View Products</a>
			</li>
		</ul>
	</nav>

</body>
</html>