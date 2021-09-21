<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Username cannot be blank";
  } else {
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set the value of param username
      $param_username = trim($_POST['username']);

      // Try to execute this statement
      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "This username is already taken";
        } else {
          $username = trim($_POST['username']);
        }
      } else {
        echo "Something went wrong";
      }
    }
  }

  mysqli_stmt_close($stmt);


  // Check for password
  if (empty(trim($_POST['password']))) {
    $password_err = "Password cannot be blank";
  } elseif (strlen(trim($_POST['password'])) < 5) {
    $password_err = "Password cannot be less than 5 characters";
  } else {
    $password = trim($_POST['password']);
  }

  // Check for confirm password field
  if (trim($_POST['password']) !=  trim($_POST['confirm_password'])) {
    $password_err = "Passwords should match";
  }


  // If there were no errors, go ahead and insert into the database
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

      // Set these parameters
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      // Try to execute the query
      if (mysqli_stmt_execute($stmt)) {
        header("location:about.php");
      } else {
        echo "Something went wrong... cannot redirect!";
      }
    }
    mysqli_stmt_close($stmt);
  }
  mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>MUSIK</title>
  <style>
    h1 {
      text-align: center;
    }

    h3 {
      text-align: center;
    }

    .form-group {

      width: 800px;
      margin: 20px 0px 20px 500px;
      color: 256, 256, 256;
      padding: 0px 10px;
      border-radius: 15px;

    }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
</head>

<body>
  <i class='bx bx-chevron-up scrolltop__icon'></i>
  </a>
  <ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="contact.php">Register</a></li>
    <li><a href="about.php">Log In</a></li>
    <!-- <li><a href="musicplayer.php">Music Player</a></li> -->
  </ul>
  <div class="contact section bd-container" id="contact">
    <div class="contact__container bd-grid">
      <div class="contact__data">

        <h3 class="contact__description"> Hey, Music lovers register with us to enjoy uninterrupted and totally
        free music from a huge range of collections</h3>
        

      </div>
      <div class="container mt-4">

       
        <form action="" method="post" onsubmit="return(validate());" id="form" name="form">
          <div class="form-row">


            <div class="form-group">
              <h2 class="section-title">Register With US</h2>
              <label for="inputEmail4"><br> Username </br></label>
              <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Email">


              <label for="inputPassword4"><br> Password </br></label>
              <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">


              <label for="inputPassword4"><br>Confirm Password</br></label>
              <input type="password" class="form-control" name="confirm_password" id="inputPassword" placeholder="Confirm Password">


              <label for="inputAddress2"><br>Address</br></label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">



              <label for="inputCity"><br>City</br></label>
              <input type="text" class="form-control" id="inputCity">


              <label for="inputState"><br>State</br></label>
              <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
              </select>

              <label for="inputZip"><br>Zip</br></label>
              <input type="text" class="form-control" id="inputZip">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>

              <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
      </div>


    </div>
  </div>
  </div>


  <script>
    function validate() {
      var city=document.getElementById("inputCity").value;
      var zip=document.getElementById("inputZip").value;
      var add=document.getElementById("inputAddress2").value;
      var name = document.getElementById("inputEmail4").value;
      var password = document.getElementById("inputPassword4").value;
      var password2=document.getElementById("inputPassword").value;
      if (name == null || name == "") {
        alert("User name can't be blank");
        return false;
      } else if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
      }
      else if(password!=password2)
      {
        alert("please review your password");
        return false;
      }
      else if(add==null || add=="")
      {
        alert("Address must be required to be field");
        return false;
      }
      else if(city==null || city=="")
      {
        alert("city must be required to be field");
        return false;
      }
      else if(zip.length!=6)
      {
        alert("zip code must be of 6 digit.");
        return false;
      }

    }
  </script>

</body>

</html>