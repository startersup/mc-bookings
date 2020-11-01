
    <?php
   include('../loadcurrentpage.php'); 
if($action =="")
  ?>
<!----Sidebar-ends----->    
    <div class="mc-flex">
<!------secondary-sidebar------>
    
    

    <?php

include('./settings_side_bar.php'); 
    ?>
    <!---mainbar-starts----->
    
    <div class="mc-dash-sub-mainbar">
<div class="mc-sub-mainbar-components">
	  <div class="mc-general-form">
          <h3>General Settings</h3>
        <form action="/action_page.php">
            <div class="form-group">
                <label for="email">Company Logo</label><br>
                <div class="row">
                    <div class="col-md-4">
     <img src="../assets/images/mc-male-avathar.png" alt="Avatar" class="mc-avatar-bar-lg">
    </div>
    <div class="col-md-8">
        <div class="upload-wrapper">
        <input type="file" id="myFile" name="filename">
      </form></div>
    </div>
</div>
              </div>
            <div class="form-group">
              <label for="email">Company Name</label>
              <input type="email" class="controls" id="name" placeholder="Enter Company Name" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Company Email Address</label>
              <input type="email" class="controls" id="pwd" placeholder="Enter Company Email Address" name="pswd">
            </div>
            <div class="form-group">
                <label for="pwd">Company Size</label>
                <select class="selectit" name="cars" id="size">
                    <option value="1-5">1-5 Employees</option>
                    <option value="5-10">5-10 Employees</option>
                    <option value="10-20">10-20 Employees</option>
                    <option value="20-50">20-50 Employees</option>
                    <option value="50-100">50-100 Employees</option>
                    <option value="100-200">100-200 Employees</option>
                    <option value="200+">200+ Employees</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="pwd">Covering Locations</label>
                <input type="email" class="controls" id="pwd" placeholder="Enter Covering Locations" name="pswd">
              </div>
            <button type="submit" class="btn btn-primary">SAVE</button>
          </form>  
      </div>
        </div>
</div>
      <!---mainbar-starts----->
    </div>
<!---modals-section------>

    

                         
                         
                         
                 