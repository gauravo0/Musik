<!DOCTYPE html>
<html>
  <head>
    <title>MUSIK</title>
    <style>
      h1{text-align: center;}
      h3{text-align: center;}
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel ="shortcut icon" type = "image/x-icon" href="favicon.ico"/>
  </head>

  <body>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="contact.php">Register</a></li>
      <li><a href="about.php">Log In</a></li>
      <!-- <li><a href="musicplayer.php">Music Player</a></li> -->
    </ul>
    <div>
      <h2>Welcome to MUSIK.</h2>
</div>
<div>
      <h3 class="contact__description">Collaborate With US.</h3>
      </div>
      <div>
      <div class="login">
      <form action="" method="post" onsubmit="return(validate());">
  <div class="form-group">
    <label for="exampleInputEmail1">Email  Address</label>
    <input type="text" name="Email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone number</label>
    <input type="text" name="number" class="form-control" id="exampleInputPassword1" placeholder="phone number">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
      </div>
      
      <div>
      <h3><i>MUSIK is a lightweight website made by some passionate musicians</br>
         to help aspiring artists gain more popularity and traction.</i></h3>
    </div>
<script>
function validate(){ 
    var num=document.getElementById("exampleInputPassword1").value;
		var x=document.getElementById("email").value;
    var phoneno = /^\d{10}$/;
    var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
  return false;  
  }
  else if(!num.match(phoneno))
  {
    alert("Enter a valid Contact number");
        return false;
        }  
    
      }

</script>
    
  </body>
</html>
