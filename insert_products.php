<?php
include 'auth_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
body{
background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
min-height:100vh;
color:white;
}
.navbar{
background:linear-gradient(45deg,#141e30,#243b55) !important;
border-bottom:1px solid rgba(255,255,255,0.1);
}

.navbar .nav-link{
color:#00d4ff !important;
font-weight:600;
}
.bg-secondary{
background:rgba(255,255,255,0.08) !important;
backdrop-filter:blur(12px);
border-radius:12px;
border:1px solid rgba(255,255,255,0.2);
margin-bottom:15px;
}
.bg-secondary p{
font-size:18px;
font-weight:600;
color:#00d4ff;

text-shadow:
0 0 5px #00d4ff,
0 0 10px rgba(0,212,255,0.5);
}
button{
border:none;
background:none;
margin:5px;
}

button a.nav-link{
padding:10px 30px;
border-radius:8px;
font-weight:600;
background:linear-gradient(45deg,#00d4ff,#0072ff);
color:white !important;

transition:0.3s;
}

button a.nav-link:hover{
transform:scale(1.05);

box-shadow:
0 0 10px rgba(0,212,255,0.7),
0 0 20px rgba(0,212,255,0.5);
}
.btn-secondary{
background:linear-gradient(45deg,#ff4b2b,#ff416c);
border:none;
}

.btn-secondary:hover{
transform:scale(1.05);
box-shadow:0 0 10px rgba(255,65,108,0.6);
}
.bg-info{
background:linear-gradient(45deg,#141e30,#243b55) !important;
color:white;
}
h3{
color:#00d4ff;
font-weight:600;

}
.bg-light{
background:rgba(255,255,255,0.08) !important;
backdrop-filter:blur(10px);
border-radius:10px;
}
.nav-linkwelcome{
font-size:18px;
font-weight:600;
color:#00d4ff !important;

text-shadow:
0 0 5px #00d4ff,
0 0 10px rgba(0,212,255,0.5);
}
.button {
  display: flex;
  flex-wrap: wrap;   /* 🔥 MAIN FIX */
  gap: 10px;
}
/* ========================= */
/* 📱 MOBILE FIX */
/* ========================= */
@media (max-width: 576px) {

  .bg-secondary {
    flex-direction: column;   /* 🔥 vertical layout */
    align-items: center !important;
    text-align: center;
    padding: 15px;
  }

  .px-5 {
    padding: 0 !important;
    margin-bottom: 10px;
  }

  .button {
    justify-content: center;
  }

  button a.nav-link {
    padding: 8px 15px;
    font-size: 13px;
  }

  h3 {
    font-size: 18px;
  }

  .nav-linkwelcome {
    font-size: 14px;
    text-align: center;
  }
}

/* ========================= */
/* 📱 TABLET */
/* ========================= */
@media (min-width: 577px) and (max-width: 991px) {

  .button {
    justify-content: center;
  }

  button a.nav-link {
    padding: 10px 20px;
    font-size: 14px;
  }
}

/* ========================= */
/* 💻 LAPTOP */
/* ========================= */
@media (min-width: 992px) {

  .button {
    justify-content: flex-start;
  }

}
    </style>

</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid justify-content-left">
                <!-- <img src="../image/logo.png" alt="" class="logo"> -->
                <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link nav-linkwelcome">Welcome Deepak Sir</a>
                </li>
            </ul>
            </nav>
            </div>
        </nav>
        <!-- second child -->
         <div class="bg-light">
         <a href="home.php" class="btn btn-secondary">⬅️ Back</a>
            <h3 class="text-center p-2 text-white">Manage / Insert Products</h3>
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