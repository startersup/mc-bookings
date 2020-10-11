

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
     
     <!---mainbar-starts----->
    <div class="mc-dash-sub-mainbar">
<div class="mc-sub-mainbar-components">
	  <div class="mc-general-form">
          <div class="row">
              <div class="col-md-5">
          <h3>Promo Settings</h3></div>
          <div class="col-md-7">
          <select class="select form-control siteDropDown" required="" id="siteId" >
        
        </select>  
            </div>
      </div>
        </div>
        <table id="mc-datatables-Alloc" class="table table-fixed dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #e4e4e4;">
            <thead class="mc-table-head" style="border:1px solid #e4e4e4;">
                <tr style="border:1px solid #e4e4e4;">
                    <th>Promo Id</th>
                    <th>Promo Name</th>
                    <th>Promo Description</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody id="Allocate_Table">
             <tr>
              <td>P6748</td><td>December offer</td><td>New promo for decemeber attraction customers </td> <td>Active</td>
             </tr>      
            </tbody>
          </table>
          <br>
          <button type="submit" class="btn btn-primary">SAVE</button>
</div>
      <!---mainbar-starts----->
    </div>
<!---modals-section------>
    
  