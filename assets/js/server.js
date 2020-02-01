
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


$(document).ready(function() {
    
    $('.booking').click(function() { 
        var id = $(this).attr('id');
        SetParam(id);
    });

 
    $('#mc-datatables tbody').on( 'click', '.mc-edit', function () {
        var table = $('#mc-datatables').DataTable();
        var data =   table.row( $(this).parents('tr') ).data();
        clearModal();
        getModalData('basic',data[0]);
        $('#mc-open-modal').trigger('click');
    } );
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
}
function getModalData(myload,book_id)
{

    var mydata ={};
    var myGetUrl='';
    mydata["book_id"]=book_id;
    if(myload === 'basic')
    {
        myGetUrl = myUrl+'myapi/basic_.php';
    }
    get_url_response(myGetUrl,mydata,'setModalData');
}
function setModalData(myData)
{
    var myObj = JSON.parse(data);
    document.getElementById('modal_booking_site').value=myObj["booked_site"];
    document.getElementById('modal_booking_status').value=myObj["status"];
    document.getElementById('modal_booking_pickup').value=myObj["src"];
    document.getElementById('modal_booking_dropoff').value=myObj["des"];
    document.getElementById('modal_booking_date').value=myObj["dt"];
    document.getElementById('modal_booking_time').value=myObj["time"];
    document.getElementById('modal_booking_cab_type').value=myObj["type"];
    

}