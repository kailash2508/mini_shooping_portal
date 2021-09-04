<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "registration");
if(strlen($_SESSION['alogin'])==0){
    header('location:welcome.php');
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
</head>
<body style="background-color: #f5f5f5;">
<?php include('header1.php') ?>
<div class="container pt-3 pb-5">
    <h2 class="text-center">ORDER DETAILS</h2>
    <div class="table-responsive" style="overflow: auto;">
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th width="3%">id</th>
                    <th width="5%">Name</th>
                    <th width="5%">Mobile No</th>
                    <th width="5%">Pin code</th>
                    <th width="5%">Address</th>
                    <th width="5%">Product Id</th>
                    <th width="5%">Product name</th>
                    <th width="5%">price</th>
                    <th width="5%">quantity</th>
                    <th width="5%">Total Cost</th>
                    <th width="5%">Order Date</th>
                    <th width="5%">ACTION</th>
                </tr>
            </thead>
            <?php
            $query = "SELECT * FROM orders ORDER BY id ASC";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
            ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["fullname"]; ?></td>
                <td><?php echo $row["mobile"]; ?></td>
                <td><?php echo $row["pincode"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["productId"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td>Rs.<?php echo $row["price"]; ?></td>
                <td><?php echo $row["quantity"];?></td>
                <td><?php echo $row["total"];?></td>
                <td><?php echo $row["orderDate"];?></td>
                <td><a href="updateorder.php?id=<?php echo $row['id'];?>" title="Update order"><i class="fa fa-edit"></i></a></td>
            </tr>
            <?php
                }
            }
            ?>            
        </table>
    </div>
</div>
</div>
</body>
</html>
<?php } ?>