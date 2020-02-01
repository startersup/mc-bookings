
var text = '{'+
' "booked" : { "class":"green-status" , "showstatus":"Booked" },'+
' "booked-confirmed" : { "class":"green-status" , "showstatus":"Confirmed" },'+
' "comitted" : { "class":"green-status" , "showstatus":"Allocated" },'+
' "cancelled" : { "class":"green-status" , "showstatus":"Cancelled" },'+
' "completed" : { "class":"green-status" , "showstatus":"Completed" }'+
          '}';
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
}
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

 
    $('#mc-datatables tbody').on( 'click', '.mc-edit', function () {
        var table = $('#mc-datatables').DataTable();
        var data =   table.row( $(this).parents('tr') ).data();
        clearModal();
        getModalData('basic_info',data[0]);
        $('#mc-open-modal').trigger('click');
    } );

    $('.modalToggle').click(function() { 
        var id = $(this).attr('id');
        getModalData(id,document.getElementById('myModalLabel2').name);
    });

    
});
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
    }else if(myload === 'passenger_info')
    {
        modalPing='passenger_info';
        myGetUrl = myUrl+'myapi/passenger.php';
    }
    get_url_response(myGetUrl,mydata,'setModalData');
}
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
    }else if(modalPing === 'passenger_info')
    {

    }
 

    

}