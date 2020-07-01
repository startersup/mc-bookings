<!DOCTYPE html>
<html lang="en" id="html">

<head>
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <title>Minicabee Travel Solutions | Dashboard</title>
  <meta charset="utf-8">
  <link rel="icon" href="./assets/images/icons/fleet.png" type="image/x-icon" sizes="16x16" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.rawgit.com/fnando/sparkline/master/dist/sparkline.js "></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
  <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
  <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body onload="dashboardLoad();">


  <div id="spinnermodal" class="modal11 modal right fade in"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="    
  display: block;
  background-color: rgb(255, 255, 255);
  min-width: 1500px;
  top: 48px;
  left: 65px;
  border: none;">
    <div class="modal11-content">
      <div class="loader" style="max-width:100px;position:absolute;top:300px;left:650px;">
        <centre> <img width="80px;" src="./assets/images/icons/loader.svg"></centre>    
      </div>
    </div>
  </div>
  <!----navbar-starts----->
  <?php include('navbar.php'); ?>
  <!----navbar-ends----->

  <!----sidebar-starts----->
  <?php include('sidebar.php'); ?>
  <!----Sidebar-ends----->

 

  <!---mainbar-starts----->

    <div class="mc-mainbar-components mc-home-mainbar">
      <div class="mc-quick-metrics">
        <div class="row">
          <div class="col-md-2 col-xs-6">
            <div class="mc-metric-card">
              <h3 id="allBookingId">25 </h3>
              <p>New Bookings</p>
              <div class="mc-sp-charts">
                <svg class="allBooking" width="50" height="20" stroke-width="2" stroke="blue" fill="rgba(0, 0, 255, .2)"></svg>
                <span class="mc-chart-tooltip" hidden="true"></span>
                <p class="mc-tiny-metric" id="allBookingIdPercent"></p>

              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="mc-metric-card">
              <h3 id="totalBookedId">12 </h3>
              <p>Today Bookings</p>
              <div class="mc-sp-charts">
                <svg class="totalBooked" width="50" height="20" stroke-width="2" stroke="blue" fill="rgba(0, 0, 255, .2)"></svg>
                <span class="mc-chart-tooltip" hidden="true"></span>
                <p class="mc-tiny-metric" id="totalBookedIdPercent"></p>

              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="mc-metric-card">
              <h3 id="unallocId">10 </h3>
              <p>Unallocated Jobs</p>
              <div class="mc-sp-charts">
                <svg class="unalloc" width="50" height="20" stroke-width="2" stroke="blue" fill="rgba(0, 0, 255, .2)"></svg>
                <span class="mc-chart-tooltip" hidden="true"></span>
                <p class="mc-tiny-metric" id="unallocIdPercent"></p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="mc-metric-card">
              <h3 id="completedId">15 </h3>
              <p>Completed Jobs</p>
              <div class="mc-sp-charts">
                <svg class="completed" width="50" height="20" stroke-width="2" stroke="blue" fill="rgba(0, 0, 255, .2)"></svg>
                <span class="mc-chart-tooltip" hidden="true"></span>
                <p class="mc-tiny-metric" id="completedIdPercent"></p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="mc-metric-card">
              <h3 id="cancelledId">15 </h3>
              <p>Cancelled Jobs</p>
              <div class="mc-sp-charts">
                <svg class="cancelled" width="50" height="20" stroke-width="2" stroke="blue" fill="rgba(0, 0, 255, .2)"></svg>
                <span class="mc-chart-tooltip" hidden="true"></span>
                <p class="mc-tiny-metric" id="completedIdPercent"></p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="mc-metric-card">
              <h3 id="totalFareId">£ 1598 </h3>
              <p>Booking Value</p>
              <div class="mc-sp-charts">
                <svg class="totalFare" width="50" height="20" stroke-width="2" stroke="blue" fill="rgba(0, 0, 255, .2)"></svg>
                <span class="mc-chart-tooltip" hidden="true"></span>
                <p class="mc-tiny-metric" id="totalFareIdPercent"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mc-quick-lists">
        <div class="row">
          <div class="col-md-6">
            <div class="mc-metric-card">
              <h5>Drivers Online</h5>
              <table id="mc-datatables-Alloc" class="table table-fixed dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #f6f7f8;">
                <thead class="mc-table-head">
                  <tr style="border:1px solid #f6f7f8;">
                    <th>Driver Id</th>
                    <th>Driver Name</th>
                    <th>Contact Number</th>
                    <th>Covering Locations</th>
                  </tr>
                </thead>
                <tbody id="Driver_Online_tbl">


                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mc-metric-card">
              <h5 id="currentTiming "></h5>
              <table id="mc-datatables-Alloc" class="table table-fixed dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #f6f7f8;">
                <thead class="mc-table-head">
                  <tr style="border:1px solid #f6f7f8;">
                    <th>Job Id</th>
                    <th>Status</th>
                    <th>Driver Name</th>
                    <th>Contact Number</th>
                  </tr>
                </thead>
                <tbody id="Ongoing_job_tbl">


                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>


      <div class="quick-map-lookups">
        <div class="row">
          <div class="col-md-12">
            <div class="mc-metric-card">
              <h5>Booking Traffic</h5>
              <div id="map" class="mc-cluster-map"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!---mainbar-starts----->

  <!---modals-section------>

  <!--Notification Modal -->
  <div class="modal right fade" id="notification-bar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color:#fbfbfb;">
        <div class="modal-header">
          <button type="button" class="mc-close close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
          <h4 class="modal-title" id="myModalLabel2">Notifications</h4>
        </div>

        <div class="modal-body">
          <ul class="mc-notifications-head">
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
            <li>
              <h3>New Booking on Bin</h3>
              <p>Booking Id <span>BRT1265273</span> has been received.</p>
              <h5>12/13/15 at 22:20</h5>
            </li>
          </ul>
        </div>

      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  <!--Notification Modal -->






  <script src="./assets/js/sparkline-chart.js"></script>
  <script src="./assets/js/server.js"></script>
  <script src="./assets/js/dashboard.js"></script>

  <script>
    function initMap() {

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: {
          lat: 55.3781,
          lng: 3.4360
        }
      });

      // Create an array of alphabetical characters used to label the markers.
      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

      // Add some markers to the map.
      // Note: The code uses the JavaScript Array.prototype.map() method to
      // create an array of markers based on a given "locations" array.
      // The map() method here has nothing to do with the Google Maps API.
      var markers = locations.map(function(location, i) {
        return new google.maps.Marker({
          position: location,
          label: labels[i % labels.length]
        });
      });

      // Add a marker clusterer to manage the markers.
      var markerCluster = new MarkerClusterer(map, markers, {
        imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
      });
    }
    var locations = [{
        lat: 51.1537,
        lng: 0.1821
      },
      {
        lat: 51.5074,
        lng: 0.1278
      },
      {
        lat: 51.1537,
        lng: 0.1821
      },
      {
        lat: 51.1537,
        lng: 0.1821
      },
      {
        lat: 51.1537,
        lng: 0.1821
      },
      {
        lat: 51.1537,
        lng: 0.1821
      },
      {
        lat: 51.5074,
        lng: 0.1278
      },
      {
        lat: 51.5074,
        lng: 0.1278
      },
      {
        lat: 2.4862,
        lng: 1.8904
      },
      {
        lat: 2.4862,
        lng: 1.8904
      },
      {
        lat: 2.4862,
        lng: 1.8904
      }
    ]
  </script>
  <!-- Replace following script src -->
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclustererplus@4.0.1.min.js">
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBauQAxB_oaAk4z-NQN2BkhmD4AxzA2l6M&callback=initMap">
  </script>
</body>


</html>