<nav class="navbar navbar-default mc-dash-nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="./"><img class="mc-nav-logo" src="./assets/images/icons/fleet.svg"><span></span>
      <!-- <div class="mc-buyer-name"></div> -->
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav mc-dash-mid">
        <li class="active"><a class="mc-load li_sidebar" href="passengers">Passengers</a></li>
        <li><a class="mc-load li_sidebar" href="drivers">Drivers</a></li>
        <li><a class="mc-load li_sidebar" href="partners">Partners</a></li>
        <li><a class="mc-load li_sidebar" href="invoice">Invoice</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Bookings, Names, Passsengers....." title="Type in a name"></li>
            <li class="dropdown"><a href=""  class="dropdown-toggle custom-arrow">Help</a>
                <div class="mc-dropdown-content mc-bx-shdw">
                <ul class="mc-drop-desc">
                    <li>Help Docs</li>
                    <li>Feedback</li>
                     <li>Raise Ticket</li>
                    <li>Live Chat</li>
                </ul>
                </div>
        </li>
        <li>
          <div class="mc-notify-badge">12</div>
          <a href="" data-toggle="modal" data-target="#notification-bar">Notifications</a>
        </li>
          <li class="dropdown">
            <a href="#"><img src="./assets/images/mc-male-avathar.png" alt="Avatar" class="mc-avatar-bar dropdown-toggle"></a>
            <div class="mc-dropdown-content mc-bx-shdw">
                <ul class="mc-drop-desc">
                    <li>Profile</li>
                    <li><a href="https://bookings.minicabee.co.uk/login">Logout</a></li>
                </ul>
                </div>
          </li>
      </ul>
    </div>
  </div>
</nav>   