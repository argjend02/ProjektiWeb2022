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
  <?php include('header.php') ?>
  <div class="container">
    <div class="form-box" id='formbox'>
      <h1 id="title">Register</h1>
      <?php
      include 'database/user.php';
      $model = new User();
      $model->loginOrRegister();
      ?>
      <form method="post" id="form">
        <div class="input-group">
          <div class="input-field" id="nameField">
            <img id="foto" src="fotot/user.png " style="width: 30px" />
            <input type="text" name="name" placeholder="Name" id="nameInput" />
          </div>


          <div class="input-field" id="surnameField">
            <img id="foto" src="fotot/user.png " style="width: 30px" />
            <input type="text" name="surname" placeholder="Surname" id="surnameInput" />
            <div id="email_error">Please fill your Surname</div>
          </div>


          <div class="input-field" id="dateField">
            <img id="foto" src="fotot/kalendari.jpg " style="width: 20px; margin-left: 5px;" />
            <input type="date" name="birthdate" placeholder="Ditelindja" id="dateInput" />
            <div id="email_error">Please fill Date of Birth</div>
          </div>

          <div class="input-field">
            <img id="foto" src="fotot/mail.png" style="width: 30px" />
            <input type="email" name="email" placeholder="Email" id="emailInput" />
            <div id="email_error">Please fill your Email</div>
          </div>

          <div class="input-field">
            <img id="foto" src="fotot/lock.png" style="width: 26px" />
            <input type="password" name="password" placeholder="Password" id="passwordInput" />
            <div id="email_error">Please fill your Password</div>
          </div>
          <p>Lost password <a href="#">Click here!</a></p>
        </div>

        <input type="text" id="type" class="invisible" name="type" value="singUp">

        <div class="btn-field" id='btn'>
          <button type="button" id="signupbtn">Register</button>
          <button type="button" id="signinbtn" class="disable">
            Log In
          </button>
        </div>
      </form>
    </div>
  </div>

  <?php include('footer.php') ?>
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

      if (isSignin) {
        if (!signinbtn.classList.contains('disable')) {
          type.value = "signIn"
          signinbtn.type = "submit"
          signinbtn.click()
        }
      } else {
        isSignin = true;
        isRegister = false;
      }

    };

    signupbtn.onclick = function () {

      console.log('nameINPut', nameInput.value === "");
      console.log('surnameINPut', surnameInput.value === "");
      console.log('dateINPut', dateInput.value === "");
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


      if (isRegister) {
        if (!validateName(nameInput.value)) alert("Wrong name format")
        if (!validateSurname(surnameInput.value)) alert("Wrong surnaname format")
        if (!validateBirthdate(dateInput.value)) alert("Wrong date format")
        if (!ValidateEmail(emailInput.value)) alert("Wrong email format")
        if (!validatePassword(passwordInput.value)) alert("Wrong password format. It must contain an uppercase letter and be at least 8 characters.")
        else if (emailInput.value in users) alert("A user with this email already exists")
        if (false) { }
        else {
          if (passwordInput.value === "") alert("Please add a password")
          else {
            if (!signupbtn.classList.contains('disable')) {
              type.value = "signUp"
              signupbtn.type = "submit"
              signupbtn.click();
            }
            users[emailInput.value] = passwordInput.value;
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
      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
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
</body>

</html>