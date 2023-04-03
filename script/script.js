$(document).ready(function performAllFunctions() {
  $("#generateTicket").on("click", function generateTicket(event) {
    // event.preventDefault();
    var formData = {
      vechileNumber: $("#vechileNumver").val(),
      vechileType: $("#vechileType").val(),
    };

    $.ajax({
      type: "POST",
      url: "generateTicket.php",
      data: formData,
      dataType: "json",
      encode: true,
      success: function getResponse($response){
        console.log($response);
      }
    });
  });

  $('#relase-btn').on("click", function relaseCar() {
    var formData = {
      vechileNumber: $("#vechileNumver").val()
    };
    $.ajax({
      type: "POST",
      url: "changeStatusOfBooking.php",
      data: formData,
      dataType: "json",
      encode: true,
      success: function getResponse($response) {
        console.log($response);
      }
    });
  })
});
