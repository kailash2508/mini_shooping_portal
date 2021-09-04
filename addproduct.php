<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "registration");
if(strlen($_SESSION['alogin'])==0){
    header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mini Mart</title>
    <link rel="icon"  href="logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,600">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Work+Sans">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Oswald:300,700|Varela+Round">
</head>
<body style="background-color: #f5f5f5;">
<?php include('header1.php') ?>
<div class="container">
<form  method="post" action="add.php">
<div class="card mx-auto mt-5" style="width: 25rem;max-width: 330px;">
<div class="card-body">
<h1 class="card-title" align="center">Add Product</h1>
<div class="form-floating mt-3">
<input type="text" placeholder="Enter Name" name="name" class="form-control" id="name" required>
<label for="name"><b>Name</b></label>
</div>
<div class="form-floating mt-3">
<?php
$query = "SELECT DISTINCT category FROM tb1_product";
$result = mysqli_query($connect, $query);
?>
<datalist id="category">
    <?php while($row = mysqli_fetch_array($result)) { ?>
        <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
    <?php } ?>
</datalist>
<input type="text" placeholder="Enter category" name="category" class="form-control" autocomplete="off" list="category" required>
<label for="category"><b>Category</b></label>
</div>
<div class="form-floating mt-3">
<input type="text" placeholder="Enter image" name="image" class="form-control" required>
<label for="image"><b>Image</b></label>
</div>
<div class="form-floating mt-3 mb-3">
<input type="text" placeholder="Enter price" name="price" class="form-control" required>
<label for="price"><b>Cost</b></label>
</div>
<button type="submit" class="btn btn-primary mb-4"/>ADD PRODUCT</button>
</div>
</form>
</div>
</body>
</html>
<?php } ?>