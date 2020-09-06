

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
     
    var myGetUrl = {};
    var myGetUrl2 = {};
    myGetUrl["data1"]="1";
    myGetUrl["data2"]="2";
    myGetUrl["data3"]="3";
    myGetUrl["data4"]="4";
    myGetUrl["data5"]="5";
    myGetUrl2["data"]=myGetUrl;
$(document).ready(function(){
  $("button").click(function(){
    $.ajax({
      type: "POST",
      url: 'http://localhost/testapi.php',
      data: myGetUrl2,
      async: false,
         
      success: function (data) {
      $('#div1').html(data);
      },
      error: function (xhr) {
        // document.getElementById("spinnermodal").style.display = "none";
        //  Server_Response_Fail(xhr.responseText);
      }
    });
  });
});
</script>
</head>
<body>

<div id="div1"></div>

<button>Get External Content</button>

</body>
</html>
