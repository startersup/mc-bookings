
 <?php
session_start();
 session_destroy();
 ?>


<!DOCTYPE html>
<html lang="en" id="html">
<head>
  <title>App Login | Minicabee Travel Solutioms</title>
  <meta charset="utf-8">
  <link rel="icon" href="../assets/images/icons/fleet.png" type="image/x-icon" sizes="16x16" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://bookings.minicabee.co.uk/assets/css/style.css">
</head>
<body>

    <!----navbar-starts----->
<nav class="navbar navbar-default mc-dash-nav">
  <div class="container-fluid">
    <div class="navbar-header">
 <a class="navbar-brand" href="./"><img class="mc-nav-logo" src="/assets/images/icons/fleet.svg"><div class="mc-buyer-name">Minicabee Travel Solutions</div></a>
    </div>
  
  </div>
</nav>  <!----navbar-ends----->
    

    
    <!---mainbar-starts----->
    
      <div class="container">
        <center><img class="mc-login-vector" src="../assets/images/login-vectors.svg"></center>
        <div class="mc-login-form">
          <h3>Welcome Back!</h3>
          <p>Have a nice and profitable day ahead 😀</p>
          <div class="form">
          <div class="tab-content">
            <div id="mc-login" class="tab-pane fade in active">
            <form class="login-form" action="getUserInfo.php" method="post">
              <input type="text" name="user" placeholder="userName"/>
              <input type="password" name="password" placeholder="password"/>
              <button id="login">login</button>
              <p class="message">Forgot Password? <a  data-toggle="pill" href="#reset-pass">Click here</a></p>
            </form>
          </div>
            <div id="reset-pass" class="tab-pane fade">
              <input type="text" placeholder="Enter Email Address"/>
              <button id="reset">Reset Password</button>
              <p class="message">Back to Login <a  data-toggle="pill" href="#mc-login">Click here</a></p>
              </div>
          </div>
        </div>
      </div>
        </div>
</body>
</html>
