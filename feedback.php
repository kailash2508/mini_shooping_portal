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
</head>
<body style="background-color: #f5f5f5;">
    <?php include('header1.php'); ?>
    <div class="container">
            <div class="table-responsive" style="overflow: auto;">
                <table class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th colspan="3" bgcolor=" #ffa500" style="font-size: 30px;">Feedback</th>
                    </tr>
                    <tr>
                        <th width="5%">Name</th>
                        <th width="5%">Email</th>
                        <th width="5%">Suggetion/Feedback</th>
                    </tr>
                    </thead>
                    <?php
                $query = "SELECT * FROM feedback ORDER BY id ASC";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                    <tr>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["message"]; ?></td>
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