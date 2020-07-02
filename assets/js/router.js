var router = {
    "dashboard" : {
        "url" :"admin/",
        "load":"dashboardLoad",
        "view":"dashboard/"
    },
    "bookings":{
        "url":"bookings/",
        "load":"bookingsLoad",
        "view":"bookings/"
    }
}
//idx = dashboardData["allBooking"].findIndex(data1 => data1.date === curr_date);

function pagerouter(key)
{
    var mydata={"x":"1"};
    var fname = router[key].load;
    var myGetUrl = myUrl + router[key].url;
    var pathName =myUrl+router[key].view;
   window.history.replaceState(null, null, pathName);
    get_page_response(myGetUrl,mydata, fname)
    $('#spinnermodal').hide();
}

function defaultLoader(temp)
{
     
    $('#spinnermodal').show();
     setTimeout(function(){
   
        for(var k in router)
        {
            if(router[k].view ==temp)
            {
                pagerouter(k);
            }
        } 
        
      }, 100);
    ;
   
}


function get_page_response(myGetUrl,mydata, fname) {
    $.ajax({
      type: "POST",
      url: myGetUrl,
      data: mydata,
      async: false,
      success: function (data) {
        $('#pageLoader').html(data);
       
        window[fname](data);
      },
      error: function (xhr) { }
    });
  }

  function setRequestPage(data)
  {
      
  }