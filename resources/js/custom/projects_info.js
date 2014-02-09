$(document).ready(function() {
    activateUpdate();
    activateDelete();
});

function activateUpdate() {
    $("#showUpdateBtn").click(function() {
        $("#title").val($("#readTitle").html());
        $("#acontent").val($("#readContent").val());
    });

    $("#updateBtn").click(function() {
        if (validateInput() === true) {
            $.ajax({
                url: base_url + 'projects/update',
                data: {'title': $("#title").val(), 'content': $("#acontent").val()},
                dataType: 'json',
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data.result === "OK") {
                        $("#readTitle").html(data.title);
                        $("#readContent").val(data.content);
                        $("#updateModal").modal('hide');
                        autoHeightContent();
                        clearData();
                        toastr.success('Updating Project Successful!');
                    } else {
                        alert(data.result);
                    }
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    });

    function clearData() {
        $("#title").val("");
        $("#content").val("");
        $("#message").removeClass('alert').html("");
    }

    function validateInput() {
        var title = $("#title").val();
        var content = $("#acontent").val();

        if (title.length < 3) {
            $("#message").addClass('alert').html("<i class='fa fa-exclamation-circle'></i> Title must be atleast 3 characters.");
            return false;
        }
        if (content.length < 30) {
            $("#message").addClass('alert').html("<i class='fa fa-exclamation-circle'></i> Content must be atleast 30 characters.");
            return false;
        }
        return true;
    }
}

function activateDelete() {
    $("#deleteBtn").click(function() {
        var confirmDelete = confirm("Are you sure to delete this project?");
        if (confirmDelete === true) {
            $.ajax({
                url: base_url + 'projects/delete',
                success: function(data) {
                    if (data === "OK") {
                        window.location = base_url + 'main';
                    }
                }
            });
        }
    });
}