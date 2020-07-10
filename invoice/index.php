
    <!---------- Including js to refresh page --------->
   
    <?php
   include('../loadcurrentpage.php'); 
if($action =="")
  ?>

<body onload="stopLoader();">


  <div id="spinnermodal" class="modal11 modal right fade in"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="    
  display: block;
  background-color: rgb(255, 255, 255);
  min-width: 1500px;
  top: 0px;
  left: 65px;
  border: none;">
    <div class="modal11-content">
      <div class="loader" style="max-width:100px;position:absolute;top:300px;left:650px;">
        <centre> <img width="80px;" src="../assets/images/icons/loader.svg"></centre>    
      </div>
    </div>
  </div>
  <!----navbar-starts----->
  <nav class="navbar navbar-default mc-dash-nav">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="../"><img class="mc-nav-logo" src="../assets/images/icons/fleet.svg"><span></span><div class="mc-buyer-name">Minicabee Travel Solutions</div></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav mc-dash-mid">
          <li class="active"><a class="mc-load" href="../passengers/">Passengers</a></li>
          <li><a class="mc-load" href="../drivers/">Drivers</a></li>
          <li><a class="mc-load" href="../partners/">Partners</a></li>
          <li><a class="mc-load" href="./invoice/">Invoice</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
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
          <li><a href="" data-toggle="modal" data-target="#notification-bar">Notifications</a></li>
            <li><a href="#"><img src="../assets/images/mc-male-avathar.png" alt="Avatar" class="mc-avatar-bar"></a></li>
        </ul>
      </div>
    </div>
  </nav> 
  <!----navbar-ends----->


  <!----sub-navbar-starts----->
  <div class="mc-sub-section">
    <ul class="mc-sub-left">
      <li class="bolder">Invoice Generator</li>
    </ul>

    <ul class="mc-sub-right">
      <li><a id='btn' onclick='printDiv();'><button class="mc-add-btn"> <img class="mc-button-icons"
              src="../../assets/images/icons/print.svg"> Print Invoice</button></a></li>
      <li><a id='btn' onclick='SendEmail();'><button class="mc-add-btn"> <img class="mc-button-icons"
              src="../../assets/images/icons/email.svg"> Send Invoice</button></a></li>
    </ul>
  </div>

  <!----sub-navbar-ends----->



  <!----sidebar-starts----->
  <div class="mc-dash-sidebar">
    <ul>
      <li><a href="../index.html">
          <div class="tooltip-col text-center"><img class="mc-icons" src="../assets/images/icons/analytics.svg">
            <span class="tooltiptext"> Dashboard</span>
          </div>
        </a></li>
      <li><a href="../index.html">
          <div class="tooltip-col text-center"><img class="mc-icons" src="../assets/images/icons/bookings.svg">
            <span class="tooltiptext"> Bookings</span>
          </div>
        </a></li>
      <li><a href="../index.html">
          <div class="tooltip-col text-center"><img class="mc-icons" src="../assets/images/icons/company.svg">
            <span class="tooltiptext"> Company</span>
          </div>
        </a></li>
      <li><a href="../index.html">
          <div class="tooltip-col text-center"><img class="mc-icons" src="../assets/images/icons/track.svg">
            <span class="tooltiptext"> Tracking</span>
          </div>
        </a></li>
      <li><a href="../marketing/email-marketing">
          <div class="tooltip-col text-center"><img class="mc-icons" src="../assets/images/icons/marketing.svg">
            <span class="tooltiptext"> Marketing</span>
          </div>
        </a></li>

      <li><a href="../index.html">
          <div class="tooltip-col text-center"><img class="mc-icons" src="../assets/images/icons/chat.svg">
            <span class="tooltiptext"> Live Chat</span>
          </div>
        </a></li>
      <li><a href="../index.html">
          <div class="tooltip-col text-center"><img class="mc-icons" src="../assets/images/icons/gear.svg">
            <span class="tooltiptext"> App Settings</span>
          </div>
        </a></li>
    </ul>

  </div>

  <!----Sidebar-ends----->

  <!------secondary-sidebar------>

  <div class="mc-teritory-sidebar">
    <div class="report-width">
      <div id="reportrange"
        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
        <i class="fa fa-calendar"></i>&nbsp;
        <span id="fromto"></span>
        <i class="fa fa-caret-down"></i>
      </div>
      <ul>
        <li><a> <input type="checkbox" id="all" name="job-list" value="all"> Cumulative Job List</a></li>
        <li><a><input type="checkbox" id="driver" name="job-list" value="driver"> Drivers List</a></li>
        <li> <button type="button" class="mc-cta" id="get_details">Get Now</button></li>
      </ul>


      <div clsss="mc-invoice-list">
        <table class="preview-bar">
          <thead>
            <th>Invoice List</th>
          </thead>
          <tbody id="driver-inv-table">

          </tbody>

        </table>
      </div>
    </div>
  </div>

  <!---mainbar-starts----->

  <div class="mc-dash-mainbar" style="margin-left:420px;">
    <div class="mc-mainbar-components">
      <div class="preview-viewer" style="display:none;">
        <div class="container3">
          <div class="top" style="margin-top:20px;">
            <div id="downloadEditor"></div>
            <div class="invoice-box" id='DivIdToPrint'
              style="max-width:2000px;padding:30px;background-color:#ffffff;border:1px solid #eee;box-shadow:0 0 10px rgba(0, 0, 0, .15);font-size:16px;line-height:24px;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color:#555;">
              <table cellpadding="0" cellspacing="0"
                style="width:100%;line-height:inherit;text-align:left;border-collapse:collapse;border-spacing:0;">
                <tr class="top" style="margin-top:20px;">
                  <td colspan="4" style="padding: 5px;
  vertical-align: top;">
                    <table
                      style="border-collapse:collapse;border-spacing:0;width:100%;line-height:inherit;text-align:left;">
                      <tr>
                        <td class="title"
                          style="font-weight:800;font-size:45px;padding:5px;vertical-align:top;padding-bottom:20px;line-height:45px;color:#333;">
                          <img src="https://minicabee.co.uk/assets/images/logo.png"
                            style="width:100%; max-width:200px !important;">
                        </td>

                        <td style="text-align:right !important;padding:5px;vertical-align:top;padding-bottom:20px;"
                          id="InvoiceDetails">

                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr class="information">
                  <td colspan="4" style="padding: 5px;
  vertical-align: top;">
                    <table
                      style="border-collapse:collapse;border-spacing:0;width:100%;line-height:inherit;text-align:left;">
                      <tr>
                        <td style="padding: 5px;
  vertical-align: top;" id="BasicDriverInfo">
                          Mr. -------<br> ---------
                        </td>

                        <td style="float:right !important;padding:5px;vertical-align:top;">
                          Minicabee Travel Solution<br> minicabee@gmail.com <br> www.minicabee.co.uk
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <table class="tickettable purchase-table"
                style="border-collapse:collapse;border-spacing:0;max-width:1425px;width:100%;line-height:inherit;text-align:left;margin-top:40px;font-family:'Nunito', sans-serif;font-size:14px;letter-spacing:0.2px;">

                <thead class="header" id="tableHeader">
                  <th
                    style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">
                    Booking Id</th>
                  <th
                    style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">
                    Pickup From</th>
                  <th
                    style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">
                    Dropoff To</th>
                  <th
                    style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">
                    Date & Time</th>
                  <th
                    style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">
                    Total Fare</th>
                  <th
                    style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">
                    Driver Fare</th>
                  <th
                    style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">
                    Commission</th>
                </thead>

                <tbody style="max-height:300px !important;
  overflow-y: scroll;" id="InvoiceTable">

                </tbody>
              </table>

              <table class="tickettable purchase-table" id="tickettable"
                style="border-collapse:collapse;border-spacing:0;max-width:300px;width:100%;line-height:inherit;text-align:left;margin-top:40px;font-family:'Nunito', sans-serif;font-size:14px;letter-spacing:0.2px;">

                <tbody style="max-height:300px !important;
  overflow-y: scroll;">
                  <tr class="header">
                    <th
                      style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">
                      Description</th>
                    <th
                      style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">
                      Value in pounds</th>
                  </tr>
                  <tr>
                    <td
                      style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">
                      Total Jobs Done</td>
                    <td
                      style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;"
                      id="DrvTotalJobs">23</td>
                  </tr>
                  <tr>
                    <td
                      style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">
                      Total value</td>
                    <td
                      style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;"
                      id="DrvTotalValue">£360</td>
                  </tr>
                  <tr>
                    <td
                      style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">
                      Your Fare</td>
                    <td
                      style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;"
                      id="DrvTotalFare">£265</td>
                  </tr>
                  <tr>
                    <td
                      style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">
                      Pay to Minicabee</td>
                    <td
                      style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;"
                      id="DrvTotalPay">£145</td>
                  </tr>

                </tbody>
              </table>

            </div>

          </div>
        </div>
      </div>
      <script>
        function printDiv(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;

          document.body.innerHTML = printContents;

          window.print();

          document.body.innerHTML = originalContents;
        }
      </script>
      <style>
        @media print {
          #tickettable .header {
            background-color: #f4f4f4 !important;
          }
        }
      </style>
    </div>

    <div class="empty_states" style="display:block">
      <img class="empty_image" src="../assets/images/empty-states/mc_empty_states.png">
      <p>Sorry No Preview Available</p>
    </div>

  </div>

  <!---mainbar-starts----->

  <!---modals-section------>

  <!--Notification Modal -->
  <div class="modal right fade" id="notification-bar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="mc-close close" data-dismiss="modal" aria-label="Close"><i
              class="fa fa-times"></i></button>
          <h4 class="modal-title" id="myModalLabel2">Notifications</h4>
        </div>

        <div class="modal-body">
          <ul>
            <li></li>
          </ul>
        </div>

      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->



  <script>
    function printDiv() {

      var divToPrint = document.getElementById('DivIdToPrint');

      var newWin = window.open('', 'Print-Window');

      newWin.document.open();

      newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

      newWin.document.close();

      setTimeout(function () {
        newWin.close();
      }, 10);

    }
  </script>


  <script>
    $(document).ready(function () {
      $('img').tooltip()
    });
  </script>


  <script>
    function otherFunction() {
      document.getElementById("mc-dropdown").classList.toggle("show");
    }

    window.onclick = function (event) {
      if (!event.target.matches('.mc-others-icon')) {
        var dropdowns = document.getElementsByClassName("dropdown-set");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>


  <script>
    $(document).ready(function () {
      $("#get_details").click(function () {
        $(".empty_states").css("display", "none");
        $(".preview-viewer").css("display", "block");
      });
    });
  </script>

  <script type="text/javascript">
    $(function () {

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
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
            'month')]
        }
      }, cb);

      cb(start, end);
    });
  </script>

  <style>
    @media print {
      body {
        -webkit-print-color-adjust: exact !important;
      }

      .tickettable th {
        background-color: #555 !important;
        color: #000000 !important;
      }
    }
  </style>

