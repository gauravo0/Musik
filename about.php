<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: musicplayer.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: musicplayer.php");
                            
                        }
                    }

                }

    }
}    


}


?>


<!DOCTYPE html>
<html>
  <head>
    <title>MUSIK- The music player</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body>
    <ul>
    <li><a href="home.php">Home</a></li>
      <li><a href="contact.php">Register</a></li>
      <li><a href="about.php">Log In</a></li>
      <!-- <li><a href="musicplayer.php">Music Player</a></li> -->
    </ul>
    <div class="contact section bd-container" id="contact">
      <div class="contact__container bd-grid">
    <div class="contact__data">
      <h2 class="contact__description">Login To Listen.</h2>
    </div>
      <div class="login">
      <form action="" method="post" onsubmit="return(validate());">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
      </div>
    </div>
    <div>
      <h1 class="abt">MUSIK</h1>
      <h5 class="abt">May 28, 2021</h5>
      <p class="abt">
        Pop is a genre of popular music that originated in its modern form
        during the mid-1950s in the United States and the United Kingdom.The
        terms popular music and pop music are often used interchangeably,
        although the former describes all music that is popular and includes
        many disparate styles.<br /><br />
        During the 1950s and 1960s, pop music encompassed rock and roll and the
        youth-oriented styles it influenced. Rock and pop remained roughly
        synonymous until the late 1960s, after which pop became associated with
        music that was more commercial, ephemeral, and accessible.
      </p>
      <p class="abt">
        <br /><br />A lightweight music streaming site <br />
        Just for <strong>YOU</strong>.<br />
      </p>
    </div>
    <div>
      <p>@Copyright Musik 2021</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>

  </script>
  </body>
</html>
