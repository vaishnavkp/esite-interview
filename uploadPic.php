<?php 
session_start();
$con = mysqli_connect('localhost','root','','machinetest');
$id = $_SESSION['id'];
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
				<a href="uploadPic.php" class="nav-link active">Upload Profile Pic</a>
			</li>
			<li class="nav-item">
				<a href="editProfile.php" class="nav-link">Edit Profile</a>
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
				<h3>Upload Profile Pic</h3>
				<form method="post" action="uploadPic.php" enctype="multipart/form-data">
					<table>
						<tr>
							
							<td><input type="file" name="file"></td>
						</tr>
						<tr>
							
							<td><input type="submit" name="submit" value="Upload"></td>
						</tr>
					</table>

				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<?php 
      if (isset($_POST['submit'])) {
      	$pname = $_FILES['file']['name'];
      	$tname = $_FILES['files']['tmp_name'];
      	
      }
	 ?>

</body>
</html>