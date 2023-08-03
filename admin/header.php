<header class="header">
   <div class="flex">
      <a href="admin.php" class="logo">Admin page</a>
      <nav class="navbar">
         <a href="admin.php">add products</a>
         <a href="products_admin.php">view products</a>
      </nav>
      <?php
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      ?>
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</header>