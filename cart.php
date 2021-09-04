<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "registration");
if(strlen($_SESSION['id'])==0){
    header('location:index.php');
}
else{
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}
if(isset($_POST["place_order"])){
    if(!empty($_SESSION["shopping_cart"]))
		{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
            $id=$_SESSION['id'];
            $pid=$values["item_id"];
            $pname=$values["item_name"];
            $quantity=$values["item_quantity"];
            $price=$values["item_price"];
            $country = $_POST['country'];
            $name = $_POST['name'];
            $mob = $_POST['mobile'];
            $pin = $_POST['pin'];
            $address=$_POST['address'];
            $ptotal=$quantity*$price;
            $query = "SELECT * FROM users where id='$id'";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
                        $name=$row["username"];
                        $qry="insert into orders (userid,productid,name,country,fullname,mobile,pincode,address,price,quantity,total) values ('$id','$pid','$pname','$country','$name','$mob','$pin','$address','$price','$quantity','$ptotal')";
                        $message='<html><body>';
                        $message.='<h1 style="color:red;">Welcome '.$name.'</h1>';
                        $message.='<p>your recent orders are displayed in bellow table</p>';
                        $message.='<table border="1px solid red;"><tr><th width="10%">Product Name</th><th width="20%">Quantity</th><th width="15%">Quantity type</th></tr>';
                        $message.='<tr><td>'.$pname.'</td>';
                        $message.='<td>'.$quantity.'</td>';
                        $message.='<td>'.$ptotal.'</td></tr>';
                        $message.='</table></body></html>';
                        $to = 'kailu221684@gmail.com';
                        $subject = 'order updates';
                        $name='Mini mart';
                        $from = 'noreply@mm.com';
                        $headers= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $headers .= "From: <$from> \r\n";
                        $headers .= "Reply-To: <$from>\r\n";
                        $headers .= "CC: no-reply@mm.com\r\n";
                        //mail($to, $subject, $message, $headers);
                        if(mysqli_query($connect,$qry)){
                            echo "Your order has been placed successfully";
                            unset($_SESSION["shopping_cart"]);
                        }
                    }
                }
        }
        }            
}
?>
        <html>
        <head>
  <title>Mini Mart</title>
    <link rel="icon"  href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<style>
*{
    margin: 0;
    padding: 0;
}
.loader{
    position: fixed;
    top:0;
    left:0;
    background: lightgray;
    height:100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.disapear{
    animation: vanish 1s forwards;
}
@keyframes vanish{
    100%{
        opacity: 0;
        visibility: hidden;
    }
}
::-webkit-scrollbar {
  width: 0;
}
#scrollPath{
    position:fixed;
    top:0;
    right:0;
    width:10px;
    height:100%;
    background:rgba(255,255,255,0.05);
}
#progressbar{
    position:fixed;
    top:0;
    right:0;
    width:10px;
    height:0%;
    background:linear-gradient(to top,#008aff,#00ffe7);
    animation: animate 5s linear infinite;
}
@keyframes animate{
    0%,100%
    {
        filter: hue-rotate(0deg);
    }
    50%
    {
        filter: hue-rotate(360deg);
    }
}
#progressbar:before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:linear-gradient(to top,#008aff,#00ffe7);
    filter:blur(10px);
}
#progressbar:after{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:linear-gradient(to top,#008aff,#00ffe7);
    filter:blur(30px);
}
</style>
</head>
        <body style="background-color: #f5f5f5;">
        <?php include('header.php') ?>
        <div class="loader"><img src="gear_load.gif"></div>
        <div id="progressbar"></div>
        <div id="scrollPath"></div>
        <div class="container pt-5 pb-5">
		<h3>Order Details</h3>
		<div class="table-responsive" style="overflow:auto;">
        <?php
		if(!empty($_SESSION["shopping_cart"]))
		{
            ?>
            <table class="table table-stripped table-hover text-center">
		<thead>
        <tr>
		<th width="10%" scope="col">Product Name</th>
		<th width="20%" scope="col">Quantity</th>
		<th width="15%" scope="col">Item price</th>
        <th width="15%" scope="col">Total price</th>
		<th width="5%" scope="col">Action</th>
		</tr>
        </thead>
        <tbody>
		<tr>
        <?php
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		?>
		<td><?php echo $values["item_name"]; ?></td>
		<td><?php echo $values["item_quantity"]; ?></td>
		<td><?php echo $values["item_price"]; ?></td>
        <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
		<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fa fa-trash"></i></a></td>
		</tr>
        <?php
        }?>
        </tbody>
        </table>
        </div>
        <br>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Place order
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
      <div class="modal-body">
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="country">
            <option selected>Select the country</option>
            <option value="india">India</option>
            <option value="usa">Usa</option>
            <option value="london">London</option>
            <option value="others">Others</option>
        </select>
        <div class="form-floating mt-3">
            <input type="text" placeholder="Enter name" name="name" class="form-control" id="name" required>
            <label for="name"><b>Name</b></label>
        </div>
        <div class="form-floating mt-4 mb-3">
            <input type="mobile" placeholder="Enter mobile" name="mobile" class="form-control" required>
            <label for="mobile"><b>Mobile number</b></label>
        </div>
        <div class="form-floating mt-3">
            <input type="number" placeholder="Enter pin code" name="pin" class="form-control" id="pin" required>
            <label for="pin"><b>Pin Code</b></label>
        </div>
        <div class="form-floating mt-4 mb-3">
            <textarea class="form-control" placeholder="Enter address" name="address" id="address" rows="3"></textarea>
            <label for="address"><b>Address</b></label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="place_order" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
        <?php
        }
        else{
            echo "No items in the cart.";
        }
		?>
</div>
<script>
let progress=document.getElementById("progressbar");
let totalHeight=document.body.scrollHeight - window.innerHeight;
window.onscroll=function(){
    let progressHeight=(window.pageYOffset/totalHeight)*100;
    progress.style.height=progressHeight+"%";
}
</script>
<script type='text/javascript'>
var loader = document.querySelector(".loader")
window.addEventListener("load",vanish);
function vanish() {
    loader.classList.add("disapear");
}
</script>
<div class="mt-5 pt-5">
<?php include('footer.php') ?>
</div>
</body>
</html>
<?php } ?>