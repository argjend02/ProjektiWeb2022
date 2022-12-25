//Validtion Code For Inputs
// Validimi tek contact us

var email = document.forms["form"]["email"];
var password = document.forms["form"]["password"];
var name2 = document.forms["form"]["name2"];
var surname = document.forms["form"]["surname"];

var email_error = document.getElementById("email_error");
var pass_error = document.getElementById("pass_error");
var name_error = document.getElementById("name_error");
var surname_error = document.getElementById("surname_error");

var success_message = document.getElementById("success_message");

email.addEventListener("textInput", email_Verify);
password.addEventListener("textInput", pass_Verify);
name2.addEventListener("textInput", name_Verify);
surname.addEventListener("textInput", surname_Verify);

function validated() {
  if (name2.value.length < 1) {
    name2.style.border = "1px solid red";
    name_error.style.display = "block";
    name2.focus();
    success_message.style.display = "none";
    return false;
  }

  if (surname.value.length < 1) {
    surname.style.border = "1px solid red";
    surname_error.style.display = "block";
    surname.focus();
    success_message.style.display = "none";
    return false;
  }

  if (!ValidateEmail(email.value)) {
    email.style.border = "1px solid red";
    email_error.style.display = "block";
    success_message.style.display = "none";
    email.focus();
    return false;
  }
  if (password.value.length < 6) {
    password.style.border = "1px solid red";
    pass_error.style.display = "block";
    password.focus();
    success_message.style.display = "none";
    return false;
  }

  email_Verify();
  pass_Verify();
  name_Verify();
  surname_Verify();

  if (email_Verify() && pass_Verify() && name_Verify() && surname_Verify()) {
    success_message.style.display = "block";
  } else {
    success_message.style.display = "none";
  }
}
function email_Verify() {
  if (ValidateEmail(email.value)) {
    email.style.border = "1px solid silver";
    email_error.style.display = "none";
    return true;
  }
  return false;
}
function pass_Verify() {
  if (password.value.length >= 5) {
    password.style.border = "1px solid silver";
    pass_error.style.display = "none";
    return true;
  }
  return false;
}

function name_Verify() {
  if (name2.value.length >= 1) {
    name2.style.border = "1px solid silver";
    name_error.style.display = "none";
    return true;
  }
  return false;
}

function surname_Verify() {
  if (surname.value.length >= 1) {
    surname.style.border = "1px solid silver";
    surname_error.style.display = "none";
    return true;
  }
  return false;
}

// function ValidateEmail(inputText) {
//   var mailformat = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
//   var emailsss = "Argjendazizi-36@gmail.com";
//   console.log(
//     "this is inputtext",
//     inputText,
//     "asdadsasdasd",
//     new RegExp(mailformat).test(emailsss)
//   );

//   return inputText.match(mailformat);
// }

const ValidateEmail = (email) => {
  return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};
