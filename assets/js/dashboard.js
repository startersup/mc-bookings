
var allBooking = [];
var cancelled = [];
var completed = [];
var totalBooked = [];
var totalFare = [];
var unalloc = [];

function dashboardLoad() {
    var myData = {};
    var myGetUrl = myUrl + "myapi/dashboard.php";

    get_url_response(myGetUrl, myData, "dashboardChange");
}

function dashboardChange(data) {
    dashboardData = JSON.parse(data);

    allBooking = [];
    cancelled = [];
    completed = [];
    totalBooked = [];
    totalFare = [];
    unalloc = [];
    var today_Date = todayDate();

    var week_dates = getWeekDates();
    var count = week_dates.length;
    for (i = 0; i < count; i++) {
        var curr_date = week_dates[i];
        var idx = 0;
        var tempdata = {};

        idx = dashboardData["allBooking"].findIndex(data1 => data1.date === curr_date);
        tempdata = {};
        tempdata["date"] = curr_date;
        tempdata["value"] = 0;
        tempdata["name"] = "New Booking";
        if (idx >= 0) {
            tempdata["value"] = parseInt(dashboardData["allBooking"][idx].value);
        }
        allBooking.push(tempdata);

        idx = dashboardData["cancelled"].findIndex(data1 => data1.date === curr_date);
        tempdata = {};
        tempdata["date"] = curr_date;
        tempdata["value"] = 0;
        tempdata["name"] = "Cancelled Jobs";
        if (idx >= 0) {
            tempdata["value"] = parseInt(dashboardData["cancelled"][idx].value);
        }
        cancelled.push(tempdata);

        idx = dashboardData["completed"].findIndex(data1 => data1.date === curr_date);
        tempdata = {};
        tempdata["date"] = curr_date;
        tempdata["value"] = 0;
        tempdata["name"] = "Completed Jobs";
        if (idx >= 0) {
            tempdata["value"] = parseInt(dashboardData["completed"][idx].value);
        }
        completed.push(tempdata);

        idx = dashboardData["totalBooked"].findIndex(data1 => data1.date === curr_date);
        tempdata = {};
        tempdata["date"] = curr_date;
        tempdata["value"] = 0;
        tempdata["name"] = "Today Booking";
        if (idx >= 0) {
            tempdata["value"] = parseInt(dashboardData["totalBooked"][idx].value);
        }
        totalBooked.push(tempdata);

        idx = dashboardData["totalFare"].findIndex(data1 => data1.date === curr_date);
        tempdata = {};
        tempdata["date"] = curr_date;
        tempdata["value"] = 0;
        tempdata["name"] = "Fare";
        if (idx >= 0) {
            tempdata["value"] = parseFloat(dashboardData["totalFare"][idx].value);
        }
        totalFare.push(tempdata);

        idx = dashboardData["unalloc"].findIndex(data1 => data1.date === curr_date);
        tempdata = {};
        tempdata["date"] = curr_date;
        tempdata["value"] = 0;
        tempdata["name"] = "Unallocated Jobs";
        if (idx >= 0) {
            tempdata["value"] = parseInt(dashboardData["unalloc"][idx].value);
        }
        unalloc.push(tempdata);

        if (curr_date == today_Date) {
            calcPercentile(i);
        }
    }

    sparkline.sparkline(document.querySelector(".allBooking"), allBooking, options_Count);
    sparkline.sparkline(document.querySelector(".cancelled"), cancelled, options_Count);
    sparkline.sparkline(document.querySelector(".completed"), completed, options_Count);
    sparkline.sparkline(document.querySelector(".totalBooked"), totalBooked, options_Count);
    sparkline.sparkline(document.querySelector(".totalFare"), totalFare, options_GBP);
    sparkline.sparkline(document.querySelector(".unalloc"), unalloc, options_Count);

    setTables(dashboardData);

}

function setTables(dashboardData) {

      /* driverStatus: (7) [{…}, {…}, {…}, {…}, {…}, {…}, {…}]
 interval: "10:00 to 11:00" */
    //   var ongoingJob=[];
    var temp='';
    var count =dashboardData["driverStatus"].length
    for(i=0;i<count;i++)
        {
            temp = temp +'<tr><td>'+dashboardData["driverStatus"][i].id+'</td><td>'+dashboardData["driverStatus"][i].name+'</td><td>'+dashboardData["driverStatus"][i].contact+'</td><td>NA</td></tr>';
        }
        $('#Driver_Online_tbl').html(temp);

        temp='';
        count =dashboardData["ongoingJob"].length
    for(i=0;i<count;i++)
        {
            temp = temp +'<tr><td>'+dashboardData["ongoingJob"][i].refid+'</td><td>Allocated</td><td>'+dashboardData["ongoingJob"][i].name+'</td><td>'+dashboardData["ongoingJob"][i].contact+'</td></tr>';
        }
        $('#Ongoing_job_tbl').html(temp);
        temp='Ongoing Jobs ( '+dashboardData["interval"]+' )';
    $('#currentTiming').text(temp)
        

}
function calcPercentile(i) {
    var yest_val = 0;
    var today_val = 0;
    var percent = 0.00;
    var temp = ''
    var svg = ''

    yest_val = allBooking[i - 1].value;
    today_val = allBooking[i].value;
    if ((today_val - yest_val) < 0) {
        percent = parseFloat(((yest_val - today_val) * 100) / 2).toFixed(2);
        svg = 'decrease';

    } else if ((today_val - yest_val) > 0) {
        percent = parseFloat(((today_val - yest_val) * 100) / 2).toFixed(2);
        svg = 'increase';

    } else if ((today_val - yest_val) == 0) {
        percent = 0.00;
        svg = 'increase';
    }
    $('#allBookingId').empty();
    $('#allBookingId').text(today_val);
    temp = percent + '% ';
    $('#allBookingIdPercent').text(temp);
    temp = '<img style="width:10px;" src="./assets/images/icons/' + svg + '.svg">'
    $('#allBookingIdPercent').append(temp);

    yest_val = cancelled[i - 1].value;
    today_val = cancelled[i].value;
    if ((today_val - yest_val) < 0) {
        percent = parseFloat(((yest_val - today_val) * 100) / 2).toFixed(2);
        svg = 'decrease';

    } else if ((today_val - yest_val) > 0) {
        percent = parseFloat(((today_val - yest_val) * 100) / 2).toFixed(2);
        svg = 'increase';

    } else if ((today_val - yest_val) == 0) {
        percent = 0.00;
        svg = 'increase';
    }
    $('#cancelledIdPercent').empty();
    $('#cancelledId').text(today_val);
    temp = percent + '% ';
    $('#cancelledIdPercent').text(temp);
    temp = '<img style="width:10px;" src="./assets/images/icons/' + svg + '.svg">'
    $('#cancelledIdPercent').append(temp);


    yest_val = completed[i - 1].value;
    today_val = completed[i].value;
    if ((today_val - yest_val) < 0) {
        percent = parseFloat(((yest_val - today_val) * 100) / 2).toFixed(2);
        svg = 'decrease';

    } else if ((today_val - yest_val) > 0) {
        percent = parseFloat(((today_val - yest_val) * 100) / 2).toFixed(2);
        svg = 'increase';

    } else if ((today_val - yest_val) == 0) {
        percent = 0.00;
        svg = 'increase';
    }
    $('#completedIdPercent').empty();
    $('#completedId').text(today_val);
    temp = percent + '% ';
    $('#completedIdPercent').text(temp);
    temp = '<img style="width:10px;" src="./assets/images/icons/' + svg + '.svg">'
    $('#completedIdPercent').append(temp);


    yest_val = totalBooked[i - 1].value;
    today_val = totalBooked[i].value;
    if ((today_val - yest_val) < 0) {
        percent = parseFloat(((yest_val - today_val) * 100) / 2).toFixed(2);
        svg = 'decrease';

    } else if ((today_val - yest_val) > 0) {
        percent = parseFloat(((today_val - yest_val) * 100) / 2).toFixed(2);
        svg = 'increase';

    } else if ((today_val - yest_val) == 0) {
        percent = 0.00;
        svg = 'increase';
    }
    $('#totalBookedIdPercent').empty();
    $('#totalBookedId').text(today_val);
    temp = percent + '% ';
    $('#totalBookedIdPercent').text(temp);
    temp = '<img style="width:10px;" src="./assets/images/icons/' + svg + '.svg">'
    $('#totalBookedIdPercent').append(temp);


    yest_val = totalFare[i - 1].value;
    today_val = totalFare[i].value;
    if ((today_val - yest_val) < 0) {
        percent = parseFloat(((yest_val - today_val) * 100) / 2).toFixed(2);
        svg = 'decrease';

    } else if ((today_val - yest_val) > 0) {
        percent = parseFloat(((today_val - yest_val) * 100) / 2).toFixed(2);
        svg = 'increase';

    } else if ((today_val - yest_val) == 0) {
        percent = 0.00;
        svg = 'increase';
    }
    $('#totalFareIdPercent').remove();
    $('#totalFareId').text(today_val);
    temp = percent + '% ';
    $('#totalFareIdPercent').text(temp);
    temp = '<img style="width:10px;" src="./assets/images/icons/' + svg + '.svg">'
    $('#totalFareIdPercent').append(temp);

    yest_val = unalloc[i - 1].value;
    today_val = unalloc[i].value;
    if ((today_val - yest_val) < 0) {
        percent = parseFloat(((yest_val - today_val) * 100) / 2).toFixed(2);
        svg = 'decrease';

    } else if ((today_val - yest_val) > 0) {
        percent = parseFloat(((today_val - yest_val) * 100) / 2).toFixed(2);
        svg = 'increase';

    } else if ((today_val - yest_val) == 0) {
        percent = 0.00;
        svg = 'increase';
    }
    $('#unallocIdPercent').remove();
    $('#unallocId').text(today_val);
    temp = percent + '% ';
    $('#unallocIdPercent').text(temp);
    temp = '<img style="width:10px;" src="./assets/images/icons/' + svg + '.svg">'
    $('#unallocIdPercent').append(temp);

}