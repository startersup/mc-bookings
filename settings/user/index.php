

    <?php
   include('../../loadcurrentpage.php'); 
if($action =="")
  ?>
<!----Sidebar-ends----->    
    <div class="mc-flex">
<!------secondary-sidebar------>
 
<?php

include('./settings_side_bar.php'); 
    ?>    
     <!---mainbar-starts----->
     
     <!---mainbar-starts----->
    <div class="mc-dash-sub-mainbar">
<div class="mc-sub-mainbar-components">
	  <div class="mc-general-form">
          <div class="row">
              <div class="col-md-5">
          <h3>User Settings</h3></div>
          <div class="col-md-7">
            <div class="mc-flex p20"> 
                <input class="controls" style="box-shadow: 0 2px 16px 0 rgba(92, 99, 105, 0.15);" placeholder="Enter Email Address">
                <div class="p8">
                <button class="btn-invite">Invite +</button>
                </div>
            </div>
      </div>
        </div>
        <table id="mc-datatables-Alloc" class="table table-fixed dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #e4e4e4;">
            <thead class="mc-table-head" style="border:1px solid #e4e4e4;">
                <tr style="border:1px solid #e4e4e4;">
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>Permission Level</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody id="Allocate_Table"><tr><td>saicharg</td><td>Saicharan Govindaraj </td><td><select><option>Admin Level</option><option>Manager Level</option><option>Associate Level</option></select></td><td><label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
              </td></tr>
              <tr><td>Depikaa</td><td>Deepak Thangamani </td><td><select><option>Admin Level</option><option>Manager Level</option><option>Associate Level</option></select></td><td><label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label>
              </td></tr></tbody>
          </table>
          <br>
          <button type="submit" class="btn btn-primary">SAVE</button>
</div>
      <!---mainbar-starts----->
    </div>
<!---modals-section------>
    
  