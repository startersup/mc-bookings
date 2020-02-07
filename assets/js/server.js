
var text = '{'+
' "booked" : { "class":"green-status" , "showstatus":"Booked" },'+
' "booked-confirmed" : { "class":"green-status" , "showstatus":"Confirmed" },'+
' "comitted" : { "class":"green-status" , "showstatus":"Allocated" },'+
' "cancelled" : { "class":"green-status" , "showstatus":"Cancelled" },'+
' "completed" : { "class":"green-status" , "showstatus":"Completed" }'+
          '}';
var text_filter_name ='ALL Booked Confirmed Allocated Completed Cancelled';
var text_filter_value = 'ALL booked booked-confirmed comitted completed cancelled';
var obj_status = JSON.parse(text);
var loadBooking = 'Today';
var myProtocol = window.location.protocol;
var mySite = window.location.host;
var myUrl = myProtocol+'//'+mySite+'/';
var modalPing='';

function pageLoad()
{
    SetParam('today');
    
}
function SetParam(myparam)
{
    document.getElementById("spinnermodal").style.display = "block";
    var mydata ={};
    var myGetUrl='';
    if(myparam === 'today')
    {
        myGetUrl = myUrl+'myapi/func_today.php';
    }else if(myparam === 'yesterday')
    {
        myGetUrl = myUrl+'myapi/func_yest.php';
    }else if(myparam === 'tommorrow')
    {
        myGetUrl = myUrl+'myapi/func_tmrw.php';
    }else if(myparam === 'custom')
    {
        myGetUrl = myUrl+'myapi/func_custom.php';
    }else if(myparam === 'future')
    {
        myGetUrl = myUrl+'myapi/func_future.php';
    }
    get_booking_response(myGetUrl,mydata);
}
function get_booking_response(myGetUrl,mydata)
{
                $.ajax({
                    
                type: 'POST',
                url:myGetUrl,
                data: mydata,
                async:false,
                success: function(data) 
                { 

                    setRow(data);
                    // document.getElementById("spinnermodal").style.display = "none";
                     //window[functionName](data);
                },
                error: function(xhr) { 
                 
                   // document.getElementById("spinnermodal").style.display = "none";
                  //  Server_Response_Fail(xhr.responseText); 
                }
                });

}
function get_url_response(myGetUrl,mydata,myfunc)
{

                $.ajax({
                    
                type: 'POST',
                url:myGetUrl,
                data: mydata,
                async:false,
                success: function(data) 
                { 
                    window[myfunc](data);                   
                },
                error: function(xhr) { 
                 

                }
                });

}
function setRow(data)
{
	var myTable = $('#mc-datatables').DataTable();
	myTable.destroy();
          var result = JSON.parse(data);
            $('#mc-datatables').DataTable({
               
                "data": result,
                "columns" : [
                        { "data": "refid" },
			{ "data": "booking_site" },
                        { "data": "src" },
                        { "data": "des" },
                        { "data": "dt" },
			{ "data": "type" },
                        { "data": "fare" },
                        { "data": "status" },
		         {data: null,
        defaultContent: '<div class="mc-edit"></div>'
    }
                   ]
            });
setStatus();
}
function setStatus()
{

var table = $('#example').DataTable(); 
table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
    var data = this.data();
	var myClass = '';
	var myDiv='<div class="myClass">myStatus</div>';
	if(data.status == 'completed')
	{
	myDiv=myDiv.replace("myStatus", "Completed");
	myDiv=myDiv.replace("myClass", "mc-cl-Completed");
	}else if(data.status == 'booked')
	{
	myDiv=myDiv.replace("myStatus", "Booked");
	myDiv=myDiv.replace("myClass", "mc-cl-Booked");
	}else if(data.status == 'booked-confirmed')
	{
		myDiv=myDiv.replace("myStatus", "Confirmed");
	myDiv=myDiv.replace("myClass", "mc-cl-Confirmed");
	}else if(data.status == 'cancelled')
	{
			myDiv=myDiv.replace("myStatus", "Cancelled");
	myDiv=myDiv.replace("myClass", "mc-cl-Cancelled");
	}else if(data.status == 'comitted')
	{
			myDiv=myDiv.replace("myStatus", "Comitted");
	myDiv=myDiv.replace("myClass", "mc-cl-Comitted");
	}
	data.status=myDiv;
	 this.data(data);
	
	}	);
	
}

/*
function setRow(data)
{

    var obj = JSON.parse(data);
    var myTable = $('#mc-datatables').DataTable();
    var loop = obj.length;
    var editRec='<div class="mc-edit"></div>';
    var statusRec ='';
    myTable.clear().draw();
    for(var i=0;i<loop;i++)
    {
        statusRec= GetRecordStatus(obj[i]["status"]);
        myTable.row.add( [
            obj[i]["refid"],
            obj[i]["booked_site"],
            obj[i]["src"],
            obj[i]["des"],
            obj[i]["dt"]+' '+obj[i]["time"],
            obj[i]["type"],
            obj[i]["fare"],
            statusRec,           
            editRec
        ] ).draw( false );
    }
    document.getElementById("spinnermodal").style.display = "none";

} */
function GetRecordStatus(status)
{

    return '<div class="'+obj_status[status]["class"]+'">'+obj_status[status]["showstatus"]+'</div>';
}

function clearClass()
{
    $('#yesterday').removeClass("active");
    $('#today').removeClass("active");
    $('#tommorrow').removeClass("active");
    $('#future').removeClass("active");
}
$(document).ready(function() {
    
    $('.booking').click(function() {
        var id = $(this).attr('id');
        clearClass();
        $(this).addClass("active");       
        SetParam(id);
    });

    $( "#filter_all" ).click(function() {

        filterCheckBox(this);
      });
 
    $('#mc-datatables tbody').on( 'click', '.mc-edit', function () {
        var table = $('#mc-datatables').DataTable();
        var data =   table.row( $(this).parents('tr') ).data();
        $('#mc-open-modal').trigger('click');
        clearModal();
        getModalData('basic_info',data[0]);
 
    } );

    $('.modalToggle').click(function() { 
        var id = $(this).attr('id');
        if((id === 'bidding') )
        {
            getModalData(id,document.getElementById('myModalBookId_temp').innerHTML);
        }
        
    });

    $('#filter_load').click(function() { 

        searchByFilter();
    });


    
});
function searchByFilter()
{
    var mydata={};
    if(document.getElementById('filter_all').checked)
    {
        mydata["status"]=document.getElementById('filter_all').value;
    }else{
        var temp='temp'
        for(var i=1; i<=5;i++)
        {
            if(document.getElementById(i).checked)
            {
                temp=temp+','+document.getElementById(i).value;
            }
        }

        mydata["status"]=temp;
    }

    var temp1 = document.getElementById("fromto").innerHTML;

    var d = temp1.split(" - ");

    mydata['from']=date_format_db(d[0]);
    mydata['to']=date_format_db(d[1]);

    var myGetUrl = myUrl+'myapi/custom.php';

get_booking_response(myGetUrl,mydata);
}
function filterCheckBox(ele)
{

    if (ele.checked) {
        for(var i=1; i<=5;i++)
        {

            document.getElementById(i).disabled = true
        }
    }
    else{

        for(var i=1; i<=5;i++)
        {

            document.getElementById(i).disabled = false;
        }
    }
}
function clearModal()
{
    document.getElementById('modal_booking_site').value		='';
    document.getElementById('modal_booking_status').value	='';
    document.getElementById('modal_booking_pickup').value	='';
    document.getElementById('modal_booking_dropoff').value	='';
    document.getElementById('modal_booking_date').value		='';
    document.getElementById('modal_booking_time').value		='';
    document.getElementById('modal_booking_cab_type').value =''; 
    document.getElementById('myModalBookId').innerHTML =''; 
    document.getElementById('myModalBookId').name =''; 

    document.getElementById('modal_booking_name').value=		'';
    document.getElementById('modal_booking_mail').value=		'';
    document.getElementById('modal_booking_num1').value=		'';
    document.getElementById('modal_booking_num2').value=		'';
    document.getElementById('modal_booking_address1').value=	'';
    document.getElementById('modal_booking_address2').value=	'';
    document.getElementById('modal_booking_dt').value=			'';
    document.getElementById('modal_booking_tm').value=			'';
    document.getElementById('modal_booking_np').value=			'';
    document.getElementById('modal_booking_nl').value=			'';
    document.getElementById('modal_booking_location').value=	'';
    document.getElementById('modal_booking_info').value=		'';
    document.getElementById('modal_booking_type').value=		'';
    document.getElementById('modal_booking_fare').value=		'';



}
function getModalData(myload,book_id)
{

    var mydata ={};
    var myGetUrl='';
    mydata["book_id"]=book_id;
    if(myload === 'basic_info')
    {
        modalPing='basic_info';
        myGetUrl = myUrl+'myapi/basic_info.php';
    }
    get_url_response(myGetUrl,mydata,'setModalData');
}
var objModaldata={};
function setModalData(myData)
{
    var myObj = JSON.parse(myData);
    if(modalPing === 'basic_info')
    {
        document.getElementById('modal_booking_site').value=myObj[0]["booked_site"];
        document.getElementById('modal_booking_status').value=myObj[0]["status"];
        document.getElementById('modal_booking_pickup').value=myObj[0]["src"];
        document.getElementById('modal_booking_dropoff').value=myObj[0]["des"];
        document.getElementById('modal_booking_date').value=myObj[0]["dt"];
        document.getElementById('modal_booking_time').value=myObj[0]["time"];
        document.getElementById('modal_booking_cab_type').value=myObj[0]["type"];
        document.getElementById('myModalBookId').innerHTML ='Booking Information - ( '+myObj[0]["refid"]+' )'; 
        document.getElementById('myModalBookId_temp').innerHTML = myObj[0]["refid"];
   
        document.getElementById('modal_booking_name').value=myObj[0]["name"];
        document.getElementById('modal_booking_mail').value=myObj[0]["mail"];
        document.getElementById('modal_booking_num1').value=myObj[0]["num1"];
        document.getElementById('modal_booking_num2').value=myObj[0]["num2"];
        document.getElementById('modal_booking_address1').value=myObj[0]["address1"];
        document.getElementById('modal_booking_address2').value=myObj[0]["address2"];
        document.getElementById('modal_booking_dt').value=myObj[0]["dt"];
        document.getElementById('modal_booking_tm').value=myObj[0]["time"];
        document.getElementById('modal_booking_np').value=myObj[0]["np"];
        document.getElementById('modal_booking_nl').value=myObj[0]["nl"];
        document.getElementById('modal_booking_location').value=myObj[0]["location"];
        document.getElementById('modal_booking_info').value=myObj[0]["info"];
        document.getElementById('modal_booking_type').value=myObj[0]["type"];
        document.getElementById('modal_booking_fare').value=myObj[0]["fare"];
    }
    
 


}
function date_format_db(x)
{
   
    var d = new Date(x), 
    month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear(); 
        
        return(year+"-"+month+"-"+day)
}
// var temp = document.getElementById("fromto").innerHTML;
   
// var d = temp.split(" - ");

// mydata['from']=date_format_db(d[0]);
// mydata['to']=date_format_db(d[1]);
