<?php
@include 'config.php';

if (isset($_GET['product_id'])) {
   $product_id = $_GET['product_id'];
   $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'");
   $product = mysqli_fetch_assoc($select_product);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Details</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include 'header.php'; ?>

<div class="container">
   <section class="product-details">
      <?php if (isset($product)): ?>
         <div class="product-box">
            <div class="product-image">
               <img src="admin/uploaded_img/<?php echo $product['image']; ?>" alt="">
            </div>
            <div class="product-info">
               <h3 class="product-name"><?php echo $product['name']; ?></h3>
               <h3 class="product-id">ID: <?php echo $product['id']; ?></h3>
               <div class="product-price">$<?php echo number_format($product['price'], 2); ?></div>
               <?php if (isset($product['description'])): ?>
                  <p class="product-description"><?php echo $product['description']; ?></p>
               <?php else: ?>
               <?php endif; ?>
            </div>
         </div>
      <?php else: ?>
         <p>Product not found.</p>
      <?php endif; ?>
   </section>
</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
<style>
.product-box {
   display: flex;
   justify-content: space-between;
   align-items: center;
   padding: 80px;
   border: 1px solid #ccc;
}

.product-image {
   flex: 1;
}

.product-image img {
   max-width: 550px;
   max-height: 550px;
   display: block;
   margin: 0 auto;
}

.product-info {
   flex: 1;
   padding-left: 20px;
}

.product-name {
   font-size: 4rem;
   color: red;
   margin: 0;
   text-align: left;
}

.product-id {
   font-size: 3rem;
   margin: 10px 0;
   text-align: left;

}

.product-price {
   font-size: 3.5rem;
   color: red;
   text-align: left;

}

.product-description {
   margin-top: 20px;
}

</style>