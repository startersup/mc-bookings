
    <!---------- Including js to refresh page --------->
   
    <?php
   include('../loadcurrentpage.php'); 
if($action =="")
  ?>
      <!----sub-navbar-starts----->
    <div class="mc-sub-section">
    <ul class="mc-sub-left">
    <li id="yesterday" class="booking"><a >Yesterday Booking</a></li>   
     <li id="today"  class="active booking"><a>Today Booking</a></li>
    <li id="tommorrow" class="booking"><a  >Tomorrow Booking</a></li> 
    <li id="future" class="booking" ><a  >Future Booking</a></li> 
     <li><div class="mc-icon-wrap"><img class="mc-sub-icons mc-others-icon" data-toggle="modal" data-target="#custom-filters"   src="../assets/images/icons/more.svg"></div>

        </li> 

    </ul>
        
        <ul class="mc-sub-right">
            
            <li>
</li>
            <li><a href="../new-booking/"><button class="mc-add-btn"> <img class="mc-button-icons" src="../assets/images/icons/add.svg"> Add Booking</button></li></a></ul>
    </div>
    
      <!----sub-navbar-ends----->
    
    
      
    
    <!---mainbar-starts----->
    
    <div class="mc-dash-mainbar">
<div class="mc-mainbar-components">

<div id="empty_state" >
 <center><img src="../assets/images/empty-states/booking_empty_state.svg" class="booking_empty_state"></center>
  <p>It seems there is no bookings available</p> 

</div>
<div id="display_data" style="display: none;">
	    <table id="mc-datatables" class="table table-fixed table striped dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #e4e4e4;">
       <thead class="mc-table-head"  style="border:1px solid #e4e4e4;">
            <tr style="border:1px solid #e4e4e4;">
                <th>Id</th>
                <th>Source</th>
                <th style="width:15%;">Pickup From</th>
                <th style="width:15%;">Dropoff To</th>
                <th>D&T</th>
                  <th>Type</th>
                <th>Fare</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
   
        </tbody> 
    </table>
    </div>
		
        </div>
    
      <!---mainbar-starts----->
    
<!---modals-section------>
    
 

    
        <!-- Modal -->
        <button type="button" style="display:none;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#info-bar" data-backdrop="static" data-keyboard="false" id="mc-open-modal">Open Small Modal</button>
	<div class="modal right fade" id="info-bar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
			<!--		<button type="button" class="mc-close close " id="mc-close-modal" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button> -->
          <h4 class="modal-title" id="myModalBookId" name="">Booking Information - (  )</h4>
          <div id="myModalBookId_temp" style="display:none;"></div>
                    <ul class="nav nav-pills mc-info-tabs">
    <li id="basic_info" class="active modalToggle"><a data-toggle="pill"  href="#location">Basic Info</a></li>
    <li id="passenger_info" class="modalToggle"><a data-toggle="pill" href="#passenger">Passenger Info</a></li>
    <li id="driver_info" class="modalToggle" ><a data-toggle="pill" href="#driver">Driver Info</a></li>
    <li id="booking_sms" class="modalToggle" ><a data-toggle="pill" href="#sms">Booking SMS</a></li>
  </ul>
				</div>

				<div class="modal-body">
                           
                     <div class="tab-content">
    <div id="location" class="tab-pane fade in active">
<!--                  <div id="map"></div>-->

<table id="table_basic_info" class="table table-user-information map-info">
                  <tbody>
                      <tr>
                      <td>Booking Source :</td>
                      <td><input disabled type="text" class="text" name="modal_booking_site" id="modal_booking_booked_site" value=""></td>
                    </tr>
                       <tr>
                      <td>Booking Status :</td>
                      <td>
                        <div class="mc-icon-wrap">
                        <input type="text" class="text mc-status-change" id = "status_dropdown" name="modal_booking_status" readonly  >
                        
                          
                            
                        
                  </div>
                         </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="first">Pickup From :</td>
                      <td class="first"><input type="text" class="text" name="src" id="modal_booking_src" value=""></td>
                    </tr>
                    <tr>
                      <td>Dropoff To :</td>
                      <td><input type="text" class="text" name="mail" id="modal_booking_des" value=""></td>
                    </tr>
                    <tr>
                      <td>Date :</td>
                      <td>
                        <input  type="text" class="text datetime" name="num1" id="modal_booking_dt" >
                        <div class="mc-time-date-popup" id="DateTimeDiv" style="display:none;">
               <div class="calendar-blue"></div>
        <div id="myDate" class="box"></div>
           <p class="time-head">Select Time:</p>
         <div class="mc-time">
             <select id="hours" name="hours" class="select">
  <option value="00">00</option>
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>   
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>              
</select>:
              <select id="minutes" name="secs" class="select">
  <option value="00">00</option>
  <option value="05">05</option>
  <option value="10">10</option>
  <option value="15">15</option>
  <option value="20">20</option>   
  <option value="25">25</option>
  <option value="30">30</option>
  <option value="35">35</option>
  <option value="40">40</option>
  <option value="45">45</option>
  <option value="40">50</option>
  <option value="45">55</option>
</select>
         </div>

            <center> <button name="date" onclick="setDate();" id="SetDateTime" class="mc-set-btn">Set Date and Time</button></center>
     </div>
     </div>
 </div>
                    </td>
                    </tr>
                    <tr>
                      <td>Time :</td>
                      <td><input type="text" class="text" name="num1" id="modal_booking_time" value=""></td>
                    </tr>
                    <tr>
                      <td>Cab Type :</td>
                      <td><input type="text" class="text" name="num1" id="modal_booking_type" value=""></td>
                    </tr>
                    <tr>
                      <td>Total Miles :</td>
                      <td><input type="text" class="text number" whole="3" decimal="2" name="num1" id="modal_booking_miles" value=""></td>
                    </tr>
                       <tr>
                      <td>Journey Time :</td>
                      <td><input type="text" class="text" name="num1" id="modal_booking_jtime" value=""></td>
                    </tr>    
             </tbody></table>
				</div>
            
            
                 <div id="passenger" class="tab-pane fade"> 

                 <table id="table_passenger_info" class="table table-user-information">
                  <tbody>
                    <tr>
                      <td class="first">Passenger Name :</td>
                      <td class="first"><input type="text" class="text" name="name" id="modal_booking_name" value=""></td>
                    </tr>
                    <tr>
                      <td>Passenger Email :</td>
                      <td><input type="text" class="text" name="mail" id="modal_booking_mail" value=""></td>
                    </tr>
                    <tr>
                      <td>Passenger Contact :</td>
                      <td><input type="text" class="text" name="num1" id="modal_booking_num1" value=""></td>
                    </tr>
                    
                     <tr>
                      <td>Alternate Contact :</td>
                      <td><input type="text" class="text" name="num2" id="modal_booking_num2" value=""></td>
                    </tr>
                    
                           <tr>
                      <td>Pickup Address :</td>
                      <td><input type="text" class="text" name="address1" id="modal_booking_address1" value=""></td>
                    </tr>
                      <tr>
                      <td>Dropoff Address : </td>
                      <td><input type="text" class="text" name="address2" id="modal_booking_address2" value=""></td>
                    </tr>
                   
                    
                    <tr>
                        <td>Passengers :</td>
                        <td><input type="text" name="np" id="modal_booking_passenger" class="text" value=""></td>
                      </tr>
                      <tr>
                        <td>Infants :</td>
                        <td><input type="text" name="infants" id="modal_booking_infants" class="text" value=""></td>
                      </tr>
                      <tr>
                          <td>Luggages :</td>
                          <td><input type="text" name="nl" id="modal_booking_luggage" class="text" value=""></td>
                        </tr>
                        
                         <tr>
                      <td>Flight Details :</td>
                      <td><input type="text" class="text" name="location" id="modal_booking_location" value=""></td>
                    </tr>
                    
                     <tr>
                      <td>Special Info :</td>
                      <td><input type="text" class="text" name="info" id="modal_booking_info" value=""></td>
                    </tr>
                  
                    <tr>
                      <td>Child Ceat :</td>
                      <td><input type="text" class="text" name="ceat" id="modal_booking_ceat" value=""></td>
                    </tr>
                    <tr>
                      <td>Meet & Greet :</td>
                      <td><select  class="text" name="mg" id="modal_booking_mg" >
                        <option value="10">Yes</option>
                        <option value="0">No</option>
                      </td>
                    </tr>
                    <tr>
                        <td>Total Fare (£) :</td>
                        <td><input type="text" class="text" name="fare" id="modal_booking_fare" value=""></td>
                      </tr>
                      <tr>
                        <td>Driver Fare (£) :</td>
                        <td><input type="text" class="text" name="dfare" id="modal_booking_dfare" value=""></td>
                      </tr>

                     </tbody></table>
                      
                      </div>
                         
                         
                         
                            <div id="driver" class="tab-pane fade"> 
                                

                  
                                <h3>Manual Allocation</h3>
            <table class="manalloc-table">
               <tbody>

                   <tr>
          <td><input type="text" name="drvid" id="drvid"  class="selectit" autocomplete="off"> </td>
          <td><input type="text" class="controls" required="required" id="amt" name="amt" placeholder="Enter Amount"></td>
          <td><button class="buttongreen" id="manual_alloc" >Allocate </button></td>
        </tr>
             </tbody> 
              </table>
                                
                     <h3>Drivers Bidded</h3>
                                
                      <table id="mc-datatables-Alloc" class="table table-fixed dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #e4e4e4;">
        <thead class="mc-table-head"  style="border:1px solid #e4e4e4;">
            <tr style="border:1px solid #e4e4e4;">
                <th>Driver Id</th>
                <th>Driver Name</th>
                <th>Bidded Amount</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody id="Allocate_Table">
        </tbody>
      </table>
                         </div>
                         
                         
                           <div id="sms" class="tab-pane fade sms">
                          <!--- future requirement     <p>SMS Status</p>
                                <table id="mc-datatables" class="table table-fixed dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #e4e4e4;">
        <thead class="mc-table-head"  style="border:1px solid #e4e4e4;">
            <tr style="border:1px solid #e4e4e4;">
               
                <th>Driver</th>
                <th>Contact Number</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Azhwar Khan</td>
                <td>07818065914</td>
                <td>Sent</td>
               
            </tr>
                 <tr>
                <td>Amila Jhonson</td>
                <td>073894639332</td>
                <td>Sent</td>
               
            </tr>
                          </tbody></table>  --->
                               <div class="row">
                  <div class="col-md-12">
                    <p class="sms">Passenger Details</p>
        <input type="text" class="dark-controls" id="id_number1" name="number1"  value="" placeholder="Enter Contact Number">     
           <textarea class="dark-controls" rows="9" id="id_message1" name="message1" style="width:100%;min-height:200px;"></textarea>
       
        
        </div>

           <div class="col-md-12">
            
                
                       <p class="sms" style="padding:10px;margin-top:10px;">Driver Details</p>
                       
                
                       
        <input type="text" class="dark-controls" id="id_number2" name="number2" value=""placeholder="Enter Contact Number">     
           <textarea class="dark-controls" rows="9" id="id_message2" name="message2" style="width:100%;min-height:200px;"></textarea>
          
      </div>

    <centre> <button class="mc-cta" id="send_sms">SEND NOW</button></centre> 
    </div>
                         </div>
                         
                
                    </div>
         
                </div>
                <div class="mc-modal-footer">
                  <div class="mc-flex">
                    <a class="mc-btn-update" id="modal_update" >Update</a>
                               
               <a id="mc-close-modal" class="mc-btn-cancel"  data-dismiss="modal" aria-label="Close">Close

               <button class="mc-close close" ></button>  
               </a>
  </div>
                </div>
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
    <!---modals-section------>


<!----custom-filter-modal-->
<div class="modal modal-bg" id="custom-filters" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content max-width-300">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Custom Filters</h4>
      </div>
      <div class="modal-body pad-0">
          <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span id="fromto" ></span> 
        <i class="fa fa-caret-down"></i>
        </div>
          <div id="filterList">
            <ul>
            <li><input class="input-filter" type="checkbox" value="ALL" id="filter_all" > All</li>
                <li><input class="input-filter" type="checkbox" value="booked" id="1" > Booked</li>
                <li> <input class="input-filter" type="checkbox" value="booked-confirmed" id="2"> Confirmed</li>
                <li>    <input class="input-filter" type="checkbox" value="comitted" id="3" > Allocated</li>
                <li><input class="input-filter" type="checkbox" value="completed" id="4"> Completed</li>
                <li><input class="input-filter" type="checkbox" value="cancelled" id="5" > Cancelled</li>
                <input class="input-filter" type="hidden" value="" id="filter_checklist" >
            </ul><br>
            <div class="mc-flex">
            <button class="button-style" data-dismiss="modal" id="filter_load" >Load</button>
            <button class="button-cancel-style" data-dismiss="modal">Cancel</button>
          </div>
        </div>
  </div>
    </div>
    
  </div>
</div>

<!---end custom-filter-modal-->


    
<script>$(document).ready(function() {
    $('img').tooltip()
} );</script>
   
    

<script>
function hideshowFunction() {
  var x = document.getElementById("mc-display");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
    
<!--
   <script>$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350).css({'overflow':'visible'});
})</script>
-->


    
        <script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
});
</script>

