<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BATAS | Batik Tasik</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <section class="main">
    <header>
      <div class="toggle"></div>
      <ul class="navigation">
        <li><a href="#">Home</a></li>
        <li><a href="#">Menu</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </header>
    <div class="content">
      <div class="text">
        <h2>Elegansi Merona<br>dari Warisan<span> Klasik!</span></h2>
        <p>Batik Indonesia: Kisah keindahan budaya dalam setiap motif kain. Simbol warisan yang mempesona, mencerminkan sejarah, kearifan lokal, dan keindahan tak terkalahkan dari Indonesia.</p>
        <a href="<?php echo base_url('welcome') ?>" class="btn">Order Now</a>
      </div>
      <div class="slider">
        <div class="slides active">
          <img src="./assets/img/tamu/Picture1.png">
        </div>
        <div class="slides">
          <img src="./assets/img/tamu/Picture2.png">
        </div>
        <div class="slides">
          <img src="./assets/img/tamu/Picture3.png">
        </div>
        <div class="slides">
          <img src="./assets/img/tamu/Picture4.png">
        </div>
        <div class="slides">
          <img src="./assets/img/tamu/Picture5.png">
        </div>
        <div class="slides">
          <img src="./assets/img/tamu/Picture6.png">
        </div>
        <div class="slides">
          <img src="./assets/img/tamu/Picture7.png">
        </div>
        <div class="slides">
          <img src="./assets/img/tamu/Picture8.png">
        </div>
        <div class="slides">
          <img src="./assets/img/tamu/Picture9.png">
        </div>
      </div>
    </div>

    <div class="footer">
      <ul class="sci">
        <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
      </ul>
      <div class="prevNext">
        <p>Local Pride</p>
        <span class="prev"><ion-icon name="chevron-back-outline"></ion-icon></span>
        <span class="next"><ion-icon name="chevron-forward-outline"></ion-icon></span>
      </div>
    </div>
  </section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script>
    //toggle 
    const menutoggle = document.querySelector('.toggle');
    const navigation = document.querySelector('.navigation');
    menutoggle.onclick = function() {
      menutoggle.classList.toggle('active')
      navigation.classList.toggle('active')
    }

    //slider
    const slides = document.querySelectorAll('.slides');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');

    i = 0;

    function ActiveSlide(n) {
      for (slide of slides)
        slide.classList.remove('active');
      slides[n].classList.add('active');
    }

    // function for next btn
    next.addEventListener('click', function() {
      if (i == slides.length - 1) {
        i = 0;
        ActiveSlide(i);
      } else {
        i++;
        ActiveSlide(i);
      }
    })

    // function for prev btn
    prev.addEventListener('click', function() {
      if (i == 0) {
        i = slides.length - 1;
        ActiveSlide(i);
      } else {
        i--;
        ActiveSlide(i);
      }
    })
  </script>
</body>

</html>