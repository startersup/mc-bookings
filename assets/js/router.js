var router = {
    "dashboard": {
        "url": "admin/",
        "load": "dashboardLoad",
        "view": "admin/"
    },
    "bookings": {
        "url": "bookings/",
        "load": "bookingsLoad",
        "view": "bookings/"
    },
    "settings": {
        "url": "settings/",
        "load": "",
        "view": "settings/"
    },
    "login": {
        "url": "login/",
        "load": "",
        "view": "login/"
    },
    "partners": {
        "url": "partners/",
        "load": "",
        "view": "partners/"
    },
    "passengers": {
        "url": "passengers/",
        "load": "loadPassenger",
        "view": "passengers/"
    },
    "invoice": {
        "url": "invoice/",
        "load": "",
        "view": "invoice/"
    }, 
    "drivers": {
        "url": "drivers/",
        "load": "loadDriver",
        "view": "drivers/"
    }
}


function pagerouter(key) {
    $('#spinnermodal').show();
    setTimeout(function () {
        var mydata = { "x": "1" };
        var fname = router[key].load;
        var myGetUrl = myUrl + router[key].url;
        var pathName = myUrl + router[key].view;
        window.history.replaceState(null, null, pathName);
        get_page_response(myGetUrl, mydata, fname)
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


function get_page_response(myGetUrl, mydata, fname) {
    $.ajax({
        type: "POST",
        url: myGetUrl,
        data: mydata,
        async: false,
        success: function (data) {
            $('#pageLoader').html(data);
            if(!(fname==''))
            {
                window[fname];
            }
            
            $('#spinnermodal').hide();
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