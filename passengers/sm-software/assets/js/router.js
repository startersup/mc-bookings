var router = {
    "dashboard": {
        "url": "dashboard/",
        "load": "",
        "view": "dashboard/",
        "title":""
    },
    "login": {
        "url": "login/",
        "load": "",
        "view": "login/",
        "title":""
    },
    "schoolBooking": {
        "url": "bookings/school/",
        "load": "",
        "view": "bookings/school/"
    },
    "newSchoolBooking": {
        "url": "bookings/school/new/",
        "load": "",
        "view": "bookings/school/new/"
    },
    "settings": {
        "url": "settings/",
        "load": "",
        "view": "settings/"
    },
    "partners": {
        "url": "partners/",
        "load": "",
        "view": "partners/"
    }, 
    "drivers": {
        "url": "peoples/drivers/",
        "load": "",
        "view": "peoples/drivers/"
    },
    "addDriver": {
        "url": "peoples/drivers/add/",
        "load": "",
        "view": "peoples/drivers/add/"
    },
    "escorts": {
        "url": "peoples/escorts/",
        "load": "",
        "view": "peoples/escorts/"
    },
    "addEscorts": {
        "url": "peoples/escorts/add/",
        "load": "",
        "view": "peoples/escorts/add/"
    },
    "employees": {
        "url": "peoples/employees/",
        "load": "",
        "view": "peoples/employees/"
    },
    "addEmployees": {
        "url": "peoples/employees/add/",
        "load": "",
        "view": "peoples/employees/add/"
    },
    "students": {
        "url": "peoples/students/",
        "load": "",
        "view": "peoples/students/"
    },
    "addStudents": {
        "url": "peoples/students/add/",
        "load": "",
        "view": "peoples/students/add/"
    },
    "routes": {
        "url": "company/routes/",
        "load": "",
        "view": "company/routes/"
    },
    "addRoutes": {
        "url": "company/routes/add/",
        "load": "",
        "view": "company/routes/add/"
    },
    "companyProfit": {
        "url": "company/profit/",
        "load": "",
        "view": "company/profit/"
    },
}



function pagerouter(key) {
   // $('#spinnermodal').show();
    setTimeout(function () {
        var mydata = { "x": "1" };
        var fname = router[key].load;
        var myGetUrl = myUrl + router[key].url;
        var pathName = myUrl + router[key].view;
        window.history.replaceState(null, null, pathName);
        getPageCode(myGetUrl, mydata, fname)
    }, 300);
   
}



function defaultLoader(temp) {

    //   $('#spinnermodal').show();
    //    setTimeout(function(){
    var routeFlag = true;
    for (var k in router) {
        if (router[k].view == temp) {
            pagerouter(k);
        }
    }

    //  }, 200);   

}


function getPageCode(myGetUrl, mydata, fname) {
    $.ajax({
        type: "POST",
        url: myGetUrl,
        data: mydata,
        async: false,
        success: function (data) {
            $('#pageLoader').html(data);
            if(!(fname==''))
            {
                window[fname]();
            }
            
         //   $('#spinnermodal').hide();
        },
        error: function (xhr) { }
    });
}

function LoadJsScript() {
    var loop = jsRouter.length;
    for (i = 0; i < loop; i++) {
        var path = myUrl + jsRouter[i];
        $.getScript(path, function () {
            console.log(jsRouter[i] + '  => Loaded');
        });
    }




}


$(document).on('click', '.sm-routerClass', function () {
  
    var key = $(this).attr("href");
    if(key !='')
    {
        pagerouter(key);
    }
    
    return false;
  
  });
  