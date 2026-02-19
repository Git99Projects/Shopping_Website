<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
     integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- css file -->
     <!-- <link rel="stylesheet" href="../style.css"> -->
      <style>
button a.nav-link {
  padding: 10px 30px;
  border-radius: 5px;
  font-weight: bold;
}

    </style>

</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <!-- <img src="../image/logo.png" alt="" class="logo"> -->
                <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome Deepak</a>
                </li>
            </ul>
            </nav>
            </div>
        </nav>
        <!-- second child -->
         <div class="bg-light">
         <a href="home.php" class="btn btn-secondary">⬅️ Back</a>
            <h3 class="text-center p-2">Manage / Insert Products</h3>
         </div>
         <!-- third child -->
          <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <!-- <a href="#"><img src="../image/s1.avif" alt="" class="admin_image"></a> -->
                    <p class="text-light text-center">Smartphone</p>
                </div>
                <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center">
                <button><a href="home_add_products.php" class="nav-link text-light bg-info my-1">Home Products</a></button>
            <button><a href="apple_add_products.php" class="nav-link text-light bg-info my-1">Apple Products</a></button>
            <button><a href="samsung_add_products.php" class="nav-link text-light bg-info my-1">Samsung Products</a></button>
            <button><a href="xiaomi_add_products.php" class="nav-link text-light bg-info my-1">Xiaomi Products</a></button>
            <button><a href="oneplus_add_products.php" class="nav-link text-light bg-info my-1">OnePlus Products</a></button>
           
                </div>
            </div>
          </div><br>

          <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <!-- <a href="#"><img src="../image/s1.avif" alt="" class="admin_image"></a> -->
                    <p class="text-light text-center">Laptops</p>
                </div>
                <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center">
            <button><a href="hp_add_products.php" class="nav-link text-light bg-info my-1">HP Products</a></button>
            <button><a href="dell_add_products.php" class="nav-link text-light bg-info my-1">DELL Products</a></button>
            <button><a href="macbook_add_products.php" class="nav-link text-light bg-info my-1">MacBook Products</a></button>
                </div>
            </div>
          </div><br>

<div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <!-- <a href="#"><img src="../image/s1.avif" alt="" class="admin_image"></a> -->
                    <p class="text-light text-center">Headphones</p>
                </div>
                <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center">
            <button><a href="boat_add_products.php" class="nav-link text-light bg-info my-1">boAT Products</a></button>
            <button><a href="oneplusbud_add_products.php" class="nav-link text-light bg-info my-1">OnePlus Products</a></button>
            <button><a href="boult_add_products.php" class="nav-link text-light bg-info my-1">Boult Products</a></button>
                </div>
            </div>
          </div>

     </div>
     
     <!-- fourth child -->
      <div class="container my-3">
        
      </div>
     <!-- last child -->
 <div class="bg-info p-3 text-center">
    <p>All rights reserved  Designed by<font color="blue"> Deepak kumar singh and Manoj </font></p>
 </div>
    </div>

 <!-- bootstarp js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>