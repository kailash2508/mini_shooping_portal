<!DOCTYPE html>
<html>
<head>
	<title>Mini Mart</title>
    <link rel="icon"  href="logo.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="signin.css">
</head>
<body>
  <div class="container">
	<form  method="post" action="authentication.php">
  <div class="card" style="width: 25rem;">
  <div class="card-body">
  <div class="text-center">
  <img class="mb-4" src="logo.png" alt="" width="72" height="57">
  </div>
  <h1 class="card-title" align="center">ADMIN</h1>
    <div class="form-floating mt-3">
    <input type="text" placeholder="Enter Name" name="user" class="form-control" id="name" required>
    <label for="user"><b>Name</b></label>
    </div>
    <div class="form-floating mt-4 mb-3">
    <input type="password" placeholder="Enter Password" name="pass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <label for="pass"><b>Password</b></label>
    </div>
    <a class="btn btn-danger mb-4 me-3" href="index.php">Cancel</a>
    <button type="submit" class="btn btn-primary mb-4" name="login_user" value="login"/>LOGIN</button>
  </div>
</form>
</div>
<?php include('footer.php') ?>
</body>
</html>