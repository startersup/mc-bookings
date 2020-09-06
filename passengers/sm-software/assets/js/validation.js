$(document).on('keyup', '.sm-numeric', function () {

    var ele = $(this).val();
    var wnum = $(this).attr("whole");
    var dnum = $(this).attr("decimal");
    if (dnum == "0" || dnum == "") {
      var regex = new RegExp("^\\d{0," + wnum + "}?$");
      if (!regex.test($(this).val())) {
        $(this).val( $(this).val().substring(0, $(this).val().length - 1) );
      }
    } else {
      var regex = new RegExp("^\\d{0," + wnum + "}(\\.\\d{0," + dnum + "})?$");
      if (!regex.test($(this).val())) {
        $(this).val( $(this).val().substring(0, $(this).val().length - 1) );
      }
    }
  });

  $(document).on('blur', '.sm-mail', function () {

  });