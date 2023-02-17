<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style1.css" />
  </head>
  <body style="background-color:rgb(217, 240, 244)">
    <div class="header">
      <div class="left-section">
        <h1 style="color: white; margin-left: 10px">Tech-Shop</h1>
        <img class="tech-logo" src="img/shopping-cart.png" />
      </div>
      <div class="middle-section">
        <input class="search-bar" type="text" placeholder="Search" />
        <button class="search-button">
          <img class="search-icon" src="icons/search.svg" alt="" />
        </button>
      </div>
      <div class="right-section">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="aboutus.html">About us</a></li>
          <li><a href="Contact.html">Contact</a></li>
          <li>
         
            <a href="login1.html">Log In</a>
          </li>
        </ul>
      </div>
    </div>
    
    <div class="container">
      <div class="form-box" id = 'formbox'>
        <h1 id="title">Register</h1>
        <?php
          include 'php/model.php';
          $model = new Model();
          $insert = $model->register();
          echo "<script>alert('works')</script>"
        ?>
        <form method="post" id="form">
          <div class="input-group">
            <div class="input-field" id="nameField">
              <img id="foto" src="user.png " style="width: 30px" />
              <input type="text" name="name" placeholder="Name" id="nameInput"/>
            </div>


            <div class="input-field" id="surnameField">
              <img id="foto" src="user.png " style="width: 30px" />
              <input type="text" name="surname" placeholder="Surname" id="surnameInput"/>
              <div id="email_error">Please fill your Surname</div>
            </div>


            <div class="input-field" id="dateField">
              <img id="foto" src="kalendari.jpg " style="width: 20px; margin-left: 5px;"/>
              <input type="date" name="birthdate" placeholder="Ditelindja" id="dateInput" />
              <div id="email_error">Please fill Date of Birth</div>
            </div>

            <div class="input-field">
              <img id="foto" src="mail.png" style="width: 30px" />
              <input type="email" name="email" placeholder="Email" id="emailInput" />
              <div id="email_error">Please fill your Email</div>
            </div>

            <div class="input-field">
              <img id="foto" src="lock.png" style="width: 26px" />
              <input type="password" name="password" placeholder="Password" id="passwordInput"/>
              <div id="email_error">Please fill your Password</div>
            </div>
            <p>Lost password <a href="#">Click here!</a></p>
          </div>

          <input type="text" id="type" class="invisible" name="type" value="singUp">

          <div class="btn-field" id = 'btn'>
            <button type="button" id="signupbtn">Register</button>
            <button type="button" id="signinbtn" class="disable">
              Log In
            </button>
          </div>
        </form>
      </div>
    </div>

    <script>
      let signupbtn = document.getElementById("signupbtn");
      let signinbtn = document.getElementById("signinbtn");
      let dateField = document.getElementById("dateField");
      let nameInput = document.getElementById("nameInput");
      let surnameInput = document.getElementById("surnameInput");
      let dateInput = document.getElementById("dateInput");
      let emailInput = document.getElementById("emailInput");
      let passwordInput = document.getElementById("passwordInput");
      let title = document.getElementById("title");
      let type = document.getElementById("type");

      let isRegister = true;
      let isSignin = false;

      let users = {}

      signinbtn.onclick = function () {
        nameField.style.maxHeight = "0";
        surnameField.style.maxHeight = "0";
        dateField.style.maxHeight = "0";
        title.innerHTML = "Log In";
        signupbtn.classList.add("disable");
        signinbtn.classList.remove("disable");

        if(isSignin) {
          if(!signinbtn.classList.contains('disable')) { 
            type.value = "signIn"
            signinbtn.type = "submit"
            signinbtn.click()
          }
          if(!(emailInput.value in users)) alert("This account doesnt exist. Please register!")
          else {
            if (users[emailInput.value] !== passwordInput.value) alert("Password is incorrect, please try again!")
            else window.location.href = "index.html"
          }
        } else {
          isSignin = true;
          isRegister = false;
        }

      };

      signupbtn.onclick = function () {

        console.log('nameINPut', nameInput.value ==="");
        console.log('surnameINPut', surnameInput.value ==="");
        console.log('dateINPut', dateInput.value ==="");
        console.log('emailinPUT ', emailInput.value === "")
        console.log('pass ', passwordInput.value === 'undefined')
        console.log('isSignin', isSignin)
        console.log('isRegister', isRegister)

        console.log("Users ", users)
        
        nameField.style.maxHeight = "60px";
        surnameField.style.maxHeight = "60px";
        dateField.style.maxHeight = "60px";
        title.innerHTML = "Register";
        signupbtn.classList.remove("disable");
        signinbtn.classList.add("disable");
        

        if (isRegister){
          // if(!validateName(nameInput.value)) alert("Wrong name format")
          // if(!validateSurname(surnameInput.value)) alert("Wrong surnaname format")
          // if(!validateBirthdate(dateInput.value)) alert("Wrong date format")
          // if (!ValidateEmail(emailInput.value)) alert("Wrong email format")
          // if(!validatePassword(passwordInput.value))alert("Wrong password format. It must contain an uppercase letter and be at least 8 characters.")
          // else if(emailInput.value in users) alert("A user with this email already exists")
          if(false){}
          else {
            if (passwordInput.value === "") alert("Please add a password")
            else {
              if(!signupbtn.classList.contains('disable')) { 
                type.value = "signUp"
                signupbtn.type = "submit"
                signupbtn.click();
              }
              users[emailInput.value]= passwordInput.value;
            }
          }
        } else {
          isRegister = true;
          isSignin = false;
        }
      };
      function validateName(name) {
  // The name should contain only letters and have a length of at least 2.
  const nameRegex = /^[A-Za-z]{2,}$/;
  return nameRegex.test(name);
}

function validateSurname(surname) {
  // The surname should contain only letters and have a length of at least 2.
  const surnameRegex = /^[A-Za-z]{2,}$/;
  return surnameRegex.test(surname);
}

function validateBirthdate(birthdate) {
  // The birthdate should be in the format YYYY-MM-DD and represent a date that is not in the future.
  const birthdateRegex = /^\d{4}-\d{2}-\d{2}$/;
  if (!birthdateRegex.test(birthdate)) {
    return false;
  }
  const birthdateObj = new Date(birthdate);
  const now = new Date();
  return birthdateObj.getTime() < now.getTime();
}

function validatePassword(password) {
  // The password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.
  const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
  return passwordRegex.test(password);
}
      

document.getElementById('dateInput').setAttribute('max', new Date().toISOString().split("T")[0])

      const ValidateEmail = (email) => {
          return String(email)
            .toLowerCase()
            .match(
              /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
};

    </script>



<div class="footer1">
  <div class="div1">
    <ul>
      <li style="color: black"><strong> MEET TECH-SHOP </strong></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Employment</a></li>
      <li><a href="#">Shops</a></li>
      <li><a href="#">Partners</a></li>
      <li><a href="#">Merchant Information</a></li>
    </ul>
  </div>

  <div class="div1">
    <ul>
      <li style="color: black"><strong> ORDERING AND DELIVERY </strong></li>
      <li><a href="#">Payment methods</a></li>
      <li><a href="#">Delivery methods</a></li>
      <li><a href="#">Frequently asked questions</a></li>
      <li><a href="#">Privacy Policy</a></li>
    </ul>
  </div>

  <div class="div1">
    <ul>
      <li style="color: black"><strong> ONLINE SHOPPING </strong></li>
      <li><a href="#">Instructions for online shopping</a></li>
      <li><a href="#">Terms of online shopping</a></li>
      <li><a href="#">Authorized services</a></li>
      <li><a href="#">Complaints</a></li>
      <li><a href="#">Legal entities</a></li>
    </ul>
  </div>

  <div class="div1">
    <ul>
      <li style="color: black"><strong> IN CENTRE OF ATTENTION</strong></li>
      <li><a href="#">Collect in store</a></li>
      <li><a href="#">Black Friday</a></li>
      <li><a href="#">Home-Tech</a></li>
      <li><a href="#">Brands</a></li>
      <li><a href="#">Blog</a></li>
    </ul>
  </div>

  <div class="ikonat">
    <ul>
      <li><img src="footer/visa.png" alt="" /></li>
      <li><img src="footer/appstore.png" alt="" /></li>
      <li><img src="footer/googleplay.png" alt="" /></li>
      <li><img src="footer/banca-intesa-min.png" alt="" /></li>
      <li><img src="footer/mastercard-id-check-min.png" alt="" /></li>
      <li><img src="footer/nlb-komercijalna-min.png" alt="" /></li>
      <li style="color: grey; font-size: small">
        Tech-Shop 2022 all rights reserved
      </li>
    </ul>
  </div>
  </body>
</html>