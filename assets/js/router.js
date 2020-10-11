var router = {
    "dashboard": {
        "url": "admin/",
        "load": "dashboardLoad",
        "view": "admin/",
        "js":""
    },
    "bookings": {
        "url": "bookings/",
        "load": "bookingsLoad",
        "view": "bookings/",
        "js":""
    },
    "otsBookings": {
        "url": "otsBookings/",
        "load": "OtsBookingsLoad",
        "view": "otsBookings/",
        "js":""
    },
    "settings": {
        "url": "settings/",
        "load": "",
        "view": "settings/",
        "js":""
    },
    "login": {
        "url": "login/",
        "load": "",
        "view": "login/",
        "js":""
    },
    "partners": {
        "url": "partners/",
        "load": "loadProvider",
        "view": "partners/",
        "js":""
    },
    "passengers": {
        "url": "passengers/",
        "load": "loadPassenger",
        "view": "passengers/",
        "js":""
    },
    "invoice": {
        "url": "invoice/",
        "load": "LoadJS",
        "view": "invoice/",
        "js":""
    }, 
    "drivers": {
        "url": "drivers/",
        "load": "loadDriver",
        "view": "drivers/",
        "js":""
    },
    "emails": {
        "url": "emails/templates/",
        "load": "",
        "view": "emails/templates/",
        "js":""
    },
    "userSettings": {
        "url": "settings/user",
        "load": "",
        "view": "settings/user",
        "js":""
    },
    
}


function pagerouter(key) {
    $('#spinnermodal').show();
    setTimeout(function () {
        var mydata = { "x": "1" };
        var fname = router[key].load;
        var myGetUrl = myUrl + router[key].url;
        var pathName = myUrl + router[key].view;
        var jsFile = myUrl + router[key].js;
        window.history.replaceState(null, null, pathName);
        get_page_response(myGetUrl, mydata, fname,jsFile)
    }, 300);
   
}



function defaultLoader(temp) {

    //   $('#spinnermodal').show();
    //    setTimeout(function(){

    for (var k in router) {
        if (router[k].view == temp) {
            pagerouter(k);
        }
    }

    //  }, 200);   

}


function get_page_response(myGetUrl, mydata, fname,jsFile) {
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
            LoadJsScript(jsFile);
            $('#spinnermodal').hide();
        },
        error: function (xhr) { }
    });
}

function LoadJsScript(jsFile) {
    if(jsFile != '')
    {
    var jsFileList=jsFile.split(',');
    var loop = jsFileList.length;
    for(var i=0;i<loop;i++)
    {
    var filename=myUrl+'assets/js/'+jsFileList[i];
        $.getScript(filename);
    }
    }
}