<!---------- Including js to refresh page --------->

<?php
include('../loadcurrentpage.php');
if ($action == "")
?>
<!----sub-navbar-starts----->
<div class="mc-sub-section">
  <ul class="mc-sub-left">
    <li id="yesterday" class="bookingOTS"><a>Yesterday Booking</a></li>
    <li id="today" class="active bookingOTS"><a>Today Booking</a></li>
    <li id="tommorrow" class="bookingOTS"><a>Tomorrow Booking</a></li>
    <li id="future" class="bookingOTS"><a>Future Booking</a></li>
    <li>
      <div class="mc-icon-wrap"><img class="mc-sub-icons mc-others-icon" data-toggle="modal" data-target="#customFiltersOts" src="../assets/images/icons/more.svg"></div>

    </li>

  </ul>

  <ul class="mc-sub-right">

    <li>
    </li>
    <li><button class="mc-add-btn" id="addOTSBook"> <img class="mc-button-icons" src="../assets/images/icons/add.svg"> Add Booking</button></li>
  </ul>
</div>

<!----sub-navbar-ends----->




        <!----custom-filter-modal-->
        <div class="modal fade" id="customFiltersOts" role="dialog">
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
                  <span id="fromto"></span>
                  <i class="fa fa-caret-down"></i>
                </div>
                <div id="filterList">
                  <ul>
                    <li><input class="input-filter" type="checkbox" value="ALL" id="filter_all_OTS"> All</li>
                    <li><input class="input-filter" type="checkbox" value="booked" id="1"> Booked</li>
                    <li> <input class="input-filter" type="checkbox" value="booked-confirmed" id="2"> Confirmed</li>
                    <li> <input class="input-filter" type="checkbox" value="comitted" id="3"> Allocated</li>
                    <li><input class="input-filter" type="checkbox" value="completed" id="4"> Completed</li>
                    <li><input class="input-filter" type="checkbox" value="cancelled" id="5"> Cancelled</li>
                    <input class="input-filter" type="hidden" value="" id="filter_checklist">
                  </ul><br>
                  <div class="mc-flex">
                    <button class="button-style" data-dismiss="modal" id="filter_load_ots">Load</button>
                    <button class="button-cancel-style" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!---end custom-filter-modal-->


<!---mainbar-starts----->

<div class="mc-dash-mainbar">
  <div class="mc-mainbar-components">

    <div id="empty_state">
      <center><img src="../assets/images/empty-states/booking_empty_state.svg" class="booking_empty_state"></center>
      <p>It seems there is no bookings available</p>

    </div>
    <div id="display_data" style="display: none;">
      <table id="mc-datatables" class="table table-fixed table striped dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #e4e4e4;">
        <thead class="mc-table-head" style="border:1px solid #e4e4e4;">
          <tr style="border:1px solid #e4e4e4;">
            <th>Id</th>
            <th>Source</th>
            <th style="width:15%;">Pickup From</th>
            <th style="width:15%;">Dropoff To</th>
            <th>D&T</th>
            <th>Name</th>
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
  <button type="button" style="display:none;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#info-bar" data-backdrop="static" data-keyboard="false" id="ots-open-modal">Open Small Modal</button>
  <div class="modal right fade" id="info-bar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <!-- <button type="button" class="mc-close close " id="mc-close-modal" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      -->
          <h4 class="modal-title" id="myModalBookId" name="">Booking Information - ( )</h4>
          <div id="myModalBookId_temp" style="display:none;"></div>

        </div>

        <div class="modal-body" style="height:100vh;">

          <div class="tab-content">
            <div id="location" class="tab-pane fade in active">
              <!--                  <div id="map"></div>-->
              <form method="POST" id="dataForm" action="">
                <input type="hidden" id="refid_temp">
                <div class="row">
                  <div class="col-md-6 ">
                    <label>Pick Up:</label>
                    <input type="text" required class="form-feild controls" id="src" name="src" placeholder="">
                  </div>

                  <div class="col-md-6 ">
                    <label>Drop Off:</label>
                    <input type="text" required class="form-feild controls" id="des" name="des" placeholder="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 ">
                    <label>No Of Passengers:</label>
                    <input type="text" required class="form-feild controls" id="passenger" name="passenger" placeholder="">
                  </div>

                  <div class="col-md-6 ">
                    <label>No Of Luggage:</label>
                    <input type="text" required class="form-feild controls" id="luggage" name="luggage" placeholder="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 ">
                    <label>Date Of Journey:</label>
                    <input type="text" required class=" controls datepicker " id="dt_temp" placeholder="">
                    <input type="hidden" class="form-feild controls" id="dt" name="dt">
                  </div>

                  <div class="col-md-6 ">
                    <label>Taxicode / OTS Id:</label>
                    <input type="text" required class="form-feild controls" id="bookid" name="bookid" placeholder="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 ">
                    <label>Hour:</label>
                    <select id="hrs" name="hrs" class="select timeset selectit  controls">
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
                    </select>
                    <input type="hidden" class="form-feild controls" id="time" name="time">
                  </div>

                  <div class="col-md-6 ">
                    <label>Mins:</label>
                    <select id="mins" name="mins" class="select selectit timeset controls">
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
                      <option value="50">50</option>
                      <option value="55">55</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 ">
                    <label>Passenger Name:</label>
                    <input type="text" required class="form-feild controls" id="name" name="name" placeholder="">
                  </div>
                  <div class="col-md-6">
                    <label>Passenger Email:</label>
                    <input type="text" class="form-feild controls" id="mail" name="mail" required placeholder="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 ">
                    <label>Contact Number:</label>
                    <input type="text" class="form-feild controls" required id="num1" name="num1" placeholder="" value="+44">
                  </div>
                  <div class="col-md-6 ">
                    <label>Alternate Number:</label>
                    <input type="text" class="form-feild controls" id="num2" name="num2" placeholder="" value="+44">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Pickup Full Address:</label>
                    <input type="text" class="form-feild controls" id="address1" name="address1" required placeholder="">
                  </div>
                  <div class="col-md-6">
                    <label>Dropoff Full Address:</label>
                    <input type="text" class="form-feild controls" id="address2" name="address2" required placeholder="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 ">
                    <label>Flight Details:</label>
                    <input type="text" class="form-feild controls" name="location" id="location" placeholder="">
                  </div>
                  <div class="col-md-6 ">
                    <label>Payment Mode:</label>
                    <select id="pay" name="pay" class="select selectit form-feild controls">
                      <option value="cash">Cash on Ride (Deposit Required)</option>
                      <option value="debit">Debit / Credit Card (3% Admin Charges)</option>
                      <option value="paypaul">Paypal Transaction(5% Card Charges)</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Meet & Greet(£10.00):</label>
                    <select id="mg" name="mg" class="select selectit form-feild controls">
                      <option value="0">No I don't Need </option>
                      <option value="1">Yes I Need Meet & Greet.</option>
                    </select>
                  </div>
                  <div class="col-md-6 ">
                  <label>Original Fare</label>
                    <input type="text" class="form-feild controls" name="ofare" id="ofare" placeholder="">
                
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <label>Driver Name</label>
                    <select id="drvid" name="drvid" class="select selectit form-feild controls">
                      <option value="">--SELECT--</option>
                    </select>
                  </div>
                  <div class="col-md-6 ">
                    <label>Driver Percentage:</label>
                    <select id="dpercen" name="dpercen" class="select selectit form-feild controls">
                      <option value="">--SELECT--</option>
                      <option value="0">0%</option>
                      <option value="5">5%</option>
                      <option value="10">10%</option>
                      <option value="15%">15%</option>
                      <option value="20">20%</option>
                      <option value="25">25%</option>
                      <option value="30">%</option>
                    </select></div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <label>Our Fare</label>
                    <input type="text" class="form-feild controls" name="fare" id="fare" placeholder="">
                
                  </div>
                  <div class="col-md-6 ">
                    <label>Driver Fare:</label>
                    <input type="text" class="form-feild controls" disabled name="dfare" id="dfare" placeholder="">
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-12"><br>
                    <label>Booking Status:</label>
                    <select id="status_temp" name="status" class="select selectit form-feild controls">
                      <option value="booked-confirmed">Booked</option>
                      <option value="completed">Completed</option>
                      <option value="comitted">Allocated</option>
                      <option value="cancelled">Cancelled</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12"><br>
                    <label>Special information to us (optional):</label>
                    <textarea name="info" class="select form-feild controls textarea" rows="8" id="info"></textarea>
                  </div>
                </div>

              </form>



            </div><!-- modal-content -->
          </div><!-- modal-dialog -->

        </div><!-- modal -->
        <!---modals-section------>
        <div class="mc-modal-footer">
          <div class="mc-flex">
            <a class="mc-btn-update clickButton" name="new">BOOK</a>
            <a class="mc-btn-update clickButton" name="edit">UPDATE</a>

            <a id="mc-close-modal" class="mc-btn-cancel" data-dismiss="modal" aria-label="Close">Close

              <button class="mc-close close"></button>
            </a>
          </div>
        </div>

        <script>
          $(document).ready(function() {
            $('img').tooltip()
          });
        </script>



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