<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> ATN Shop </title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="slider">
  <img src="https://images.unsplash.com/photo-1557682250-33bd709cbe85?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTcwfHx3YWxscGFwZXJ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" style="width: 152rem; height: 55rem;">
  <div class="gradient-overlay"></div>
  <div class="welcome-text">Welcome to
    <h3 style="font-size: 80px;"> ATN Shop</h3>
  </div>
</div>
<div class="container h-100">
  <div class="d-flex justify-content-center h-100">
    <div class="searchbar">
      <form action="product_details.php" method="get">
         <input class="search_input" type="text" name="product_id" placeholder="Search by ID...">
         <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </div>
</div>






<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

<section class="products">
   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="admin/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3 style="color: red;"><?php echo $fetch_product['name']; ?></h3>
            <h2>ID: <?php echo $fetch_product['id']; ?></h2>
            <div class="price" style="color: red;">$<?php echo $fetch_product['price']; ?>.00</div><br>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <button class="button-40" role="button" type="submit" name="add_to_cart"> BUY</button>
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>
</section>
</div>
<!-- custom js file link  -->
<script src="js/script.js"></script>
<?php include 'footer.php'; ?>
<script>
  function onFocusInput(input) {
    if (input.placeholder === 'Search...') {
      input.placeholder = '';
    }
  }
  
  function onBlurInput(input) {
    if (input.value === '') {
      input.placeholder = 'Search...';
    }
  }
</script>


</body>
</html>
<style>
.slider {
  position: relative;
  overflow: hidden;
}
.search_input::placeholder {
  color: black;
}
.welcome-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 3rem;
  color: white;
  text-shadow: 3px 2px 4px rgba(0, 0, 0, 0.5);
  z-index: 1;
}

.gradient-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(600, 255, 255, 0), rgba(255, 255, 255, 1));
  z-index: 0;
}

</style>


<!-- HTML !-->
