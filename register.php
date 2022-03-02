<?php 
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
				<a href="home.php" class="nav-link">Home</a>
			</li>
			<li class="nav-item">
				<a href="register.php" class="nav-link active">Registration</a>
			</li>
			<li class="nav-item">
				<a href="login.php" class="nav-link">Login</a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="nav-link">Logout</a>
			</li>
		</ul>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<h3>Registration</h3>
				<form method="post" action="register.php">
					<table>
						<tr>
							<td><label>First Name</label></td>
							<td><input type="text" name="fName" required></td>
						</tr>
						<tr>
							<td><label>Last Name</label></td>
							<td><input type="text" name="lName" required></td>
						</tr>
						<tr>
							<td><label>Email</label></td>
							<td><input type="email" name="email" required></td>
						</tr>
						<tr>
							<td><label>Mobile Number</label></td>
							<td><input type="text" name="number" required></td>
						</tr>
						<tr>
							<td><label>Username</label></td>
							<td><input type="text" name="username" required></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td><input type="password" name="pass" required></td>
						</tr>
						<tr>
							<td><label>Re-enter Password</label></td>
							<td><input type="password" name="rPass" required></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Register"></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

	<?php 
    if (isset($_POST['submit'])) {
    	$fName = $_POST['fName'];
    	$lName = $_POST['lName'];
    	$email = $_POST['email'];
    	$number = $_POST['number'];
    	$username = $_POST['username'];
    	$pass = $_POST['pass'];
    	$encrypted_pass = md5($pass);
    	$rPass = $_POST['rPass'];
    	if ($pass == $rPass) {
    		$select_query = "SELECT * FROM customers WHERE username = '$username' OR password = '$pass'";
    		$result = mysqli_query($con,$select_query);
    		if (mysqli_num_rows($result) > 0) {
    			echo "This username or password already exists.";
    		} else {
    			$insert_query = "INSERT INTO customers(first_name,last_name,email,mobile_number,username,password)VALUES('$fName','$lName','$email','$number','$username','$encrypted_pass')";
    			 mysqli_query($con,$insert_query);
    			header('location:login.php');
    		}
    	} else {
    		echo "Password and re-entered password are not matching";
    	}


    }
 

	 ?>

</body>
</html>