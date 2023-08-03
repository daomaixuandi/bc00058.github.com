<header class="header">
   <div class="flex">
      <a href="products.php" class="logo"><b>TopToys</b> Shop</a>
      <nav class="navbar">
         <a href="products.php">HOME</a>
         <a href="introduction.php">INTRODUCTION</a>
         <a href="products.php">PRODUCTS</a>
         <a href="aboutus.php">ABOUT US</a>
         <a href="update_profile.php">PROFILE</a>
      </nav>
      <?php
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      ?>
      <a href="cart.php" class="cart">CART <span><?php echo $row_count; ?></span> </a>
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>

</header>