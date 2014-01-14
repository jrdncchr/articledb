$(document).ready(function() {
    activateEvents();
});

function activateEvents() {
    $("#saveBtn").click(function() {
        if (validateInfo() === true) {
            $.ajax({
                url: base_url + 'main/updateProfile',
                data: {'name': $("#name").val(), 'email': $('#email').val()},
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data === "OK") {
                        toastr.success('Updating Profile Successful!');
                        $("#infoMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Updating Profile Successful!");
                    }
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    });

    $("#changePasswordBtn").click(function() {
        if (validatePassword() === true) {
            $.ajax({
                url: base_url + 'main/changePassword',
                data: {'old': $("#oldPassword").val(), 'new': $("#newPassword").val()},
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data === "OK") {
                        clearPasswords();
                        toastr.success('Changing Password Successful!');
                        $("#changePasswordMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Changing Password Successful!");
                    } else {
                        toastr.error('Changing Password Failed!');
                        $("#changePasswordMessage").removeClass().addClass('alert alert-danger')
                                .html("<i class='fa fa-exclamation-circle'></i> Old password is incorrect.");
                    }
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
}

function validateInfo() {
    var name = $("#name").val();
    var email = $("#email").val();

    if (name.length < 5) {
        $("#infoMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> Name should be atleast 5 characters.");
        return false;
    }
    if (!isValidEmailAddress(email)) {
        $("#infoMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> Email is not a valid email address.");
        return false;
    }
    $("#infoMessage").removeClass('alert').html("");
    return true;
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

function validatePassword() {
    var newPassword = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    if (newPassword.length < 6) {
        $("#changePasswordMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> New password must be atleast 5 characters.");
        return false;
    }
    if (newPassword !== confirmPassword) {
        $("#changePasswordMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> Password confirmation did not match.");
        return false;
    }
    return true;
}

function clearPasswords() {
    $("#oldPassword").val("");
    $("#newPassword").val("");
    $("#confirmPassword").val("");
}