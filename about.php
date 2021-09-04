<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "registration");
if(strlen($_SESSION['email'])==0){
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
</head>
<body style="background-color: #f5f5f5;">
  <?php include('header.php');?>
  <div class="container">
  <div class="card mx-auto mt-5" style="width: 25rem;max-width: 330px;">
  <img src="about.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h2 class="card-title" style="text-align:center">ABOUT</h2>
    <h3>P NAGA KAILASH</h3>
    <li class="list-unstyled fs-5"><a class="link-dark" style="text-decoration: none;" href="tel:+919490066556"><i class="bi bi-telephone-fill"></i> 9490066556</a></li>
    <li class="list-unstyled fs-5"><a class="link-dark" style="text-decoration: none;" href="mailto:kailu221684@gmail.com"><i class="bi bi-envelope-fill"></i> kailu221684@gmail.com</a></li>
    <ul class="list-unstyled d-flex ps-5 pt-3 ms-5">
        <li class="ms-3"><a class="link-dark" href="https://www.instagram.com/k_a_1_l_a_s_h/"><i class="bi bi-instagram" width="24" height="24"></i></a></li>
        <li class="ms-3"><a class="link-dark" href="https://facebook.com/kailash2408"><i class="bi bi-facebook" width="24" height="24"></i></a></li>
        <li class="ms-3"><a class="link-dark" href="https://www.linkedin.com/in/kailash2408"><i class="bi bi-linkedin" width="24" height="24"></i></a></li>
        <li class="ms-3"><a class="link-dark" href="https://github.com/kailash2508/"><i class="bi bi-github" width="24" height="24"></i></a></li>
    </ul>
  </div>
</div>
</div>
<?php include('footer.php');?>
</body>
</html>
<?php } ?>