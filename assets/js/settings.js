var siteData = {};

function loadSiteScripts() {
    var myGetUrl = myUrl + "myapi/getSiteMaster.php";
    get_url_response(myGetUrl, {}, 'loadSiteInfo');
}

function loadSiteInfo(data) {
    siteData = JSON.parse(data);
    var optionData = '<option value="">--SELECT--</option>';
    for (var i = 0; i < siteData.length; i++) {
        optionData += '<option value="' + siteData[i].id + '">' + siteData[i].siteName + '</option>';
    }
    $('.siteDropDown').html(optionData);
}

$(document).on('click', '#siteDetails', function () {
    var myData = {};
    myData["headerScript"] = $('#headerScript').val();
    myData["footerScripts"] = $('#footerScripts').val();
    myData["siteId"] = $('#siteId').val();
    var myGetUrl = myUrl + "myapi/siteMaster.php";
    get_url_response(myGetUrl, myData, 'showStatusMessage');
    if ($("#myAlert_msg").attr("status-mc").toLowerCase() == 'success') {
        for (var i = 0; i < siteData.length; i++) {
            if (siteData[i].id == myData["siteId"]) {

                siteData[i].headerScript = myData["headerScript"];
                siteData[i].footerScript = myData["footerScripts"];
            }

        }
    }
});

$(document).on("submit", "#seoPageList", function () {
    var formData = new FormData($(this)[0]);
    var Url = myUrl + 'myapi/uploadSeoFile.php';
    $.ajax({
      url: Url,
      type: 'POST',
      data: formData,
      async: false,
      success: function (data) {
        alert(data)
      },
      enctype: 'multipart/form-data',
      cache: false,
      contentType: false,
      processData: false
    });
  
    return false;
  });
  

$(document).on('change', '.siteDropDown', function () {

    if ($(this).val() == "") {
        $('#headerScript').val('');
        $('#footerScripts').val('');
    } else {

        for (var i = 0; i < siteData.length; i++) {
            if (siteData[i].id == $(this).val()) {

                $('#headerScript').val(siteData[i].headerScript);
                $('#footerScripts').val(siteData[i].footerScript);
            }

        }
    }

});