
    <?php
   include('../../loadcurrentpage.php'); 
if($action =="")
  ?>
<!----Sidebar-ends----->    
    <div class="mc-flex">
<!------secondary-sidebar------>
    
    <div class="mc-secondary-sidebar mc-top-rev">
        <h4>Settings</h4>
        <ul>
            <li><a class="li_sidebar" href="settings">General</a></li>
            <li><a class="li_sidebar" href="userSettings">User Settings</a></li>
            <li><a  class="li_sidebar"href="site">Site Settings</a></li>
            <li><a  class="li_sidebar"href="fare">Fare Settings</a></li>
            <li><a class="li_sidebar" href="promo">Promo Settings</a></li>
            <li><a class="li_sidebar" href="hellobar">Hellobar Settings</a></li>
            </ul>
    </div>
    
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

    

                         
                         
                         
                 