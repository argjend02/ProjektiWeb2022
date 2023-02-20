<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact</title>

  <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: rgb(246, 241, 241)">
  <?php include('header.php') ?>

  <div class="m">
    <div class="majt">
      <ul>
        <li>
          <h2>Prishtine</h2>
          <p>
            Rruga Adem Jashari 195 <br />
            Prishtine 10130 <br />
            049822822
          </p>
        </li>
        <li>
          <h2>Ferizaj</h2>
          <p>
            Rruga Ahmet Kaçiku 135<br />
            Ferizaj 70040 <br />
            049822833
          </p>
        </li>
        <li>
          <h2>Gjilan</h2>
          <p>
            Rruga Agim Ramadani 88 <br />
            Gjilan 61000 <br />
            043624812
          </p>
        </li>
      </ul>
    </div>
  </div>

  <div class="main3">
    <div class="contact">
      <img src="fotot/maps1_.png" alt="" style="width:100%" />
    </div>
  </div>

  <div class="g">
    <div class="getintouch">
      <h1>GET IN TOUCH!</h1>
      <h3>
        Our team works so hard only for costumers to have the best <br />
        possible experience in our webpage. If u have any request, <br />
        complaint or advice, feel free to contact us!
      </h3>
    </div>
  </div>

  <div class="cf2">
    <div class="container">
      <form class="login_form" method="post" name="form">
        <div class="emri">Name</div>
        <input type="text" name="name2" />
        <div id="name_error">Please fill up your name</div>

        <div class="mbiemri">Surname</div>
        <input required type="text" name="surname" />
        <div id="surname_error">Please fill up your surname</div>

        <div class="font">Email or Phone</div>
        <input autocomplete="off" type="email" name="email" />
        <div id="email_error">Please fill up your Email or Phone</div>

        <div class="font2">Please type your request</div>
        <input type="textbox" name="password" style="height: 80px" />
        <div id="pass_error">Please fill up your request</div>

        <h3 id="success_message" style="display: none; color: green">
          Your request is approved!
        </h3>
        <button type="button" onclick="validated()">Submit</button>
      </form>
    </div>
  </div>
  <?php include('footer.php') ?>
  <script src="valid.js"></script>
</body>

</html>