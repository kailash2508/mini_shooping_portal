<?php
$db = mysqli_connect("localhost", "root", "", "registration");
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = mysqli_real_escape_string($db, $_POST['id']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$category = mysqli_real_escape_string($db, $_POST['category']);
		$image = mysqli_real_escape_string($db, $_POST['image']);
		$price=mysqli_real_escape_string($db,$_POST['price']);
$sql = "INSERT INTO tb1_product (id, name, category,image,price) VALUES ('$id','$name', '$category', '$image','$price')";
if(mysqli_query($db, $sql)){
    echo "<script>alert('Records inserted successfully.')</script>";
    header('location:productdetail.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
mysqli_close($db);
?>