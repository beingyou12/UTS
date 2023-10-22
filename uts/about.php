<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/user_header.php'; ?>
<div class="heading">
   <h3>about us</h3>
   <p><a href="index.php">Home</a> <span> / About</span></p>
</div>
<section class="about">
   <div class="row">
      <div class="image">
         <img src="images/dompet.jpg" alt="">
      </div>
      <div class="content">
         <h3>Tagaku (大学生の食べ物）</h3>
         <p>Kami mengerti bahwa sebagai mahasiswa, Anda mencari tempat yang istimewa tanpa harus menguras kantong Anda.
         Kami dengan bangga mempersembahkan pengalaman kuliner Jepang yang autentik dengan harga yang terjangkau untuk para mahasiswa. 
         Kami adalah tempat yang sempurna untuk bersantai bersama teman-teman setelah berjam-jam belajar atau untuk merayakan momen istimewa dalam hidup Anda.
         Kami juga menawarkan promo spesial untuk mahasiswa, jadi pastikan untuk menanyakan kepada staf kami tentang penawaran terbaru kami. Kami ingin memberikan pengalaman kuliner Jepang yang tak terlupakan tanpa membebani kantong Anda.  </p>
         <a href="menu.php" class="btn">our menu</a>
      </div>
   </div>
</section>

<section class="steps">
   <h1 class="title">simple steps</h1>
   <div class="box-container">
      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>choose order</h3>
         <p>Order yang mudah</p>
      </div>
      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>fast delivery</h3>
         <p>Pengantaran yang cepat dan tepat</p>
      </div>
      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>enjoy food</h3>
         <p>Makanan yang sudah jelas kenikmatannya</p>
      </div>
   </div>
</section>

<section class="reviews">
   <h1 class="title">About Us</h1>
   <div class="swiper reviews-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide slide">
            <img src="images/andre.jpeg" alt="">
            <p> Hidup memang berat, tetapi ketika dikasih cobaan jangan dicobain</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Andre Gamalion</h3>
         </div>
         <div class="swiper-slide slide">
            <img src="images/teuku.jpeg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias ut earum nulla sint voluptatum labore nemo.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Teuku Fazariz</h3>
         </div>
         <div class="swiper-slide slide">
            <img src="images/arya.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias ut earum nulla sint voluptatum labore nemo.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Arya Reswara</h3>
         </div>
         <div class="swiper-slide slide">
            <img src="images/riffa.jpeg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias ut earum nulla sint voluptatum labore nemo.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Riffa Putra</h3>
         </div>
      </div>
      <div class="swiper-pagination"></div>
   </div>
</section>
<div class="line"></div>
<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

<script>
var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});
</script>
</body>
</html>