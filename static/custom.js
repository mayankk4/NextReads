function is_input_valid() {
  var input = $("#user-id").val();
  var patt = new RegExp("^(((https?:\/\/)?(www\.)?goodreads\.com\/user\/show\/)?([0-9]+)(-.*)?)");
  return patt.test(input);
}


$(document).ready(function() {

    $('#user-id').on('input',function(e){
        if (!is_input_valid()) {
          $("#invalid-input-feedback").show();
          $("#user-input-button").prop('disabled', true);
        } else {
          $("#invalid-input-feedback").hide();
          $("#user-input-button").removeAttr('disabled');
        }
    });


    $('#user-input-button').on('click', function(e) {
      if (!is_input_valid()) {
        $("#invalid-input-feedback").show();
        $("#user-input-button").prop('disabled', true);
        return;
      }

      // Add loading animation
      $("#user-input-section").hide();
      $("#loading-gif-section").show();

      var id_patt = new RegExp("[0-9]+");
      var input = $("#user-id").val();

      var user_id_input = input.match(id_patt)[0];
      $.ajax({
        url: "/welcome/fetch_recommendations",
        method: "POST",
        cache: false,
        data: { id: user_id_input},
        success: function (data) {
            $("html").html(data);
        },
      });
    });

});
