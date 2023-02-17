<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name = "viewport" content="width-device, initial-scale = 1.0">
    <title>Tech Shop</title>

    <link rel="stylesheet" href="style.css" />
  </head>
  <body style="height: 100vh; width: 100vw;">
    <?php include('header.php') ?>
    <div class="header2">
      <div id="elements">
        <ul>
          <li><a href="#">All Categories</a></li>
          <li><a href="#">White Tech</a></li>
          <li><a href="#">TV</a></li>
          <li><a href="#">Laptops</a></li>
          <li><a href="#">Consoles</a></li>
          <li><a href="#">Smartphones</a></li>
        </ul>
      </div>
    </div>
    <main>
      <div class="slider">
        <div class="foto">
          <img id="photo" src="mac8.jpeg" alt="" /> 
          <img id="photo" src="pht3.jpeg" alt="" />
           <img id="photo"src="ph5.jpeg" alt="" /> 
           <img id="photo"src="pht7.jpeg" alt="" />
        </div>
      </div>

      <div class="upperbutton">
        <div class="buttons">
          <label id="button1" onclick="showPht1()"></label>
          <label  id ="button2"onclick="showPht2()"></label>
          <label id= "button3"onclick="showPht3()"></label>
          <label  id = "button4"onclick="showPht4()"></label>
        </div>
      </div>
    </main>

    <?php include('footer.php') ?>

    <script>

      var pht1 = document.getElementById("photo");
      function showPht1(){
        pht1.style.marginLeft = "0";
      }

      function showPht2(){
        pht1.style.marginLeft = "-25%";

      }

        function showPht3(){
        pht1.style.marginLeft = "-50%";

      }


        function showPht4(){
        pht1.style.marginLeft = "-75%";

      }

        
  </script>
    </div>
  </body>
</html>