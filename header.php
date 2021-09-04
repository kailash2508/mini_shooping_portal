<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="index.php"><img src="logo.png" width="30" height="24"> Mini Mart</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php"><i class="bi bi-house"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-cart"></i>Cart<?php if(!empty($_SESSION["shopping_cart"])){ ?><span class="position-absolute top-10 start-100 translate-middle badge rounded-pill bg-danger"><?php echo sizeof($_SESSION["shopping_cart"]); ?></span><?php }?>
          </a>
          <div class="dropdown-menu" style="width:220px;border: 5px solid red;padding: 5px;">
          	<div>
              <?php if(empty($_SESSION["shopping_cart"]))
              {
                echo "<p>No items in cart</p>";
              }
              ?>
              <?php
              if(!empty($_SESSION["shopping_cart"]))
              {
                $total = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
              ?>
              <div style="float: left;margin: 0px;">
                <img style="width: 100px;align-items: left;" name="image" id="image" src="images/<?php echo $values["item_image"];?>">
              </div>
              <div style="text-align: center;margin: 0px;">
                <?php echo $values["item_name"]; ?><br>
                <?php echo $values["item_quantity"]; ?><br>
                Rs <?php echo $values["item_price"]; ?><br>
                Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?><br>
                <a class="btn btn-danger" href="home.php?action=delete&id=<?php echo $values["item_id"]; ?>">Remove</a><hr>
                <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>
              </div>
              Total Cart Value: Rs <?php echo number_format($total, 2); ?>
              <?php
              }
              ?>
            </div>
            <a class="btn btn-primary" href="cart.php">Go to cart</a>
          </div>
        </li>
        <li class="navbar-nav nav-item">
          <a class="nav-link" href="yourorder.php">  Orders</a>
        </li>
        <li class="navbar-nav nav-item">
          <a class="nav-link" href="track.php">Track</a>
        </li>
        <li class="navbar-nav nav-item">
          <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Log out</a>
        </li>
      </ul>
      <ul class="navbar-nav nav-item dropdown">
          <a class="nav-link pe-3" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
      <div class="dropdown-menu">
        <?php
                $query = "SELECT DISTINCT category FROM tb1_product ORDER BY id ASC";
                $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
            <li class="nav-item">
              <a class="nav-link" href="category.php?category=<?php echo $row['category'];?>"><?php echo $row['category'];?></a>
            </li>
          <?php } ?>
          </div>
        </ul>
      <form class="d-flex" method="post" action="search_result.php">
        <input class="form-control me-2" type="search" placeholder="Search" name="product" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>