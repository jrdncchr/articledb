$(document).ready(function() {
    $("#loginBtn").click(function() {
        login();
    });
    $("#loginUsername").keypress(function(e) {
        if (e.which === 13) {
            login();
        }
    });
    $("#loginPassword").keypress(function(e) {
        if (e.which === 13) {
            login();
        }
    });
});

function login() {
    var username = $("#loginUsername").val();
    var password = $("#loginPassword").val();
    $("#loginBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
    $.ajax({
        url: base_url + "welcome/login",
        data: {'username': username, 'password': password},
        type: 'post',
        cache: false,
        success: function(data) {
            if (data === "Success") {
                window.location = base_url + 'main';
            } else {
                $("#loginMessage").addClass('alert').html("<i class='fa fa-times'></i> " + data);
            }
            $("#loginBtn").prop('disabled', false).html("Login");
        },
        error: function(xhr, status, error) {
            alert(error);
        }
    });
}