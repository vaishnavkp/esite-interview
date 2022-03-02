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
				<a href="uploadPic.php" class="nav-link">Upload Profile Pic</a>
			</li>
			<li class="nav-item">
				<a href="editProfile.php" class="nav-link">Edit Profile</a>
			</li>
			<li class="nav-item">
				<a href="addProduct.php" class="nav-link active">Add Products</a>
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
				<h3>Add Products</h3>
				<form method="post" action="addProduct.php" enctype="multipart/form-data">
					<table>
						<tr>
							<td><label>Product Name</label></td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<td><label>Product Category</label></td>
							<td><select name="category">
								<option selected disabled>Select Category</option>
								<option>Phones</option>
								<option>Jeans</option>
								<option>Laptops</option>
                                <option>Shirt</option>
							</select></td>
						</tr>
						<tr>
							<td><label>Product Price</label></td>
							<td><input type="text" name="price"></td>
						</tr>
						<tr>
							<td><label>Description</label></td>
							<td><input type="text" name="description"></td>
						</tr>
						<tr>
							<td><label>Product Image</label></td>
							<td><input type="file" name="fileToUpload"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Add"></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<?php 
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$target_dir = 'Files/';
	$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
		$sql = "INSERT INTO products(product_name,product_category,product_price,description,product_image,customer_id)VALUES('$name','$category','$price','$description','$target_file',$id)";
		mysqli_query($con,$sql);
	}
}
      

	 ?>

</body>
</html>