<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "registration");
if(strlen($_SESSION['id'])==0){
	header('location:welcome.php');
}
else{
	$category=$_GET['category'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mini Mart</title>
	  <link rel="icon"  href="logo.png" type="image/x-icon">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,600">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Work+Sans">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Oswald:300,700|Varela+Round">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #f5f5f5;">
 <?php include('header.php');?>
<div class="container mt-5">
	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
			<?php
				$query = "SELECT * FROM tb1_product WHERE category like '$category'";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{

				?>
				<div class="col">
					<div class="card" style="border:1px solid #333; border-radius:5px;">
				<form method="post" action="home.php?action=add&id=<?php echo $row["id"]; ?>">
					<div class="align-center">
						<img id="car" src="images/<?php echo $row["image"]; ?>" class="mx-auto d-block" style="height: 220px;width: auto; max-width: 280px;" />
					</div>
					<div class="card-body py-3 text-center">
						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">Rs <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" placeholder="Enter the quantity" class="form-control" required/>
						<input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<button type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-primary" value="Add to Cart">ADD to Cart</button>
					</div>
				</form>
			</div>
		</div>
			<?php
					}
				}
			?>
	</div>
</div>
</body>
</html>
<?php 
} ?>