<?php 
$connect = mysqli_connect("localhost", "root", "", "registration");
$id=intval($_GET['id']);
if(isset($_POST['submit2'])){
$status=$_POST['status'];
$sql=mysqli_query($connect,"update orders set orderStatus='$status' where id='$id'");
echo "<script>alert('Order updated sucessfully...');</script>";
header('location:orderdetails.php');
}
if(isset($_POST['Submit3']))
{
	header('location:orderdetails.php');
}
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
<div class="container">
 <form method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Update Order !</b></div></td>
    </tr>
  </thead>
    <tr height="30">
      <td  class="fontkink1"><b>order Id:</b></td>
      <td  class="fontkink"><?php echo $id;?></td>
    </tr>
    <?php 
    $ret = mysqli_query($connect,"SELECT * FROM orders WHERE id='$id'");
     while($row=mysqli_fetch_array($ret))
      {
     ?>
		<tr height="20">
      <td class="fontkink1" ><b>At Date:</b></td>
      <td  class="fontkink"><?php echo $row['orderDate'];?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $row['orderStatus'];?></td>
    </tr>   
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } ?>
   <?php 
$st='Delivered';
   $rt = mysqli_query($connect,"SELECT * FROM orders WHERE id='$id'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['orderStatus'];
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
      Product Delivered </b></td>
   <?php }else  {
      ?>
   
    <tr height="50">
      <td class="fontkink1">Status: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="status" class="fontkink">
          <option value="">Select Status</option>
                 <option value="Picked">Picked</option>
                  <option value="Shipped">Shipped</option>
                  <option value="Out for delivery">Out for Delivery</option>
                  <option value="Delivered">Delivered</option>
        </select>
        </span></td>
    </tr>
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2" value="update" class="btn btn-primary" style="cursor: pointer;" /> &nbsp;&nbsp;   
      <input name="Submit3" type="submit" class="btn btn-warning" value="Go Back" onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
<?php } ?>
</table>
 </form>
</div>
</body>
</html>