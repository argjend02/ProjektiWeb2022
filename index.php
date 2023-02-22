<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width-device, initial-scale = 1.0">
  <title>Tech Shop</title>

  <link rel="stylesheet" href="style.css" />
  <style>
    /* .slider2 {
      width: 100%;
      height: 300px;
      overflow: hidden;
    }

    .foto2 {
      display: flex;
      width: 200%;
      animation: slide 15s linear infinite;
    }

    .foto2 img {
      width: 25%;
    }

    @keyframes slide {
      0% {
        transform: translateX(0%);
      }

      100% {
        transform: translateX(-100%);
      }
    } */
  </style>

</head>
<?php include "header.php"; ?>

<body style="height: 100vh; width: 100vw;">

  <div class="header2">
    <div id="elements">
      <ul>
        <li><a href="products.php">All Categories</a></li>
        <li><a href="#">White Tech</a></li>
        <li><a href="#">TV</a></li>
        <li><a href="#">Laptops</a></li>
        <li><a href="#">Consoles</a></li>
        <li><a href="#">Smartphones</a></li>
      </ul>
    </div>
  </div>
  <main>
    <!-- <div class="slider2">
      <div class="foto2">
        <img src="playstation.png" alt="" />
        <img src="watch.png" alt="" />
        <img src="sony.png" alt="" />
        <img src="playstation.png" alt="" />
        <img src="watch.png" alt="" />
        <img src="sony.png" alt="" />
      </div>
    </div> -->
    <div class="slider">
      <div class="foto">
        <img id="photo" src="fotot/mac8.jpeg" alt="" />
        <img id="photo" src="fotot/pht3.jpeg" alt="" />
        <img id="photo" src="fotot/ph5.jpeg" alt="" />
        <img id="photo" src="fotot/pht7.jpeg" alt="" />
      </div>
    </div>

    <div class="upperbutton">
      <div class="buttons">
        <label id="button1" onclick="showPht1()"></label>
        <label id="button2" onclick="showPht2()"></label>
        <label id="button3" onclick="showPht3()"></label>
        <label id="button4" onclick="showPht4()"></label>
      </div>
    </div>


  </main>


  <!-- <main>
    <div class="slider">
      <div class="foto">
        <img id="photo1" src="fotot/mac8.jpeg" alt="" />
        <img id="photo2" src="fotot/pht3.jpeg" alt="" />
        <img id="photo3" src="fotot/ph5.jpeg" alt="" />
        <img id="photo4" src="fotot/pht7.jpeg" alt="" />
      </div>
      <div class="buttons">
        <label for="photo1"></label>
        <label for="photo2"></label>
        <label for="photo3"></label>
        <label for="photo4"></label>
      </div>
    </div>
  </main> -->



  <?php include "footer.php"; ?>
  <script>

    var pht1 = document.getElementById("photo");
    function showPht1() {
      pht1.style.marginLeft = "0";
    }

    function showPht2() {
      pht1.style.marginLeft = "-25%";

    }

    function showPht3() {
      pht1.style.marginLeft = "-50%";

    }


    function showPht4() {
      pht1.style.marginLeft = "-75%";

    }


  </script>
  </div>
</body>

</html>