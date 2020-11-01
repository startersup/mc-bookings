
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
    
    <div class="mc-dash-sub-mainbar">
<div class="mc-sub-mainbar-components">
	  <div class="mc-general-form">
          <h3>Site Settings</h3>
        
          <select class="select form-control siteDropDown" required="" id="siteId" >
        
            </select>    
            <br>
            <div class="form-group">
          <label for="usr">Insert Header Scripts:</label>
          <textarea style="width:100%;min-height:300px;" class="form-control" id="headerScript"></textarea>
        </div>
         <br>
        <div class="form-group">
          <label for="usr">Insert Footer Scripts:</label>
          <textarea style="width:100%;min-height:300px;" class="form-control" id="footerScripts" ></textarea>
        </div>
    
        <br>
        <button type="submit" id="siteDetails" class="btn btn-primary">Save changes</button>
        </div>

</div>
      <!---mainbar-starts----->
    </div>
<!---modals-section------>

    

                         
                         
                         
                 