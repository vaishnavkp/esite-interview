<?php 
session_start();
$con = mysqli_connect('localhost','root','','machinetest');
$id = $_SESSION['id'];
$select_query = "SELECT * FROM customers WHERE id = '$id'";
$result = mysqli_query($con,$select_query);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_array($result);
}



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
				<a href="editProfile.php" class="nav-link active">Edit Profile</a>
			</li>
			<li class="nav-item">
				<a href="addProduct.php" class="nav-link">Add Products</a>
			</li>
			<li class="nav-item">
				<a href="viewProduct.php" class="nav-link">View Products</a>
			</li>
		</ul>
	</nav>
		<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<h3>Edit Profile</h3>
				<form method="post" action="editProfile.php">
					<table>
						<tr>
							<td><label>First Name</label></td>
							<td><input type="text" name="fName" value="<?= $row['first_name'] ?>" required></td>
						</tr>
						<tr>
							<td><label>Last Name</label></td>
							<td><input type="text" name="lName" value="<?= $row['last_name'] ?>" required></td>
						</tr>
						<tr>
							<td><label>Email</label></td>
							<td><input type="email" name="email" value="<?= $row['email'] ?>" required></td>
						</tr>
						<tr>
							<td><label>Mobile Number</label></td>
							<td><input type="text" name="number" value="<?= $row['mobile_number'] ?>" required></td>
						</tr>
						<tr>
							<td><label>Username</label></td>
							<td><input type="text" name="username" value="<?= $row['username'] ?>" required></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td><input type="password" name="pass" value="<?= $row['password'] ?>" required></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Edit"></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<?php 
     if (isset($_POST['submit'])) {
     	$fname = $_POST['fName'];
     	$lname = $_POST['lName'];
     	$email = $_POST['email'];
     	$number = $_POST['number'];
     	$username = $_POST['username'];
     	$pass = $_POST['pass'];
     	$encrypted_pass = md5($pass);
     	$sql = "UPDATE customers SET first_name = '$fname',last_name = '$lname',email = '$email',mobile_number = '$number',username = '$username',password = '$encrypted_pass' WHERE id = '$id'";
     	$result = mysqli_query($con,$sql);
     	header('location:main.php');
     }

	 ?>

</body>
</html>