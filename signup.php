<?php include('server.php') ?>
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
<script type="text/javascript">
  function validate()
{
mail(document.getElementById("email").value);
}
  function mail(email)
{
atp=email.indexOf("@");
dotp=email.lastIndexOf(".");
if (atp<1 || dotp<atp+2 || dotp+2>=email.length)
alert("Enter a valid E-mail ID");
}
</script>
</head>
<body>
  <div class="container">
<form  method="post" action="signup.php">
  <?php include('errors.php'); ?>
  <div class="card" style="width:25rem;">
  <div class="card-body">
    <div class="text-center">
    <img class="mb-4" src="logo.png" alt="" width="72" height="57">
    </div>
    <h1 class="card-title" align="center">Signup</h1>
    <div class="form-floating mt-3">
    <input type="text" placeholder="Enter username" name="username" class="form-control" id="username" required>
    <label for="username"><b>Username</b></label>
    </div>
    <div class="form-floating mt-3">
    <input type="text" placeholder="Enter E-mail" name="email" class="form-control" id="email" required>
    <label for="email"><b>E-mail</b></label>
    </div>
    <div class="form-floating mt-4 mb-3">
    <input type="password" placeholder="Enter Password" name="password_1" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <label for="password_1"><b>Password</b></label>
    </div>
    <div class="form-floating mt-4 mb-3">
    <input type="password" placeholder="Enter Password" name="password_2" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <label for="password_2"><b>Confirm Password</b></label>
    </div>
    <div class="mb-3">
    <button type="submit" onclick="validate()" class="w-100 btn btn-lg btn-primary" name="reg_user">Sign up</button>
    </div>
  <div>
    <a href="index.php"><button type="button" class="btn btn-danger">Cancel</button></a>
  </div>
  <div class="mt-2">
  <span>If existing user<a href="login.php" style="text-decoration: none;"> click here?</a></span>
  </div>
</div>
</form>
</div>
<?php include('footer.php') ?>
</body>
</html>