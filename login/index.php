
 <?php
  session_destroy();
session_start();

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
              <input type="text" name="user" placeholder="Enter Username"/>
              <input type="password" name="password" placeholder="Enter Password"/>
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


        <style>
          .mc-login-form
{
    font-family: "montserrat", sans-serif;
    max-width:500px;
    width:100%;
    margin:0px auto 0;
    padding:10% 0 0;
}
.mc-login-vector
{
    position: absolute;
    bottom:0px;
    right:10px;
    max-width:500px;
    width:100%;
}
.mc-login-form h3
{
    text-align: center;
    padding:10px;
    font-weight:700;
}
.mc-login-form p
{
    text-align: center;
    font-weight:400;
}
.mc-login-form .form {
    font-family: "montserrat", sans-serif;
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0), 0 5px 5px 0 rgba(0, 0, 0, 0.09);
  }
  .mc-login-form .form input {
    font-family: "montserrat", sans-serif;
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 13px;
  }
  .mc-login-form .form button {
    font-family: "montserrat", sans-serif;
    outline: 0;
    font-weight:800;
    text-transform: uppercase;
    background: #f05363;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 15px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
  }
  .mc-login-form .form button:hover, .mc-login-form .form button:active, .mc-login-form .form button:focus {
    background: #43A047;
  }
  .mc-login-form .form .message {
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 12px;
  }
  .mc-login-form .form .message a {
    color: #4CAF50;
    text-decoration: none;
  }
  .mc-login-form .form .register-form {
    display: none;
  }
</style>
</body>
</html>
