
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
            <li><a class="li_sidebar" href="notifications">Notifications Settings</a></li>
            </ul>
    </div>
    
    <!---mainbar-starts----->
    
    <div class="mc-dash-sub-mainbar">
<div class="mc-sub-mainbar-components">
	  <div class="mc-general-form">
          <h3>Site Settings</h3>
        
          <select class="select form-control form-feild" required="" id="" name="booked_site">
              <option value="Minicabee">Minicabee</option>
              <option value="Gatwick Airport Taxi">Gatwick Taxis</option> 
              <option value="Horsham Taxi">Horsham Taxis</option>
              <option value="Britannia Taxi">Britannia Taxis</option>
            </select>    
            <br>
            <div class="form-group">
          <label for="usr">Insert Header Scripts:</label>
          <textarea style="width:100%;min-height:300px;" class="form-control"></textarea>
        </div>
         <br>
        <div class="form-group">
          <label for="usr">Insert Footer Scripts:</label>
          <textarea style="width:100%;min-height:300px;" class="form-control"></textarea>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

</div>
      <!---mainbar-starts----->
    </div>
<!---modals-section------>

    

                         
                         
                         
                 