<!DOCTYPE html>
<html lang="en" id="html">
<head>
  <title>Mobile Book | Minicabee </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/images/icons/fleet.png" type="image/x-icon" sizes="16x16" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>    
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script src="../assets/js/mobileBooking.js"></script>
 
</head>
<body >
<div style="display:none;" id="map"></div>

<div id="spinnermodal" class="modal11 modal right fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
    style="    
  display: block;
  background-color: rgb(255, 255, 255);
  min-width: 1500px;
  top: 0px;
  left: 65px;
  border: none;">
    <div class="modal11-content">
      <div class="loader" style="max-width:100px;position:absolute;top:300px;left:650px;">
        <centre> <img width="80px;" src="./assets/images/icons/loader.svg"></centre>
      </div>
    </div>
  </div>
 <nav class="mc-mobile-navbar d-flex">
  <div class="container-fluid">
   <div class="navbar-logo">
    <a class="d-flex" href=""> 
<img class="mc-nav-logo" src="/assets/images/icons/fleet.svg"> <span>Bookings</span></a>   
   </div>   
  </div>
 </nav> 

<br><br><br><br>
 <section class="booking-form">
      <div class="tab-content">
        <div id="oneway" class="tab-pane fade in active">
    <div class="form-group">
        <label for="usr">Pickup from:</label>
        <input type="text" class="form-control form-feild" name="origin-input" id="origin-input" placeholder="Enter Pickup postcode" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="usr">Dropoff postcode:</label>
        <input type="text" class="form-control" name="destination-input" id="destination-input" placeholder="Enter Dropoff postcode" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="usr">Via Point:</label>
        <input type="text" class="form-control" name="via" placeholder="Enter Via Point" autocomplete="off">
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="usr">Pickup Date:</label>
            <input type="text" class="form-control" name="datepicker"  />
            <input type="hidden" name="date" class="form-control" >
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label for="usr">Pickup Time:</label>
            <select class="form-control" name="time">
                <option value="00:00">00:00</option>
                <option value="00:15">00:15</option>
                <option value="00:30">00:30</option>
                <option value="00:45">00:45</option>
                <option value="01:00">01:00</option>
                <option value="01:15">01:15</option>
                <option value="01:30">01:30</option>
                <option value="01:45">01:45</option>
                <option value="02:00">02:00</option>
                <option value="02:15">02:15</option>
                <option value="02:30">02:30</option>
                <option value="02:45">02:45</option>
                <option value="03:00">03:00</option>
                <option value="03:15">03:15</option>
                 <option value="3:30">03:30</option>
                <option value="03:45">03:45</option>
                <option value="04:00">04:00</option>
                <option value="04:15">04:15</option>
                <option value="04:30">04:30</option>
                <option value="04:45">04:45</option>
                <option value="05:00">05:00</option>
                <option value="05:15">05:15</option>
                <option value="05:30">05:30</option>
                <option value="05:45">05:45</option>
                <option value="06:00">06:00</option>
                <option value="06:15">06:15</option>
                <option value="06:30">06:30</option>
                <option value="06:45">06:45</option>
                <option value="07:00">07:00</option>
                <option value="07:15">07:15</option>
                <option value="07:30">07:30</option>
                <option value="07:45">07:45</option>
                <option value="08:00">08:00</option>
                <option value="08:15">08:15</option>
                <option value="08:30">08:30</option>
                <option value="08:45">08:45</option>
                <option value="09:00">09:00</option>
                <option value="09:15">09:15</option>
                <option value="09:30">09:30</option>
                <option value="09:45">09:45</option>
                <option value="10:00">10:00</option>
                <option value="10:15">10:15</option>
                <option value="10:30">10:30</option>
                <option value="10:45">10:45</option>
                <option value="11:00">11:00</option>
                <option value="11:15">11:15</option>
                <option value="11:30">11:30</option>
                <option value="11:45">11:45</option>
                <option value="12:00">12:00</option>
                <option value="12:15">12:15</option>
                <option value="12:30">12:30</option>
                <option value="12:45">12:45</option>
                <option value="13:00">13:00</option>
                <option value="13:15">13:15</option>
                <option value="13:30">13:30</option>
                <option value="13:45">13:45</option>
                <option value="14:00">14:00</option>
                <option value="14:15">14:15</option>
                <option value="14:30">14:30</option>
                <option value="14:45">14:45</option>
                <option value="15:00">15:00</option>
                <option value="15:15">15:15</option>
                <option value="15:30">15:30</option>
                <option value="15:45">15:45</option>
                <option value="16:00">16:00</option>
                <option value="16:15">16:15</option>
                <option value="16:30">16:30</option>
                <option value="16:45">16:45</option>
                <option value="17:00">17:00</option>
                <option value="17:15">17:15</option>
                <option value="17:30">17:30</option>
                <option value="17:45">17:45</option>
                <option value="18:00">18:00</option>
                <option value="18:15">18:15</option>
                <option value="18:30">18:30</option>
                <option value="18:45">18:45</option>
                <option value="19:00">19:00</option>
                <option value="19:15">19:15</option>
                <option value="19:30">19:30</option>
                <option value="19:45">19:45</option>
                <option value="20:00">20:00</option>
                <option value="20:15">20:15</option>
                <option value="20:30">20:30</option>
                <option value="20:45">20:45</option>
                <option value="21:00">21:00</option>
                <option value="21:15">21:15</option>
                <option value="21:30">21:30</option>
                <option value="21:45">21:45</option>
                <option value="22:00">22:00</option>
                <option value="22:15">22:15</option>
                <option value="22:30">22:30</option>
                <option value="22:45">22:45</option>
                <option value="23:00">23:00</option>
                <option value="23:15">23:15</option>
                <option value="23:30">23:30</option>
                <option value="23:45">23:45</option>
              </select>
          </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label for="usr">No of Passengers:</label>
              <select class="form-control" name="np">
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                </select>
            </div></div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="lugg">No of Luggages:</label>
                <select class="form-control" name="nl">
                  <option value="01">1</option>
                  <option value="02">2</option>
                  <option value="03">3</option>
                  <option value="04">4</option>
                  <option value="05">5</option>
                  <option value="06">6</option>
                  <option value="07">7</option>
                  <option value="08">8</option>
                  <option value="09">9</option>
                  <option value="10">10</option>
                  </select>
              </div>
              </div>
            
      </div>
      <div class="form-group">
                <label for="lugg">Cab Type:</label>
      <select name="cabType" id="cabType" onchange="setEstimate();" class="form-control" autocomplete="off">
              <option value="Saloon">Saloon</option>
              <option value="Estate">Estate</option>
              <option value="MPV-4">MPV 4</option>
              <option value="MPV-6">MPV 6</option>
              <option value="8-Seater">7 Seater</option>
              <option value="9-Seater">9 Seater</option>

            </select>
</div>

<div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="usr">Total Miles:</label>
    
            <input type="text" disabled name="" id="route_miles" class="form-control" >
          </div>
        </div>

        <div class="col-xs-6">
          <div class="form-group">
            <label for="usr">Total Time:</label>
    
            <input type="text" disabled name="" id="route_time" class="form-control" >
          </div>
        </div>

</div>

      <div class="mc-booking-information">

        <div class="form-group">
          <label for="usr">Passenger name:</label>
          <input type="text" name="name" class="form-control" placeholder="Enter Passenger Name" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="usr">Passenger Contact Number:</label>
          <input type="text" name="mobile1" class="form-control" placeholder="Enter Contact Number" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="usr">Payment Method:</label>
          <select class="select form-control" required="" id="pay" name="pay">
            <option value="card">Debit / Credit card </option>
            <option value="paypal">Paypal Transaction</option>
            <option value="cash">Cash on Ride</option>
          </select>
        </div>
        <div class="form-group">
          <label for="usr">Special Info:</label>
          <textarea rows="5" cols="50" name="info" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="usr">Total Fare:</label>
          <input type="text" class="form-control" name="fare" id="fare" value=""  />
        </div>
        <br><br>
      </div>  
      </div>
      <div id="successpage" class="tab-pane fade">
        <div class="booking-success">
         <h3>Booking Success!</h3> 
         <p>Your Booking Reference Id: <b>MCE2435</b></p>
         <br>
        <center> <a class="allocate-driver">Allocate Driver</a></center>
        <div class="allocate-driver-card">
          <div class="d-flex">
          <select name="drvid" id="drvid" class="selectit" autocomplete="off">
                      </select>
                       <select class="select form-control" style="width:75px;margin-left:-1px;"  required="" id="pay" name="pay">
            <option value="10">10% </option>
            <option value="15">15%</option>
            <option value="20">20%</option>
            <option value="25">25%</option>
          </select>
          <button class="allocate-btn">Allocate</button>
        </div>
        </div>
        <br><br>
        <table id="allocated-table" class="table table-fixed" cellspacing="0" width="100%" style="border:1px solid #e4e4e4;">
          <thead class="mc-table-head" style="border:1px solid #e4e4e4;background-color:#f4f4f4;">
              <tr style="border:1px solid #e4e4e4;">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Fare</th>
                  <th>Action</th>
                  
              </tr>
          </thead>
          <tbody id="Allocate_Table"><tr><td>BRT119</td><td>Apple cars</td><td>11.7</td><td>Allocated</td></tr></tbody>
        </table>
        </div>
        </div>
      </div>


 </section>
 
 <div class="footer">
 <div class="d-first d-flex">
  <div class="form-group">
    <button class="calculate-fare" >Calculate Fare</button>
   </div>
 </div>  
<div class="d-flex d-second">
 <p><span>12</span> Miles</p>   
 <p><span>1</span> hour </p>   
 <a class="book-now" data-toggle="pill" href="#successpage">Book now</a>
</div>
  </div>
  
  <script>

      
var placeSearch, autocomplete, autocomplete2, autocomplete3;

function initAutocomplete() {

    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */
        (document.getElementById('origin-input')), {
            types: ['geocode'],
            componentRestrictions: {
                country: 'uk'
            }
        });




    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);


    autocomplete2 = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */
        (document.getElementById('destination-input')), {
            types: ['geocode'],
            componentRestrictions: {
                country: 'uk'
            }
        });




    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete2.addListener('place_changed', fillInAddress);


    autocomplete3 = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */
        (document.getElementById('via')), {
            types: ['geocode'],
            componentRestrictions: {
                country: 'uk'
            }
        });




    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete3.addListener('place_changed', fillInAddress);


}


function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }
    var place = autocomplete2.getPlace();

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }

    var place = autocomplete3.getPlace();

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }



}


  
    setLoad();    </script>

<script async="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBauQAxB_oaAk4z-NQN2BkhmD4AxzA2l6M&amp;libraries=places&amp;callback=initAutocomplete" defer="" type="text/javascript"></script>

</body>
<style>
 .mc-mobile-navbar
 {
     height:50px;
     width:100%;
     z-index: 100;
     position: fixed;
     box-shadow: 0 0px 20px rgba(116, 113, 113, 0.1);
     background-color:#4E019F;
 }   
 .mc-nav-logo
 {
     margin:5px;
     max-width:40px;
     width:100%;
 }
 .navbar-logo span
 {
     padding: 5px;
    color: #ffffff;
    font-weight: bold;
    font-size: 16px;
    margin: 10px 0px;
 }
 .d-flex
 {
  display:flex;   
 }

.booking-form
{
    max-width:380px;
    width:100%;
    margin:0px auto 40px;
    padding:10px;
}
.nav-pills
{
    display: flex;
    position: fixed;
    width: 100%;
    background-color: #ffffff;
    top: 50px;
    border-bottom: 1px solid #efefef;
}
.nav-pills li
{
    width:50% !important; 
}
.nav-pills>li>a
{
color:#000000;
border-radius:0px;
text-align: center;
font-weight:600;
padding: 7px 15px;
letter-spacing: 0.5px;
}
.nav-pills>li.active>a
{
color: #fff;
background-color: #F5737F !important;
}
.form-control
{
    display: block;
    width: 100%;
    height: 40px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #f1f1f1;
    background-image: none;
    border: 1px solid #ccc; 
    border-radius:0px;
    box-shadow: none;
}
.mc-booking-information, .d-second
{
  display:none;
}
.d-first
{
  align-items: center;
  display: flex;
  justify-content: center;
  align-items: center;
}
.calculate-fare
{
    padding:5px 20px;
    border:none;
    margin-top: 8px;
    font-size:14px;
    font-weight:600;
    background-color:#6ce4a8;
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 45px;
  box-shadow: 0 1px 5px 3px rgba(46,50,52,0.1);
  background-color: #ffffff;
  color: #000000;
  text-align: center;
}
.footer p
{
  padding: 13px 20px;
    color: #000000;
    font-weight: 500;
}
.book-now
{
  text-decoration: none !important;
    padding: 14px 40px;
    color: #000000;
    background-color: #6ce4a8;
    position: absolute;
    font-weight: 600;
    right: 0;
    cursor: pointer;
}
.book-now:hover
{
  background-color:#3ec280;
  color:#ffffff;
  font-weight:bold;
}
.daterangepicker .calendar-table th, .daterangepicker .calendar-table td {
    white-space: nowrap;
    text-align: center;
    vertical-align: middle;
    min-width: 13px;
    width: 10px;
    height: 10px;
    border:1px solid #f4f4f4;
    line-height: 10px !important;
    font-size: 12px;
    border-radius: 4px;
    white-space: nowrap;
    cursor: pointer;
}
.daterangepicker td.active, .daterangepicker td.active:hover
{
  background-color: #4e019f;
  border-radius:0px !important;
}
.daterangepicker .drp-buttons
{
  border:none !important;
}
.btn-primary, .btn-primary:hover
{
  background-color:#4e019f;
  outline:none !important;
  border-radius:0px !important;
}
.booking-success h3 
{
  text-align:center;
  color:#3ec280;
  font-weight: 600;
  letter-spacing: 1px;
}
.booking-success p 
{
  text-align: center;
  color:#555;
}
.allocate-driver
{
  padding:5px 20px;
    border:none;
    margin-top: 10px;
    font-size:14px;
    font-weight:600;
    color:#000000;
    background-color:#6ce4a8;
}
.allocate-btn
{
  padding: 10px 20px;
    border: none;
    font-size: 14px;
    font-weight: 600;
    color: #000000;
    background-color: #6ce4a8;
    outline:none;
}
.allocate-driver-card
{
  display:none;
  box-shadow: 0 1px 5px 3px rgba(46,50,52,0.1);
  padding:10px;
}
#allocated-table 
{
  display: none;
}
</style>

</html>
