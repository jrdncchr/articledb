$(document).ready(function() {
    $("#loginBtn").click(function() {
        var username = $("#loginUsername").val();
        var password = $("#loginPassword").val();
        
        $.ajax({
            url: base_url + "welcome/login",
            data: {'username': username, 'password': password},
            type: 'post',
            cache: false,
            success: function(data) {
                if(data === "Success") {
                    window.location = base_url + 'main';
                } else {
                    $("#loginMessage").addClass('alert').html("<i class='fa fa-times'></i> " + data);
                }
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });
    });
});