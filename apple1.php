
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/a1.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Apple iPhone 15</h5>
    <p class="card-text">Advanced dual-camera system: 48MP Main,12MP Ultra Wide, 12MP 
        2x Telephoto,2x optical zoom in, 2x opticalzoom out; 4x optical 
        zoom range Digital zoom up to 10x, Smart HDR 5</p>
        <h3>₹61,400</h3>
         <h6>M.R.P:₹<s>79,999</s> (30% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/a2.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">iPhone 16 128 GB: 5G </h5>
    <p class="card-text">iPhone 16 128 GB: 5G Mobile Phone with Camera Control, 
        A18 Chip and a Big Boost in Battery Life. Works with AirPods; Teal</p>
         <h3>₹65,900</h3>
         <h6>M.R.P:₹<s>78,999</s> (31% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/a3.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">iPhone 16 Pro Max 256 GB: 5G</h5>
    <p class="card-text">iPhone 16 Pro Max 256 GB: 5G Mobile Phone with Camera Control,
         4K 120 fps Dolby Vision and a Huge Leap in Battery Life.
          Works with AirPods; Black Titanium</p>
         <h3>₹1,37,900</h3>
         <h6>M.R.P:₹<s>1,64,999</s> (35% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/a4.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Apple iPhone 15</h5>
    <p class="card-text">Advanced dual-camera system: 48MP Main,12MP Ultra Wide, 
        12MP 2x Telephoto (enabled by quad-pixel sensor), 2x optical zoom in, 
        2x optical zoom out; 4x optical zoom range Digital zoom up to 10x</p>
         <h3>₹61,400</h3>
         <h6>M.R.P:₹<s>88,999</s> (32% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/a5.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Apple iPhone 14</h5>
    <p class="card-text">Dual-camera system: 12MP Main, 12MP Ultrawide 
        with Portrait mode, Depth Control, Portrait Lighting, Smart HDR 4, 
        and 4K Dolby Vision HDR video up to 60 fps</p>
         <h3>₹54,900</h3>
         <h6>M.R.P:₹<s>84,999</s> (37% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/a6.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Apple iPhone 13 (128GB)</h5>
    <p class="card-text">Advanced dual-camera system with 12MP Wide and Ultra 
        Wide cameras; Photographic Styles, Smart HDR 4, Night 
        mode, 4K Dolby Vision HDR recording</p>
         <h3>₹44,999</h3>
         <h6>M.R.P:₹<s>54,999</s> (30% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/a7.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">iPhone 16e 128 GB</h5>
    <p class="card-text">iPhone 16e 128 GB: Built for Apple Intelligence, 
        A18 Chip, Supersized Battery Life, 48MP Fusion. Camera, 15.40 cm 
        (6.1″) Super Retina XDR Display; Black</p>
         <h3>₹56,790</h3>
         <h6>M.R.P:₹<s>64,999</s> (20% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
   <!-- brands to be display -->
   <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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



<!-- Sumsung .php -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/s1.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Samsung Galaxy F15 5G </h5>
    <p class="card-text">16.39 Centimeters (6.5"Inch) Super AMOLED Display , 
        FHD+ Resolution with 2340 x 1080 Pixels , 16M Colors and 
        90Hz Refresh Rate</p>
        <h3>₹12,999</h3>
        <h6>M.R.P:₹<s>18,999</s> (30% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/p2.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Samsung Galaxy S25 Ultra 5G </h5>
    <p class="card-text">Samsung Galaxy S25 Ultra 5G AI Smartphone (Titanium Whitesilver,
         12GB RAM, 256GB Storage), 200MP Camera, S Pen Included, Long Battery Life</p>
         <h3>₹10,999</h3>
         <h6>M.R.P:₹<s>79,999</s> (83% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/s2.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Samsung Galaxy S24 Ultra 5G </h5>
    <p class="card-text">Samsung Galaxy S24 Ultra 5G AI Smartphone 
        (Titanium Gray, 12GB, 256GB Storage)  Galaxy S24 Ultra, the ultimate form 
        of Galaxy Ultra with a new titanium exterior and a 17.25cm (6.8") flat display. 
        It's an absolute marvel of design.</p>
         <h3>₹62,799</h3>
         <h6>M.R.P:₹<s>94,999</s> (40% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/p4.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Samsung Galaxy S24 FE</h5>
    <p class="card-text">The Samsung Galaxy S24 FE is a premium mid-range 
      phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP
       triple-camera system, and IP68 water resistance..</p>
         <h3>₹15,999</h3>
         <h6>M.R.P:₹<s>21,999</s> (40% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/s3.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Samsung Galaxy A35 5G</h5>
    <p class="card-text">Samsung Galaxy A35 5G (Awesome Iceblue, 8GB RAM, 128GB Storage) 
        with Other OffersBATTERY - Get a massive 5000mAh Lithium-ion Battery (Non-Removable)
         with C-Type Super Fast Charging (25W Charging Support)</p>
         <h3>₹27,500</h3>
         <h6>M.R.P:₹<s>34,999</s> (35% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/s4.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Samsung Galaxy M35 5G </h5>
    <p class="card-text">Samsung Galaxy M35 5G (Moonlight Blue,6GB RAM,128GB Storage)| 
        Corning Gorilla Glass Victus+| AnTuTu Score 595K+ | Vapour Cooling Chamber | 
        6000mAh Battery | 120Hz Super AMOLED Display| Without Charger</p>
         <h3>₹14,999</h3>
         <h6>M.R.P:₹<s>19,999</s> (39% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/s5.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Samsung Galaxy Z Flip3 5G</h5>
    <p class="card-text">Samsung Galaxy Z Flip3 5G (Cream, 8GB RAM, 128GB Storage) with
         No Cost EMI/Additional Exchange Offers  Corning Gorilla Glass Victus+|
          AnTuTu Score 595K+ | Vapour Cooling Chamber | 
         6000mAh Battery | 120Hz Super AMOLED Display| Without Charger</p>
         <h3>₹31,990</h3>
         <h6>M.R.P:₹<s>54,999</s> (35% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
    <!-- brands to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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


<!-- xiomi code  -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/x1.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Xiaomi 15 </h5>
    <p class="card-text">Xiaomi 15 (Black, 12GB RAM, 512GB Storage)
    6.36" 1.5K 120Hz AMOLED display with Ultra slim bexels and 3200nits of peak brightness
    </p>
        <h3>₹54,9999</h3>
        <h6>M.R.P:₹<s>65,999</s> (30% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/x2.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Redmi Note 14 5G  </h5>
    <p class="card-text">Redmi Note 14 5G (Mystique White, 6GB RAM 128GB Storage) |
         Global Debut MTK Dimensity 7025 Ultra | 2100 nits Segment Brightest 120Hz AMOLED 
         | 50MP Sony LYT 600 OIS+EIS Triple Camera</p>
         <h3>₹7,998</h3>
         <h6>M.R.P:₹<s>14,999</s> (40% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/x3.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Xiaomi 14 CIVI </h5>
    <p class="card-text">Xiaomi 14 CIVI (Cruise Blue, 8GB RAM, 256GB Storage)
    Xiaomi 14 CIVI boots with Xiaomi's HyperOS out of the box. HyperOS is based on Android 14
    </p>
         <h3> ₹26,449</h3>
         <h6>M.R.P:₹<s>34,999</s> (37% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/x4.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Xiaomi 12 Pro </h5>
    <p class="card-text">Xiaomi 12 Pro | 5G (Couture Blue, 8GB RAM, 256GB Storage) | 
        Snapdragon 8 Gen 1 | 50+50+50MP Flagship Cameras (OIS) | 10bit 2K+ Curved AMOLED 
        Display | Sound by Harman Kardon</p>
         <h3>₹33,999</h3>
         <h6>M.R.P:₹<s>44,999</s> (38% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/x5.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Xiaomi 15 Ultra</h5>
    <p class="card-text">Xiaomi 15 Ultra (Silver Chrome, 16GB RAM, 512GB Storage)
    6.73" WQHD+ 3200 nits ultra-bright AMOLED display
    Large 5410mAh High density battery with 90W Hypercharge support
IP68 rated and protected by Xiaomi Shield Glass 2.0
    </p>
         <h3>₹79,999</h3>
         <h6>M.R.P:₹<s>84,999</s> (25% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/p6.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Redmi Note 14</h5>
    <p class="card-text">The Redmi Note 14 is a mid-range smartphone with a 6.67-inch 120Hz 
      AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery 
      with 33W fast charging.</p>
         <h3>₹13,999</h3>
         <h6>M.R.P:₹<s>21,999</s> (35% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/p7.webp" class="card-img-top" alt="..." width="150" height="320">
  <div class="card-body">
    <h5 class="card-title">Redmi 14C</h5>
    <p class="card-text">The Redmi 14C is a budget smartphone with a 6.88-inch 
      120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera
       setup, and a 5160mAh battery with 18W fast charging.</p>
         <h3>₹9,999</h3>
         <h6>M.R.P:₹<s>14,999</s> (32% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
   <!-- brands to be display -->
   <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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

<!-- oneplus code  -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o2.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord CE4 Lite 5G </h5>
    <p class="card-text">OnePlus Nord CE4 Lite 5G (Super Silver, 8GB RAM, 128GB Storage)
        (Raging Blue, 8GB RAM, 256GB Storage) 
        | Snapdragon 8s Gen 3 Processor 6400mAh Battery Smartphone 
        | Segment's Most Stable 90FPS for 5 Hours</p>
        <h3>₹10,999</h3>
        <h6>M.R.P:₹<s>14,999</s> (32% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o3.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus 13R </h5>
    <p class="card-text">OnePlus 13R | Smarter with OnePlus AI (12GB RAM, 256GB Storage Nebula Noir)
        Titanium Whitesilver,
          200MP Camera, S Pen Included, Long Battery Life</p>
         <h3>₹9,999</h3>
         <h6>M.R.P:₹<s>14,999</s> (32% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o4.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord 4 5G</h5>
    <p class="card-text">OnePlus Nord 4 5G (Obsidian Midnight, 8GB RAM, 256GB Storage)
        5G smartphone with
       a high-refresh-rate display, a powerful processor, and a long-lasting battery
        for smooth performance.</p>
         <h3>₹12,999</h3>
         <h6>M.R.P:₹<s>24,999</s> (40% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o5.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord CE4</h5>
    <p class="card-text">OnePlus Nord CE4 (Dark Chrome, 8GB RAM, 128GB Storage)
    premium mid-range 
      phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP
       triple-camera system, and IP68 water resistance..</p>
         <h3>₹13,999</h3>
         <h6>M.R.P:₹<s>24,999</s> (45% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o6.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord 4 5G</h5>
    <p class="card-text">OnePlus Nord 4 5G (Oasis Green, 8GB RAM, 256GB Storage)
        high-performance smartphone featuring 
      a 144Hz AMOLED display, Qualcomm Snapdragon 8 Gen 2 processor, a 50MP 
      dual-camera system, and a 5160mAh battery with 120W fast charging.</p>
         <h3>₹19,999</h3>
         <h6>M.R.P:₹<s>41,999</s> (50% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o7.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus 13 </h5>
    <p class="card-text">OnePlus 13 | Smarter with OnePlus AI (16GB RAM, 512GB Storage Midnight Ocean)
         6.67-inch 120Hz 
      AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery 
      with 33W fast charging.</p>
         <h3>₹23,999</h3>
         <h6>M.R.P:₹<s>44,999</s> (48% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o8.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus 11 5G</h5>
    <p class="card-text">OnePlus 11 5G (Eternal Green, 8GB RAM, 128GB Storage) a 6.88-inch 
      120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera
       setup, and a 5160mAh battery with 18W fast charging.</p>
         <h3>₹25,999</h3>
         <h6>M.R.P:₹<s>44,999</s> (45% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
    <!-- brands to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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

<!-- HP code -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o2.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord CE4 Lite 5G </h5>
    <p class="card-text">OnePlus Nord CE4 Lite 5G (Super Silver, 8GB RAM, 128GB Storage)
        (Raging Blue, 8GB RAM, 256GB Storage) 
        | Snapdragon 8s Gen 3 Processor 6400mAh Battery Smartphone 
        | Segment's Most Stable 90FPS for 5 Hours</p>
        <h3>₹10,999</h3>
        <h6>M.R.P:₹<s>14,999</s> (32% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o3.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus 13R </h5>
    <p class="card-text">OnePlus 13R | Smarter with OnePlus AI (12GB RAM, 256GB Storage Nebula Noir)
        Titanium Whitesilver,
          200MP Camera, S Pen Included, Long Battery Life</p>
         <h3>₹9,999</h3>
         <h6>M.R.P:₹<s>14,999</s> (32% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o4.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord 4 5G</h5>
    <p class="card-text">OnePlus Nord 4 5G (Obsidian Midnight, 8GB RAM, 256GB Storage)
        5G smartphone with
       a high-refresh-rate display, a powerful processor, and a long-lasting battery
        for smooth performance.</p>
         <h3>₹12,999</h3>
         <h6>M.R.P:₹<s>24,999</s> (40% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o5.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord CE4</h5>
    <p class="card-text">OnePlus Nord CE4 (Dark Chrome, 8GB RAM, 128GB Storage)
    premium mid-range 
      phone with a 120Hz AMOLED display, Exynos 2400e processor, a 50MP
       triple-camera system, and IP68 water resistance..</p>
         <h3>₹13,999</h3>
         <h6>M.R.P:₹<s>24,999</s> (45% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o6.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord 4 5G</h5>
    <p class="card-text">OnePlus Nord 4 5G (Oasis Green, 8GB RAM, 256GB Storage)
        high-performance smartphone featuring 
      a 144Hz AMOLED display, Qualcomm Snapdragon 8 Gen 2 processor, a 50MP 
      dual-camera system, and a 5160mAh battery with 120W fast charging.</p>
         <h3>₹19,999</h3>
         <h6>M.R.P:₹<s>41,999</s> (50% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o7.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus 13 </h5>
    <p class="card-text">OnePlus 13 | Smarter with OnePlus AI (16GB RAM, 512GB Storage Midnight Ocean)
         6.67-inch 120Hz 
      AMOLED display, MediaTek Helio G99-Ultra processor, a 108MP camera, and a 5500mAh battery 
      with 33W fast charging.</p>
         <h3>₹23,999</h3>
         <h6>M.R.P:₹<s>44,999</s> (48% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/o8.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">OnePlus 11 5G</h5>
    <p class="card-text">OnePlus 11 5G (Eternal Green, 8GB RAM, 128GB Storage) a 6.88-inch 
      120Hz HD+ display, MediaTek Helio G81 Ultra processor, a 50MP dual-camera
       setup, and a 5160mAh battery with 18W fast charging.</p>
         <h3>₹25,999</h3>
         <h6>M.R.P:₹<s>44,999</s> (45% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
    <!-- brands to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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

<!-- dell code -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/d1.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Dell Inspiron 3530 Laptop</h5>
    <p class="card-text">Dell Inspiron 3530 Laptop, 13th Generation Intel Core i7-1355U 
    Processor, 16GB, 512GB, 15.6" (39.62cm) FHD 120Hz Display, Backlit KB, Windows 11 +
     MSO'21, 15 Month McAfee, Silver, Thin & Light-1.62kg</p>
        <h3>₹25,999</h3>
        <h6>M.R.P:₹<s>67,999</s> (70% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/d2.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Dell 15 Thin & Light Laptop</h5>
    <p class="card-text">Dell 15 Thin & Light Laptop, Intel Core i5-1235U Processor/16GB DDR4 
      + 512GB SSD/Intel UHD Graphics/15.6" (39.62cm) FHD Display/Win 11 + MSO'21/15 Month 
      McAfee/Carbon Black/Spill Resistant KB/1.69kg</p>
         <h3>₹30,999</h3>
         <h6>M.R.P:₹<s>68,999</s> (68% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/d3.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Dell Latitude 3440 </h5>
    <p class="card-text">Dell Latitude 3440 Intel Core I3 12Th Gen 1215U - (8GB/512 GB SSD/Intel
       UHD Graphics) Thin and Light Business DOS Laptop/14 HD Display/Grey/1.5 Kg</p>
         <h3>₹19,999</h3>
         <h6>M.R.P:₹<s>65,999</s> (70% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/d4.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Dell Inspiron 5440 Laptop</h5>
    <p class="card-text">Dell Inspiron 5440 Laptop, i5-1334U Processor, 16GB DDR5 + 1TB SSD, 
      14" FHD+AG NonTouch 250nits WVA Display w/Comfortview Support, Backlit KB + FPR, Win11 
      + MSO'21 + 15 Month McAfee, Ice Blue, 1.54kg</p>
         <h3>₹35,999</h3>
         <h6>M.R.P:₹<s>85,999</s> (65% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/d5.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Dell 15 Thin & Light Laptop</h5>
    <p class="card-text">Dell 15 Thin & Light Laptop, Windows 11 Home, Intel Core 
      i5-1235U Processor, 8GB RAM + 512GB SSD, 15.6" FHD Window 11 + Mso '21, 15 Month
       Mcafee, Spill-Resistant Keyboard, Black, 1.66Kg</p>
         <h3>₹24,999</h3>
         <h6>M.R.P:₹<s>62,999</s> (64% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/d6.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Dell {Smartchoice} G15-5530 </h5>
    <p class="card-text">Dell {Smartchoice} G15-5530 Core i5-13450HX| NVIDIA RTX 3050, 6GB
       (16GB RAM|1TB SSD, FHD|Window 11|MS Office' 21|15.6")(39.62cm)|Dark Shadow Grey|2.65Kg|Gaming Laptop</p>
         <h3>₹25,999</h3>
         <h6>M.R.P:₹<s>1,06,999</s> (84% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card">
  <img src="image/d7.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">Dell Inspiron 7441 Plus Laptop</h5>
    <p class="card-text">Dell Inspiron 7441 Plus Laptop, Built-in AI Snapdragon 
      X Plus X1P-64-100 10 Core, 16GB LPDDR5X + 512GB SSD, Qualcomm GPU, 14"(35.56cm) 
      16:10 QHD+ Touch 400 nits, Backlit KB + FPR, Ice Blue, 1.4 kg</p>
         <h3>₹51,999</h3>
         <h6>M.R.P:₹<s>1,53,999</s> (74% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
   <!-- brands to be display -->
   <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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


<!-- macbook -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/m1.webp" class="card-img-top" alt="..." width="150" height="230">
  <div class="card-body">
    <h5 class="card-title">Apple 2024 MacBook Pro</h5>
    <p class="card-text">Apple 2024 MacBook Pro Laptop with M4 Pro chip with 14‑core 
      CPU and 20‑core GPU: Built for Apple Intelligence, (16.2″) Liquid Retina XDR 
      Display, 24GB Unified Memory, 512GB SSD Storage; Space Black</p>
        <h3>₹45,999</h3>
         <h6>M.R.P:₹<s>2,53,999</s> (74% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/m2.webp" class="card-img-top" alt="..." width="150" height="230">
  <div class="card-body">
    <h5 class="card-title">Apple 2025 MacBook Air </h5>
    <p class="card-text">Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core 
      CPU and 10-core GPU, 16GB Unified Memory, 512GB) - Midnight</p>
         <h3>₹58,999</h3>
          <h6>M.R.P:₹<s>1,19,999</s> (64% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/m3.webp" class="card-img-top" alt="..." width="150" height="230">
  <div class="card-body">
    <h5 class="card-title">2022 Apple MacBook Air Laptop </h5>
    <p class="card-text">2022 Apple MacBook Air Laptop with M2 chip: 13.6-inch 
      Liquid Retina Display, 16GB RAM, 256GB SSD Storage, Backlit Keyboard, 1080p
       FaceTime HD Camera. Works with iPhone and iPad; Space Gray
    </p>
         <h3>₹42,999</h3>
          <h6>M.R.P:₹<s>99,999</s> (69% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/m4.webp" class="card-img-top" alt="..." width="150" height="230">
  <div class="card-body">
    <h5 class="card-title">Apple 2024 MacBook Air </h5>
    <p class="card-text">Apple 2024 MacBook Air (13-inch, Apple M3 chip with 8‑core CPU and 
      10‑core GPU, 24GB Unified Memory, 512GB) - Space Gray</p>
         <h3>₹51,999</h3>
          <h6>M.R.P:₹<s>1,53,999</s> (74% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/m5.webp" class="card-img-top" alt="..." width="150" height="230">
  <div class="card-body">
    <h5 class="card-title">Apple 2025 MacBook Air </h5>
    <p class="card-text">Apple 2025 MacBook Air (13-inch, Apple M4 chip with 
      10-core CPU and 8-core GPU, 16GB Unified Memory, 256GB) - Midnight</p>
         <h3>₹39,999</h3>
          <h6>M.R.P:₹<s>1,53,999</s> (82% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/m6.webp" class="card-img-top" alt="..." width="150" height="230">
  <div class="card-body">
    <h5 class="card-title">Apple 2025 MacBook Air </h5>
    <p class="card-text">Apple 2025 MacBook Air (13-inch, Apple M4 chip with 
    10-core CPU and 8-core GPU, 16GB Unified Memory, 256GB) - skyblue</p>
         <h3>₹32,999</h3>
          <h6>M.R.P:₹<s>1,53,999</s> (85% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/m7.webp" class="card-img-top" alt="..." width="150" height="230">
  <div class="card-body">
    <h5 class="card-title">Apple 2025 MacBook Air</h5>
    <p class="card-text">Apple 2025 MacBook Air (13-inch, Apple M4 chip with 10-core 
      CPU and 8-core GPU, 16GB Unified Memory, 256GB) - Starlight
    </p>
         <h3>₹49,999</h3>
          <h6>M.R.P:₹<s>1,49,999</s> (79% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
    <!-- brands to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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

<!-- boat -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/b1.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">boAt New Launch Rockerz 650 </h5>
    <p class="card-text">boAt New Launch Rockerz 650 Pro, Touch/Swipe Controls, Dolby 
      Audio, 80Hrs Battery, 2Mics ENx, Fast Charge, App Support, Dual Pair, Bluetooth 
      Headphones, Wireless Headphone with Mic (Iris Black)</p>
        <h3>₹899</h3>
        <h6>M.R.P:₹<s>8,999</s> (85% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/b2.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">boAt Rockerz 550 </h5>
    <p class="card-text">boAt Rockerz 550 Bluetooth Wireless Over Ear Headphones with 
      Upto 20 Hours Playback, 50MM Drivers, Soft Padded Ear Cushions and Physical Noise
       Isolation with Mic (Black Symphony)</p>
         <h3>₹999</h3>
         <h6>M.R.P:₹<s>4,999</s> (83% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/b3.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">boAt Rockerz 450</h5>
    <p class="card-text">boAt Rockerz 450, 15 HRS Battery, 40mm Drivers, Padded Ear 
      Cushions, Integrated Controls, Dual Modes, On Ear Bluetooth Headphones, Wireless 
      Headphone with Mic (Hazel Beige)</p>
         <h3>₹899</h3>
         <h6>M.R.P:₹<s>3,999</s> (75% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/b4.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">boAt Bassheads 900 Pro</h5>
    <p class="card-text">boAt Bassheads 900 Pro Wired Headphones with 40Mm Drivers, 
      Lightweight Foldable Design, Over Ear, Remote Control, Unidirectional Retractable 
      Mic, Adjustable Headband & USB Type-A Compatibility(Black)</p>
         <h3>₹699</h3>
         <h6>M.R.P:₹<s>3,999</s> (76% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/b5.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">boAt Rockerz 255 Pro+</h5>
    <p class="card-text">boAt Rockerz 255 Pro+, 60HRS Battery, Fast Charge, IPX7, 
      Dual Pairing, Low Latency, Magnetic Earbuds, in Ear Bluetooth Neckband, Wireless 
      with Mic Earphones (Teal Green)</p>
         <h3>₹599</h3>
         <h6>M.R.P:₹<s>3,999</s> (86% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/b6.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">boAt Rockerz 255</h5>
    <p class="card-text">boAt Rockerz 255 Touch Neckband with Full Touch Controls,Spatial 
      Audio,Up to 30H Playtime,ASAP Charge,Beast Mode,Enx Technology(Deep Blue),in-Ear,Bluetooth</p>
         <h3>₹349</h3>
         <h6>M.R.P:₹<s>4,999</s> (87% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br>
  <img src="image/b7.webp" class="card-img-top" alt="..." width="150" height="300">
  <div class="card-body">
    <h5 class="card-title">boAt Airdopes 311 Pro</h5>
    <p class="card-text">boAt Airdopes 311 Pro, 50HRS Battery, Fast Charge, Dual Mics ENx
       Tech, Transparent LID, Low Latency, IPX4, IWP Tech, v5.3 Bluetooth Earbuds, TWS Ear 
       Buds Wireless Earphones with mic (Active Black)</p>
         <h3>₹599</h3>
         <h6>M.R.P:₹<s>4,999</s> (86% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
    <!-- brands to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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

<!-- oneplu buds code  -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/n1.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">OnePlus Buds 3  </h5>
    <p class="card-text">OnePlus Buds 3 in Ear TWS Bluetooth Earbuds with Upto 
      49dB Smart Adaptive Noise Cancellation,Hi-Res Sound Quality,Sliding Volume 
      Control,10mins for 7Hours Fast</p>
        <h3>₹1,499</h3>
        <h6>M.R.P:₹<s>6,999</s> (69% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>        
  <img src="image/n2.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord Buds 2r </h5>
    <p class="card-text">OnePlus Nord Buds 2r True Wireless in Ear Earbuds with Mic, 
      12.4mm Drivers, Playback:Upto 38hr case,4-Mic Design, IP55 Rating [Deep Grey]</p>
         <h3>₹999</h3>
         <h6>M.R.P:₹<s>2,999</s> (65% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/n3.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord Buds 3</h5>
    <p class="card-text">OnePlus Nord Buds 3 Pro Truly Wireless Bluetooth in Ear Earbuds
       with Upto 49Db Active Noise Cancellation,12.4Mm Dynamic Drivers,10Mins for 11Hrs
        Fast Charging</p>
         <h3>₹1,199</h3>
         <h6>M.R.P:₹<s>3,999</s> (75% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/n4.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">OnePlus Buds 3</h5>
    <p class="card-text">OnePlus Buds 3 TWS in Ear Earbuds with Upto 49dB Smart Adaptive
       Noise Cancellation,Hi-Res Sound Quality,Sliding Volume Control,10mins for 7Hours</p>
         <h3>₹899</h3>
         <h6>M.R.P:₹<s>5,999</s> (89% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/n5.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord Buds</h5>
    <p class="card-text">OnePlus Nord Buds 2r True Wireless in Ear Earbuds with Mic, 12.4mm 
      Drivers, Playback:Upto 38hr case,4-Mic Design, IP55 Rating [ Misty Grey ]</p>
         <h3>₹299</h3>
         <h6>M.R.P:₹<s>9,999</s> (89% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/n6.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord Buds 3</h5>
    <p class="card-text">OnePlus Nord Buds 3 Truly Wireless Bluetooth in Ear Earbuds
       with up to 32dB Active Noise Cancellation, 10mins for 11Hours Fast Charging with
        Up to 43h Music Playback </p>
         <h3>₹399</h3>
         <h6>M.R.P:₹<s>4,999</s> (91% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/n7.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">OnePlus Nord Buds 3</h5>
    <p class="card-text">OnePlus Nord Buds 3 Pro Truly Wireless Bluetooth in Ear Earbuds 
      with Upto 49Db Active Noise Cancellation,12.4Mm Dynamic Drivers,10Mins for 
      11Hr Fast Charging </p>
         <h3>₹999</h3>
         <h6>M.R.P:₹<s>4,999</s> (69% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/n8.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">OnePlus Buds 3</h5>
    <p class="card-text">OnePlus Buds 3 Truly Wireless Bluetooth Earbuds with Upto 49Db
       Smart ANC,Hi-Res Sound Quality,in Ear,Sliding Volume Control,10Mins for 
       7Hours Fast Charging</p>
         <h3>₹899</h3>
         <h6>M.R.P:₹<s>4,999</s> (67% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
    <!-- brands to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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

<!-- boult earbuds -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ragister</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
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
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Logout</a>
        </li>
</ul>
</ul>
</nav>
<!-- <div class="bg-light">
    <h3 class="text-center">Welcome Guest</h3>
</div> -->

<!-- forth child -->
<div class="row px-1">
    <div class="col-md-10 px-3">
        <!-- products -->
     <div class="row px-4">
      <!-- fetching products -->
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/u1.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">Boult Newly Launched Z20 </h5>
    <p class="card-text">Boult Newly Launched Z20 Truly Wireless Bluetooth Ear Buds
       with 51H Playtime, Zen™ Calling ENC Mic, Made in India, Low Latency Gaming, 
       Rich Bass Drivers, TWS Earbuds</p>
        <h3>₹399</h3>
         <h6>M.R.P:₹<s>4,999</s> (77% off)</h6>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/u2.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">Boult Audio K40 </h5>
    <p class="card-text">Boult Audio K40 True Wireless in Ear Earbuds with 48H Playtime, 
      Clear Calling 4 Mics, 45ms Low Latency Gaming, Premium Grip, 13mm Bass Drivers, 
      Type-C Fast Charging</p>
         <h3>₹799</h3>
          <h6>M.R.P:₹<s>5,999</s> (75% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/u3.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">Boult X Mustang</h5>
    <p class="card-text">Boult X Mustang Newly Launched Torq TWS Earbuds with 60H 
      Playtime, App Support, 4 Mics ENC, 45ms Low Latency, 13mm Driver, Breathing 
      LEDs, Touch Control, Made</p>
         <h3>₹999</h3>
          <h6>M.R.P:₹<s>5,999</s> (65% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
         </div>
         <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/u4.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">Boult Audio W20</h5>
    <p class="card-text">Boult Audio W20 Truly Wireless in Ear Earbuds with 35H Playtime, 
      Zen™ ENC Mic, 45ms Low Latency, 13mm Bass Drivers, Type-C Fast Charging, Made 
      in India,Touch Controls</p>
         <h3>₹399</h3>
          <h6>M.R.P:₹<s>4,999</s> (83% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
        </div>
        <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/u5.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">Boult Audio Z40</h5>
    <p class="card-text">Boult Audio Z40 True Wireless in Ear Earbuds with 60H Playtime, 
      Zen™ ENC Mic, Low Latency Gaming, Type-C Fast Charging, Made in India, 10mm Rich Bass Drivers</p>
         <h3>₹359</h3>
          <h6>M.R.P:₹<s>4,999</s> (87% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
    </div>
    <div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/u6.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">Boult Newly Launched Z20</h5>
    <p class="card-text">Boult Newly Launched Z20 Truly Wireless Bluetooth Ear Buds
       with 51H Playtime, Zen™ Calling ENC Mic, Made in India, Low Latency Gaming,
        Rich Bass Drivers, TWS Earbuds</p>
         <h3>₹499</h3>
          <h6>M.R.P:₹<s>5,999</s> (77% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
<div class="col-md-3 mb-2">
         <div class="card"><br><br>
  <img src="image/u7.webp" class="card-img-top" alt="..." width="150" height="300"><br>
  <div class="card-body">
    <h5 class="card-title">Boult Audio Z40 Ultra</h5>
    <p class="card-text">Boult Audio Z40 Ultra Truly Wireless in Ear Earbuds with 32dB 
      Active Noise Cancellation, 100H Playtime, Dual Device Pairing, Quad Mic ENC, 45ms
       Low Latency, Metallic Finish</p>
         <h3>₹499</h3>
          <h6>M.R.P:₹<s>6,999</s> (67% off)</h6>
         <a href="#" class="btn btn-info">Add to cart</a>
         <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
</div>
</div>
</div>
<div class="col-md-2 bg-secondary p-0">
     <!-- brands to be display -->
     <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Mobiles</h2></a>
        </li>
      
        <li class="nav-item ">
            <a href="apple.php" class="nav-link text-light"><h5>Apple</h5></a>
        </li>
        <li class="nav-item ">
            <a href="sumsung.php" class="nav-link text-light"><h5>Samsung</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="xiaomi.php" class="nav-link text-light"><h5>Xiaomi</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplus.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="#" class="nav-link text-light"><h5></h5></a>
        </li> -->
        <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>others</h5></a>
        </li>
    </ul>
    <!-- categories to be display -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Laptops</h2></a>
        </li>
        
        <li class="nav-item">
            <a href="hp.php" class="nav-link text-light"><h5>HP</h5></a>
        </li>
        <li class="nav-item">
            <a href="dell.php" class="nav-link text-light"><h5>DELL</h5></a>
        </li> 
        <li class="nav-item">
            <a href="macbook.php" class="nav-link text-light"><h5>MacBook</h5></a>
        </li>
        <!-- <li class="nav-item">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h3>Headphones</h3></a>
        </li>
        <li class="nav-item ">
            <a href="boat.php" class="nav-link text-light"><h5>boAT</h5></a>
        </li>
        <li class="nav-item ">
            <a href="oneplusbud.php" class="nav-link text-light"><h5>OnePlus</h5></a>
        </li> 
        <li class="nav-item ">
            <a href="boult.php" class="nav-link text-light"><h5>Boult</h5></a>
        </li>
        <!-- <li class="nav-item ">
            <a href="index1.php" class="nav-link text-light"><h5>Others</h5></a>
        </li> -->
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