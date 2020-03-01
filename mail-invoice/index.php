<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
</head>
<body>
    <center><button id="getPdf" >Download Now</button></center>

<script>
   document.getElementById("getPdf").addEventListener('click',function(evt) {
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var dataToRender = this.responseText;
      var doc = new jsPDF();
      var img = new Image();
      img.onload = function () {
            var canvas = document.createElement('canvas');
            canvas.width = img.naturalWidth;
            canvas.height = img.naturalHeight; 

            //next three lines for white background in case png has a transparent background
            var ctx = canvas.getContext('2d');
            ctx.fillStyle = '#fff';  /// set white fill style
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            canvas.getContext('2d').drawImage(img, 0, 0);
            doc.addImage(canvas.toDataURL('image/jpeg'), 'PNG', 0, 0,200,200);
            doc.save('sample-file.pdf');
        };
        img.src = 'https://minicabee.co.uk/assets/images/logo.png';
    }
  };
  xhttp.open("GET", "invoice-mail.php", true);
  xhttp.send();
});
</script>
</body>
</html>