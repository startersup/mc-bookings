
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
    SetParam('');
    
}
function SetParam()
{
    
    get_url_response();
}
function get_url_response()
{
               // document.getElementById("spinnermodal").style.display = "block";
               var url="https://minicabee.co.uk/myadmin/myapi/func_future.php";
                $.ajax({
                    
                type: 'POST',
                url:url,
                data: '',
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

function setRow(data)
{
    var obj = JSON.parse(data);
    var myTable = $('#mc-datatables').DataTable();
    var loop = obj.length;
    var editRec='<div class="mc-edit"></div>';
    var statusRec ='';
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
       alert(id);
    });

});


 