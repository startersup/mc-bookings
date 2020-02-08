<!DOCTYPE html>
<html lang="en">
<head>
<title>Purchase Order | A Smart Construction Management Software.</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="./assets/images/logo.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script><link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans%7CNunito:400,600,700&amp;display=swap" rel="stylesheet">
</head>
<body onload="loadCurrentContext();" style="background-color: #ebeef0;
    overflow-x: hidden !important;">




<div class="previewdiv" style="margin-left:auto;
 margin-right:auto;
  padding:5px 20px;
  width:100%;
  right: 0;
  bottom: 0;
  top: 51px;
  overflow: auto;
  background-color: #ebeef0;
  color:#33475B;
  font-family: 'Quicksand', sans-serif;

  max-width: 1200px;">
    <div class="container3" style="margin-left:0%;
    margin-right:2.5%;">
        <div class="top" style="margin-top:20px;">
            <div class="invoice-box" id="preview-export" style="max-width:1200px;padding:30px;background-color:#ffffff;border:1px solid #eee;box-shadow:0 0 10px rgba(0, 0, 0, .15);font-size:16px;line-height:24px;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color:#555;">
                <table cellpadding="0" cellspacing="0" style="width:100%;line-height:inherit;text-align:left;border-collapse:collapse;border-spacing:0;">
<tr class="top" style="margin-top:20px;">
<td colspan="4" style="padding: 5px;
  vertical-align: top;">
                      <table style="border-collapse:collapse;border-spacing:0;width:100%;line-height:inherit;text-align:left;"><tr>
<td class="title" style="font-weight:800;font-size:45px;padding:5px;vertical-align:top;padding-bottom:20px;line-height:45px;color:#333;">
                            <img src="https://minicabee.co.uk/assets/images/logo.png" style="width:100%; max-width:200px !important;">
</td>

                          <td style="text-align:right !important;padding:5px;vertical-align:top;padding-bottom:20px;">
                            Invoice #: 3443223<br> Created: 03 February 2020<br> Due: 7 February 2020
                          </td>
                        </tr></table>
</td>
                  </tr>
<tr class="information">
<td colspan="4" style="padding: 5px;
  vertical-align: top;">
                      <table style="border-collapse:collapse;border-spacing:0;width:100%;line-height:inherit;text-align:left;"><tr>
<td style="padding: 5px;
  vertical-align: top;">
                           Mr. Mohammed Riyas<br> BRT1234
                          </td>

                          <td style="float:right !important;padding:5px;vertical-align:top;">
                           Minicabee Travel Solution<br> minicabee@gmail.com <br> www.minicabee.o.uk
                          </td>
                        </tr></table>
</td>
                  </tr>
</table>
<table class="tickettable purchase-table" id="tickettable" style="border-collapse:collapse;border-spacing:0;max-width:1425px;width:100%;line-height:inherit;text-align:left;margin-top:40px;font-family:'Nunito', sans-serif;font-size:14px;letter-spacing:0.2px;"><tbody style="max-height:300px !important;
  overflow-y: scroll;">
<tr class="header">
<th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">Booking Id</th>
        <th style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">Pickup From</th>
        <th style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">Dropoff To</th>
        <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">Date & Time</th>
         <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">Total Fare</th>
         <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">Driver Fare</th>
          <th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Minicabee Comission</th>
    </tr>

<tr>
<td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">MCE23445</td>
<td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">Gatwick airport north terminal</td>
<td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">Heathrow Airoport Terminal 2</td>
<td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">12/01/2020</td>
<td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">£ 51</td>
<td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">£ 31</td>
<td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">£ 21</td>

</tr>


</tbody></table>
     
    <table class="tickettable purchase-table" id="tickettable" style="border-collapse:collapse;border-spacing:0;max-width:300px;width:100%;line-height:inherit;text-align:left;margin-top:40px;font-family:'Nunito', sans-serif;font-size:14px;letter-spacing:0.2px;"><tbody style="max-height:300px !important;
  overflow-y: scroll;">
        <tr class="header">
<th style="cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;">Description</th>
        <th style="width:30%;cursor:pointer;text-align:left;font-size:14px;line-height:22px;letter-spacing:0.5px;max-width:min-content;padding:8px 10px;white-space:nowrap;color:#000;font-family:'Nunito', sans-serif;background-color:#ebeef0 !important;border:1px solid #f4f4f4;font-weight:700;"> Value in pounds</th>
    </tr>
        <tr>
        <td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">Total Jobs Done</td>
        <td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">23</td>
        </tr>
         <tr>
        <td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">Total value</td>
             <td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">£360</td>
        </tr>
          <tr>
        <td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">Your Fare</td>
      <td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">£265</td>
        </tr>
           <tr>
        <td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">Pay to Minicabee</td>
        <td style="border:1px solid #f4f4f4;padding:2px 10px;vertical-align:top;text-align:left;letter-spacing:0.5px;color:#000;line-height:22px;font-size:13px;font-weight:500;font-family:'Nunito', sans-serif;">£145</td>
        </tr>
       
        </tbody></table>

</div>

          </div>
</div>
</div>
<script>function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}</script>
</body>
<style>
@media print {
  #tickettable .header {background-color:#f4f4f4 !important; }
}
</style>
</html>