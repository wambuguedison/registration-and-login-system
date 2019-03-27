"use strict";

const print = function(input) {
  console.log(input);
};

const validateLogin = function() {
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  let span = document.getElementsByTagName("span");

  if (username == "" && password == "") {
    span[0].innerHTML = "Username is Empty";
    span[1].innerHTML = "Password is Empty";
    for (let index = 0; index < span.length; index++) {
      span[index].style.color = "red";
    }
    return false;
  }
  if (username == "") {
    span[0].innerHTML = "Username is Empty";
    span[0].style.color = "red";
    return false;
  }
  if (password == "") {
    span[1].innerHTML = "Password is Empty";
    span[1].style.color = "red";
    return false;
  }
  if (username != "" && password != "") {
    return true;
  }
};

const visibility = function() {
  let password = document.getElementById("password");
  let eye = document.getElementById("eye");

  if (password.type == "password") {
    password.type = "text";
    eye.classList.remove("fa-eye");
    eye.classList.add("fa-eye-slash");
  } else {
    if (password.type == "text") {
      password.type = "password";
      eye.classList.remove("fa-eye-slash");
      eye.classList.add("fa-eye");
    }
  }
};

const visibilityReg = function() {
  let password = document.getElementById("password");
  let confirm = document.getElementById("confirmPassword");
  let eye = document.getElementById("eye");
  if (password.type == "password") {
    password.type = "text";
    confirm.type = "text";
    eye.classList.remove("fa-eye");
    eye.classList.add("fa-eye-slash");
  } else {
    if (password.type == "text") {
      password.type = "password";
      confirm.type = "password";
      eye.classList.remove("fa-eye-slash");
      eye.classList.add("fa-eye");
    }
  }
};

const validateRegister = function() {
  let fName = document.getElementById("fName").value;
  let lName = document.getElementById("lName").value;
  let email = document.getElementById("email").value;
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  let confirm = document.getElementById("confirmPassword").value;
  let span = document.getElementsByTagName("span");

  for (let index = 0; index < span.length; index++) {
    span[index].innerHTML = "";
  }

  if (
    fName == "" &&
    lName == "" &&
    email == "" &&
    username == "" &&
    password == "" &&
    confirm == ""
  ) {
    span[0].innerHTML = "Please Enter First Name";
    span[1].innerHTML = "Please Enter Last Name";
    span[2].innerHTML = "Please Enter Email";
    span[3].innerHTML = "Please Enter Username";
    span[4].innerHTML = "Please Enter Password";
    span[5].innerHTML = "Please Confirm Password";
    for (let index = 0; index < span.length; index++) {
      span[index].style.color = "red";
    }
    return false;
  }

  if (fName == "") {
    span[0].innerHTML = "Please Enter First Name";
    span[0].style.color = "red";
    return false;
  }
  if (lName == "") {
    span[1].innerHTML = "Please Enter Last Name";
    span[1].style.color = "red";
    return false;
  }
  if (email == "") {
    span[2].innerHTML = "Please Enter Email";
    span[2].style.color = "red";
    return false;
  }
  if (username == "") {
    span[3].innerHTML = "Please Enter Username";
    span[3].style.color = "red";
    return false;
  }
  if (password == "") {
    span[4].innerHTML = "Please Enter Password";
    span[4].style.color = "red";
    return false;
  }
  if (confirm == "") {
    span[0].innerHTML = "Please Enter Confirm Password";
    span[0].style.color = "red";
    return false;
  }

  if (password.length < 6) {
    span[4].innerHTML =
      "Password Should Be Atleast <strong> 6 </strong> Characters ";
    span[4].style.color = "red";
    return false;
  }
  if (confirm != password) {
    span[5].innerHTML = "Passwords Do NOT Match";
    span[5].style.color = "red";
    return false;
  }
  if (
    fName == "" &&
    lName == "" &&
    email == "" &&
    username == "" &&
    password == "" &&
    confirm == "" &&
    confirm === password
  ) {
    return true;
  }
};

//Profile
const profile = function(id) {
  var data = { id: id };

  //console.log(id);
  $.ajax({
    type: "POST",
    url: "includes/profile.php",
    data: { id: id },
    success: function(data) {
      jQuery("body").append(data);
      //window.location = "includes/profile.php";
    },
    error: function() {
      alert("Something went wrong!");
    }
  });
};

const test = function(id) {
  const requestData = {
    id: id
  };

  const usersPromise = fetch("includes/profile.php", {
    method: "POST",
    body: JSON.stringify(requestData)
  })
    .then(response => {
      if (!response.ok) {
        throw new Error("Got non-2XX response from API server.");
      }
      return response.json();
    })
    .then(responseData => {
      return responseData.users;
    });

  usersPromise.then(
    users => {
      console.log("known users: ", users);
    },
    error => {
      console.error("Failed to fetch users due to error", error);
    }
  );
};
