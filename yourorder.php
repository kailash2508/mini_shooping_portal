<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "registration");
if(strlen($_SESSION['id'])==0){
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
</head>
<body style="background-color: #f5f5f5;">
<?php include('header.php'); ?>
            <div class="container pt-5 pb-5" style="overflow:auto;">
                <table class="table table-stripped table-hover text-center mb-5">
                    <thead>
                    <tr>
                        <th colspan="9" bgcolor=" #ffa500" style="font-size: 30px;">MY ORDERS</th>
                    </tr>
                    <tr>
                        <th width="3%">order id</th>
                        <th width="5%">Product Id</th>
                        <th width="5%">Product name</th>
                        <th width="5%">price</th>
                        <th width="5%">quantity</th>
                        <th width="5%">Total Cost</th>
                        <th width="5%">Order Date</th>
                    </tr>
                    </thead>
                    <?php
                    $id=$_SESSION['id'];
                $query = "SELECT * FROM orders WHERE userId=$id";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["productId"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td>Rs.<?php echo $row["price"]; ?></td>
                        <td><?php echo $row["quantity"];?></td>
                        <td><?php echo $row["total"];?></td>
                        <td><?php echo $row["orderDate"];?></td>
                    </tr>
                    <?php
                    }
                }
                    ?>
                        
                </table>
            </div>
        </div>
        <div class="mt-5 pt-5">
        <?php include('footer.php') ?>
        </div>
</body>
</html>
<?php } ?>