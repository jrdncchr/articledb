$(document).ready(function() {
    activateUpdate();
    activateDelete();
    activatePost();
    activateSpin();
});

function activateSpin() {
    $("#spinLink").click(function() {
        $("#actionBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
        $.ajax({
            url: base_url + "main/spin",
            data: {'text': $("#readTitle").html()},
            cache: false,
            type: 'post',
            dataType: 'json',
            success: function(data2) {
                if (data2.result === "OK") {
                    $("#gaGeneratedTitles").val(data2.output);
                    $.ajax({
                        url: base_url + "main/spin",
                        data: {'text': $("#readContent")},
                        cache: false,
                        type: 'post',
                        dataType: 'json',
                        success: function(data3) {
                            if (data3.result === "OK") {
                                alert(data3.result);
                                $("#actionBtn").prop('disabled', false).html("<i class='fa fa-rocket'></i> <strong>Actions</strong><span class='caret'></span>");
                            } else {
                                alert(data3.result);
                                $("#gaMessage").removeClass().addClass('alert alert-danger')
                                        .html("<i class='fa fa-exclamation-circle'></i> " + data2.result);
                                $("#actionBtn").prop('disabled', false).html("<i class='fa fa-rocket'></i> <strong>Actions</strong><span class='caret'></span>");
                            }
                        }
                    });
                } else {
                    alert(data2.result);
                    $("#gaMessage").removeClass().addClass('alert alert-danger')
                            .html("<i class='fa fa-exclamation-circle'></i> " + data2.result);
                    $("#actionBtn").prop('disabled', false).html("<i class='fa fa-rocket'></i> <strong>Actions</strong><span class='caret'></span>");
                }
            }
        });
    });
}

function activatePost() {
    $("select#postNoBlogs option").each(function() {
        this.selected = (this.text === '3');
    });
    $("#postAdmin").prop('checked', true);
    $("#postBtn").click(function() {
        $("#postBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
        var type = "";
        if ($("#postAdmin").is(":checked") && $("#postPublic").is(":checked")) {
            type = "both";
        } else if ($("#postAdmin").is(":checked") && !$("#postPublic").is(":checked")) {
            type = "admin";
        } else if (!$("#postAdmin").is(":checked") && $("#postPublic").is(":checked")) {
            type = "public";
        }
        if (type !== "") {
            $.ajax({
                url: base_url + "projects/post",
                data: {'title': $("#readTitle").html(), 'content': $("#readContent").val(),
                    'type': type, 'blogCount': $("#postNoBlogs").val()},
                cache: false,
                type: 'post',
                success: function(data) {
                    var urls = data.split(',');
                    var links = "";
                    for (var i = 0; i < urls.length; i++) {
                        links += "<p><a href='" + urls[i] + "' target='_blank'>" + urls[i] + "</a></p>";
                    }
                    $("#projectMessage").removeClass().addClass("alert alert-success")
                            .html("<i class='fa fa-check'></i> Posting to WordPress successful!" + links);
                    $("#postMessage").removeClass().addClass('alert alert-info')
                            .html("<i class='fa fa-info'></i> Post this project on a random WordPress blog.");
                    $("#postBtn").prop('disabled', false).html("Post");
                    $("#postModal").modal('hide');
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        } else {
            $("#postMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation'></i> Please select a type of blogs.");
        }

    });
}

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