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
				<a href="home.php" class="nav-link">Home</a>
			</li>
			<li class="nav-item">
				<a href="register.php" class="nav-link">Registration</a>
			</li>
			<li class="nav-item">
				<a href="login.php" class="nav-link active">Login</a>
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
				<h3>Login</h3>
				<form method="post" action="login.php">
					<table>
						<tr>
							<td><label>Username</label></td>
							<td><input type="text" name="username" required></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td><input type="password" name="pass" required></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Login"></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<?php 
      if (isset($_POST['submit'])) {
      	$username = $_POST['username'];
      	$pass = $_POST['pass'];
      	$encrypted_pass = md5($pass);
      	$select_query = "SELECT * FROM customers WHERE username = '$username' AND password = '$encrypted_pass'";
      	$result = mysqli_query($con,$select_query);
      	if (mysqli_num_rows($result) > 0) {
      		$row = mysqli_fetch_array($result);
      		$_SESSION['id'] = $row['id'];
      		$_SESSION['fname'] = $row['first_name'];
      		header('location:main.php');
      	} else {
      		echo "Invalid username or password";
      	}
      }
 	 ?>
 
 </body>
 </html>