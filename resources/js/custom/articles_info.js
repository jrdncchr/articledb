$(document).ready(function() {
    autoHeightContent();
    activateUpdate();
    activateDelete();
});

function autoHeightContent() {
    $('#readContent').on('keyup', function(e) {
        $(this).css('height', 'auto');
        $(this).height(this.scrollHeight);
    });
    $('#readContent').keyup();

    $("#readContent").keydown(function(e) {
        e.preventDefault();
    });
}

function activateUpdate() {
    $("#showUpdateBtn").click(function() {
        $("#title").val($("#readTitle").html());
        $("#category").val($("#readCategory").html());
        $("#acontent").val($("#readContent").val());
    });

    $("#updateBtn").click(function() {
        if (validateInput() === true) {
            $.ajax({
                url: base_url + 'articles/update',
                data: {'title': $("#title").val(), 'category': $("#category").val(),
                    'content': $("#acontent").val()},
                dataType: 'json',
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data.result === "OK") {
                        $("#readTitle").html(data.title);
                        $("#readCategory").html(data.category);
                        $("#readContent").val(data.content);
                        $("#updateModal").modal('hide');
                        autoHeightContent();
                        clearData();
                        toastr.success('Updating Article Successful!');
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
        $("#category").val("");
        $("#content").val("");
        $("#message").removeClass('alert').html("");
    }

    function validateInput() {
        var title = $("#title").val();
        var category = $("#category").val();
        var content = $("#acontent").val();

        if (title.length < 2) {
            $("#message").addClass('alert').html("<i class='fa fa-exclamation-circle'></i> Title must be atleast 3 characters.");
            return false;
        }
        if (category === "") {
            $("#message").addClass('alert').html("<i class='fa fa-exclamation-circle'></i> Please choose a category.");
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
        var confirmDelete = confirm("Are you sure to delete this article?");
        if (confirmDelete === true) {
            $.ajax({
                url: base_url + 'articles/delete',
                success: function(data) {
                    if (data === "OK") {
                        window.location = base_url + 'main';
                    }
                }
            });
        }
    });
}