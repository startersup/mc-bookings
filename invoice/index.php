
    <!---------- Including js to refresh page --------->
   
    <?php
   include('../loadcurrentpage.php'); 
if($action =="")
  ?>

 <!----sub-navbar-starts----->
 <div class="mc-sub-section">
    <ul class="mc-sub-left">
      <li class="bolder">Invoice Generator</li>
    </ul>

    <ul class="mc-sub-right">
      <li><a id='print-btn' ><button class="mc-add-btn"> <img class="mc-button-icons"
              src="../../assets/images/icons/print.svg"> Print Invoice</button></a></li>
      <li><a id='btn' onclick='SendEmail();'><button class="mc-add-btn"> <img class="mc-button-icons"
              src="../../assets/images/icons/email.svg"> Send Invoice</button></a></li>
    </ul>
  </div>

  <!----sub-navbar-ends----->




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
        <li><a><input type="checkbox" id="driver" name="job-list" value="driver"> Drivers List</a></li>
        <li><a><input type="checkbox" id="provider" name="job-list" value="provider"> Provider List</a></li>
        <li><a> <input type="checkbox" id="all" name="job-list" value="all"> Cumulative Job List</a></li>
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
      <div id="invoicePreview" class="preview-viewer" style="display:none;">
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
      
      <style>
        @media print {
          #tickettable .header {
            background-color: #f4f4f4 !important;
          }
        }
      </style>
    </div>

    <div id="emptyPreview" class="empty_states" style="display:block">
      <img class="empty_image" src="../assets/images/empty-states/mc_empty_states.png">
      <p>Sorry No Preview Available</p>
    </div>

  </div>

  <!---mainbar-starts----->
