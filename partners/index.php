<div class="mc-dash-mainbar">
<div class="mc-mainbar-components">
	    <table id="mc-datatables" class="table table-fixed dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #e4e4e4;">
        <thead class="mc-table-head"  style="border:1px solid #e4e4e4;">
            <tr style="border:1px solid #e4e4e4;">
                <th>Driver Id</th>
                <th>Driver Name</th>
                <th>Driver Email </th>
                <th>Driver Contact</th>
                <th>Alternate Contact</th>
                <th>Covering Areas</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
   
        </tbody>
    </table>
        </div>
</div>

    
        <!-- Modal -->
        <button type="button" style="display:none;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#info-bar" id="mc-open-modal">Open Small Modal</button>
	<div class="modal right fade" id="info-bar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="mc-close close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
          <h4 class="modal-title" id="myModalBookId" name="">Booking Information - ( BRT124 )</h4>
          <div id="myModalBookId_temp" style="display:none;"></div>
                    <ul class="nav nav-pills mc-info-tabs">
    <li id="basic_info" class="active modalToggle"><a data-toggle="pill"  href="#driverinfo">Driver Info</a></li>
    <li id="passenger_info" class="modalToggle"><a data-toggle="pill" href="#covering">Covering Areas</a></li>
    <li id="driver_info" class="modalToggle" ><a data-toggle="pill" href="#driverdoc">Driver Documents</a></li>
  </ul>
				</div>

				<div class="modal-body">
                           
                     <div class="tab-content driverinfotable">
    <div id="driverinfo" class="tab-pane fade in active ">
         <table class="table table-user-information map-info ">
                  <tbody>
                       <tr>
                      <td>Driver Status :</td>
                      <td><input type="text" class="text" name="num1" id="modal_booking_status" value="Booked"></td>
                    </tr>
                    <tr>
                      <td class="first">Driver Name :</td>
                      <td class="first"><input type="text" class="text" name="modal_booking_name" id="modal_booking_name" value="saicharan"></td>
                    </tr>
                    <tr>
                      <td>Driver Email :</td>
                      <td><input type="text" class="text" name="mail" id="modal_booking_mail" value=""></td>
                    </tr>
                    <tr>
                      <td>Driver Contact :</td>
                      <td><input type="text" class="text" name="num1" id="modal_booking_num1" value=""></td>
                    </tr>
                     <tr>
                      <td>Alternate Contact :</td>
                      <td><input type="text" class="text" name="num2" id="modal_booking_num2" value=""></td>
                    </tr>  
                    <tr>
                      <td>Resident Address :</td>
                      <td><textarea type="text" class="text" name="num2" id="modal_booking_num2" value=""></textarea></td>
                    </tr> 
             </tbody></table>

<br>

<h3>Vehicle Details</h3>
             <table class="table table-user-information">
              <tbody>
                    <tr>
                    <td>Vehicle Type :</td>
                    <td><input type="text" name="np" id="modal_booking_np" class="text" value=""></td>
                  </tr>
                  <tr>
                    <td>Vehicle Brand and Model :</td>
                    <td><input type="text" name="nl" id="modal_booking_nl" class="text" value=""></td>
                  </tr>
                  <tr>
                      <td>Vehicle Plate Number :</td>
                      <td><input type="text" name="nl" id="modal_booking_nl" class="text" value=""></td>
                    </tr>
                    <tr>
                      <td>Vehicle insurance :</td>
                      <td><input type="text" name="np" id="modal_booking_np" class="text" value=""></td>
                    </tr>
                    <tr>
                      <td>Vehicle MOT :</td>
                      <td><input type="text" name="np" id="modal_booking_np" class="text" value=""></td>
                    </tr>
                    <tr>
                      <td>Vehicle  :</td>
                      <td><input type="text" name="np" id="modal_booking_np" class="text" value=""></td>
                    </tr>
                   </tbody></table>
        </div>
        
            
            
                 <div id="covering" class="tab-pane fade"> 
                  <h3>Covering Areas</h3>
                  <div id="map"></div><br/>
                  <table class="mc-coveringAreasTable">
                    <tr><th>Area Location</th><th>Action</th></tr>
                    <tr><td>Ramford</td><td><button class="mc-approve-button">Approve</button><button class="mc-reject-button">Reject</button></td></tr>
                    <tr><td>heathrow</td><td><button class="mc-approve-button">Approve</button><button class="mc-reject-button">Reject</button></td></tr>
                    <tr><td>oxford</td><td><button class="mc-approve-button">Approve</button><button class="mc-reject-button">Reject</button></td></tr>
                    <tr><td>Birmingham</td><td><button class="mc-approve-button">Approve</button><button class="mc-reject-button">Reject</button></td></tr>
                    <tr><td>Crawley</td><td><button class="mc-approve-button">Approve</button><button class="mc-reject-button">Reject</button></td></tr>
                    <tr><td>manchester</td><td><button class="mc-approve-button">Approve</button><button class="mc-reject-button">Reject</button></td></tr>

                  </table>
              </div>
                         
                         
                         
                            <div id="driverdoc" class="tab-pane fade"> 
                                <h3>Document Verification stage : 30%</h3>
                                
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mc-card">
                                    <div class="mc-preview-bar"><img src="https://www.staticwhich.co.uk/media/images/trusted-trader/desktop-main/new-mot-test-certificate-474029.png" onerror="this.src='../assets/images/empty-states/mc-file.png'"></div>
                                 <div class="mc-document-name">
                                   <p>MOT Certificate</p>
                                 </div>
                                    <div class="mc-floatable mc-flex">
                                         <button class="mc-update-button">Update</button>
                                         <button class="mc-reject-button">Delete</button>
                                      </div>
                                    
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mc-card">
                                    <div class="mc-preview-bar"><img src="" onerror="this.src='../assets/images/empty-states/mc-file.png'"></div>
                                    <div class="mc-document-name">
                                      <p>Driver License</p>
                                    </div>
                                       <div class="mc-floatable mc-flex">
                                            <button class="mc-update-button">Update</button>
                                            <button class="mc-reject-button">Delete</button>
                                         </div>
                                  </div>
                                </div>
                              </div>  
                  
                         </div>
                    </div>
                </div>
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
    <!---modals-section------>