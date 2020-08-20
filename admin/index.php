
    <?php
    session_start();
   include('../loadcurrentpage.php'); 
if($action =="")
  ?>

<div class="mc-mainbar-components mc-home-mainbar">
      <div class="mc-top-visual">
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
                <p class="mc-tiny-metric" id="cancelledIdPercent"></p>
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
              <h5 id="currentTiming ">Provider List</h5>
              <table id="mc-datatables-Alloc" class="table table-fixed dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #f6f7f8;">
                <thead class="mc-table-head">
                  <tr style="border:1px solid #f6f7f8;">
                  <th>Provider Id</th>
                    <th>Provider Name</th>
                    <th>Provider Number</th>
                    <th>Provider Locations</th>
                  </tr>
                </thead>
                <tbody id="provider_list_tbl">


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
 