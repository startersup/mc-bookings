

function dashboardLoad()
{
    var myData={};
    var myGetUrl = myUrl + "myapi/dashboard.php";
    
    get_url_response(myGetUrl, myData, "dashboardChange");
}

function dashboardChange(data)
{
    dashboardData = JSON.parse(data);
    var allBooking= [];
    var cancelled=[];
    var completed=[];
/* driverStatus: (7) [{…}, {…}, {…}, {…}, {…}, {…}, {…}]
interval: "10:00 to 11:00" */
 //   var ongoingJob=[];
    var totalBooked=[];
    var totalFare=[];
    var unalloc=[];

    var week_dates = getWeekDates();
    var count = week_dates.length;
    for(i=0;i<count;i++){
        var curr_date=week_dates[i];
        var idx =0;
        var tempdata={};

        idx =dashboardData["allBooking"].findIndex(data1=> data1.date ===curr_date );
        tempdata={};
        tempdata["date"]=curr_date;
        tempdata["value"]=0;
        if(idx >=0)
        {
            tempdata["value"]=dashboardData["allBooking"][idx].value;
        }
        allBooking.push(tempdata);

        idx =dashboardData["cancelled"].findIndex(data1=> data1.id ===curr_date );
        tempdata={};
        tempdata["date"]=curr_date;
        tempdata["value"]=0;
        if(idx >=0)
        {
            tempdata["value"]=dashboardData["cancelled"][idx].value;
        }
        cancelled.push(tempdata);

        idx =dashboardData["completed"].findIndex(data1=> data1.id ===curr_date );
        tempdata={};
        tempdata["date"]=curr_date;
        tempdata["value"]=0;
        if(idx >=0)
        {
            tempdata["value"]=dashboardData["completed"][idx].value;
        }
        completed.push(tempdata);

        idx =dashboardData["totalBooked"].findIndex(data1=> data1.id ===curr_date );
        tempdata={};
        tempdata["date"]=curr_date;
        tempdata["value"]=0;
        if(idx >=0)
        {
            tempdata["value"]=dashboardData["totalBooked"][idx].value;
        }
        totalBooked.push(tempdata);

        idx =dashboardData["totalFare"].findIndex(data1=> data1.id ===curr_date );
        tempdata={};
        tempdata["date"]=curr_date;
        tempdata["value"]=0;
        if(idx >=0)
        {
            tempdata["value"]=dashboardData["totalFare"][idx].value;
        }
        totalFare.push(tempdata);

        idx =dashboardData["unalloc"].findIndex(data1=> data1.id ===curr_date );
        tempdata={};
        tempdata["date"]=curr_date;
        tempdata["value"]=0;
        if(idx >=0)
        {
            tempdata["value"]=dashboardData["unalloc"][idx].value;
        }
        unalloc.push(tempdata);
    }

    sparkline.sparkline(document.querySelector(".allBooking"), allBooking, options);
    sparkline.sparkline(document.querySelector(".cancelled"), cancelled, options);
    sparkline.sparkline(document.querySelector(".completed"), completed, options);
    sparkline.sparkline(document.querySelector(".totalBooked"), totalBooked, options);
    sparkline.sparkline(document.querySelector(".totalFare"), totalFare, options);
    sparkline.sparkline(document.querySelector(".unalloc"), unalloc, options);


}

function getValfroDate()
{
    var index = students.findIndex(std=> std.id === 200);
}