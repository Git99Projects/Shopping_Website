
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>online Super market</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
     integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- css file -->
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--navbar  -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
   <img src="image/logo.png" alt="" class="logo" width="70">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>

      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
    <ul class="navbar-nav me-auto">
         <li class="nav-item">
          <a class="nav-link" href="login.php">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
</ul>
</ul>
</nav>
<div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div>

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/p1.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">iQOO Neo 10R 5G </h5>
    <p class="card-text">iQOO Neo 10R 5G (Raging Blue, 8GB RAM, 256GB Storage) 
        | Snapdragon 8s Gen 3 Processor 6400mAh Battery Smartphone 
        | Segment's Most Stable 90FPS for 5 Hours</p>
        <h3>₹10,999</h3>
    <a href="login.php" class="btn btn-info">Add to cart</a>
    <a href="login.php" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/p2.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Samsung Galaxy S25 Ultra 5G </h5>
    <p class="card-text">Samsung Galaxy S25 Ultra 5G AI Smartphone (Titanium Whitesilver,
         12GB RAM, 256GB Storage), 200MP Camera, S Pen Included, Long Battery Life</p>
         <h3>₹10,999</h3>
         <a href="login.php" class="btn btn-info">Add to cart</a>
         <a href="login.php" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/p3.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">iQOO Z9 Lite 5G</h5>
    <p class="card-text">iQOO Z9 Lite 5G is a budget-friendly 5G smartphone with
       a high-refresh-rate display, a powerful processor, and a long-lasting battery
        for smooth performance.</p>
         <h3>₹12,999</h3>
         <a href="login.php" class="btn btn-info">Add to cart</a>
         <a href="login.php" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/p4.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Samsung Galaxy S24 FE</h5>
    <p class="card-text">The Samsung Galaxy S24 FE is a premium mid-range 
      phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP
       triple-camera system, and IP68 water resistance..</p>
         <h3>₹15,999</h3>
         <a href="login.php" class="btn btn-info">Add to cart</a>
         <a href="login.php" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/p5.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">iQOO Neo 9 Pro</h5>
    <p class="card-text">The iQOO Neo 9 Pro is a high-performance smartphone featuring 
      a 144Hz AMOLED display, Qualcomm Snapdragon 8 Gen 2 processor, a 50MP 
      dual-camera system, and a 5160mAh battery with 120W fast charging.</p>
         <h3>₹17,999</h3>
         <a href="login.php" class="btn btn-info">Add to cart</a>
         <a href="login.php" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/p6.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Redmi Note 14</h5>
    <p class="card-text">The Redmi Note 14 is a mid-range smartphone with a 6.67-inch 120Hz 
      AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery 
      with 33W fast charging.</p>
         <h3>₹13,999</h3>
         <a href="login.php" class="btn btn-info">Add to cart</a>
         <a href="login.php" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/p7.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Redmi 14C</h5>
    <p class="card-text">The Redmi 14C is a budget smartphone with a 6.88-inch 
      120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera
       setup, and a 5160mAh battery with 18W fast charging.</p>
         <h3>₹9,999</h3>
         <a href="login.php" class="btn btn-info">Add to cart</a>
         <a href="login.php" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
    <!-- brands to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="login.php" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="login.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="login.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="login.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="login.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="login.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="login.php" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="login.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="login.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="login.php" class="nav-link text-light"><h5>APPLE</h5></a>
        </li>
        <li class="nav-item">
            <a href="login.php" class="nav-link text-light"><h5>Others</h5></a>
        </li>
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="login.php" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="login.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="login.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="login.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <li class="nav-item ">
            <a href="login.php" class="nav-link text-light"><h5>Others</h5></a>
        </li>
    </ul>
        <!-- sidenav -->

    </div>
</div>

<!-- last child -->
 <div class="bg-info p-3 text-center">
    <p>All rights reserved  Designed by<font color="blue"> Deepak kumar singh and Manoj </font></p>
 </div>
    </div>


<!-- boostrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>