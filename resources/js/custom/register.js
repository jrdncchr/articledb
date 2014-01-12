$(document).ready(function() {

    $("#cancelBtn").click(function() {
        window.location = base_url;
    });
    $("#regUsername").keyup(function() {
        if ($("#regUsername").val().length > 4) {
            $.ajax({
                url: base_url + "register/check",
                data: {'username': $("#regUsername").val()},
                cache: false,
                type: 'post',
                success: function(data) {
                    if (data === "Available") {
                        $("#regUsername").css({'background': '#dff0d8'});
                        $("#regMessage").removeClass().attr("class", "alert alert-success").html("Username available!");
                        validUsername = true;
                    } else {
                        $("#regUsername").css({'background': '#f2dede'});
                        $("#regMessage").removeClass().attr("class", "alert alert-danger").html("Username is already taken!");
                        validUsername = false;
                    }
                }
            });
        } else {
            $("#regUsername").css({'background': 'white'});
            $("#regMessage").removeClass().attr("class", "alert alert-info").html("<i class='fa fa-info-circle'></i> Please fill up all fields.");
            validUsername = false;
        }
    });
    
});

var validUsername = false;
function validate() {
    if(validUsername) {
        return true;
    }
    return false;
}