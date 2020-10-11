var siteData = {};

function loadSiteScripts() {
    var myGetUrl = myUrl + "myapi/getSiteMaster.php";
    get_url_response(myGetUrl, {}, 'loadSiteInfo');
}

function loadSiteInfo(data) {
    siteData = JSON.parse(data);
    var optionData = '<option>--SELECT--</option>';
    for (var i = 0; i < siteData.length; i++) {
        optionData += '<option value="' + siteData[i].id + '">' + siteData[i].siteName + '</option>';
    }
    $('.siteDropDown').html(optionData);
}

$(document).on('click', '#siteDetails', function () {
    var myData = {};
    myData["headerScript"]=  $('#headerScript').val();
    myData["footerScripts"]= $('#footerScripts').val();
    myData["siteId"]= $('#siteId').val();
    var myGetUrl = myUrl + "myapi/siteMaster.php";
    get_url_response(myGetUrl, myData, 'showStatusMessage');
});

$(document).on('change', '.siteDropDown', function () {

    $('#headerScript').val('');
    $('#footerScripts').val('');
    for (var i = 0; i < siteData.length; i++) {
        if (siteData[i].id == $(this).val()) {

            $('#headerScript').val(siteData[i].headerScript);
            $('#footerScripts').val(siteData[i].footerScript);
        }

    }


});