<?php 
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	 		$id = mysqli_real_escape_string($db, $_GET['id']);
$sql = "delete from tb1_product where id = 'id'";    
$result = mysqli_query($db,$sql);
if($result)
{
	echo "Row deleted";
}    
?>
