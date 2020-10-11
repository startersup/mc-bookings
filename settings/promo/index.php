

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
          <div class="col-md-7"><br><br>
          <div class="mc-flex">
          <select class="select form-control siteDropDown" required="" id="siteId" >
        </select>  
    <button type="submit" class="btn btn-success mc-edit" data-toggle="modal" data-target="#addPromo">Add Promo +</button>
</div>
            </div>
      </div>
        </div>
        <table id="mc-datatables-Alloc" class="table table-fixed dt-responsive nowrap" cellspacing="0" width="100%" style="border:1px solid #e4e4e4;">
            <thead class="mc-table-head" style="border:1px solid #e4e4e4;">
                <tr style="border:1px solid #e4e4e4;">
                    <th>Promo Code</th>
                    <th>Promo Name</th>
                    <th>Promo Description</th>
                    <th>Promo Type</th>
                    <th>Status</th> 
                </tr>
            </thead>
            <tbody id="Allocate_Table">
             <tr>
              <td>Autumn100</td><td>December offer</td><td>New promo for decemeber attraction customers </td> <td>Active</td>
             </tr>      
            </tbody>
          </table>

          <!----custom-filter-modal-->
<div class="modal modal-bg" id="addPromo" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content max-width-300">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Promo</h4>
      </div>
      <div class="modal-body pad-0">
          <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span id="fromto" ></span> 
        <i class="fa fa-caret-down"></i>
        </div>
         
        <label for="name">Promo Code</label>
            <input class="controls" type="text" id="mail" placeholder="Enter Promo Code" autocomplete="off">

            <label for="name">Promo Name</label>
            <input class="controls" type="text" id="mail" placeholder="Enter Promo Name" autocomplete="off">
    
            <label for="name">Promo description</label>
            <textarea class="controls" rows="4"  name="message1"
                    style="width:100%;min-height:200px;"></textarea>


                    <label for="name">Promo Type</label>
                    <select name="promotype" id="nl" class="selectit" autocomplete="off">
                  <option value="Percentage">Percentage</option>
                  <option value="Flat fare">Flat Fare</option>
</select>

            <div class="mc-flex">
            <button class="button-style" data-dismiss="modal" id="filter_load" >Create</button>
            <button class="button-cancel-style" data-dismiss="modal">Cancel</button>
          </div>
  </div>
    </div>
    
  </div>
</div>

<!---end custom-filter-modal-->


</div>
      <!---mainbar-starts----->
    </div>
<!---modals-section------>
    
  