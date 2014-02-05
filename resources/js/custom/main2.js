$(document).ready(function() {
    activatePreview();
    activatePost();
    activateAddBlog();
});

function activateAddBlog() {
    $("#abSubmitBtn").click(function() {
        $.ajax({
            url: base_url + "main/addBlog",
            data: {'url': $("#abUrl").val(), 'username': $("#abUsername").val(), 'password': $("#abPassword").val()},
            cache: false,
            type: 'post',
            success: function(data) {
                if (data === "OK") {
                    $("#mainMessage").removeClass().addClass("alert alert-success")
                            .html("<i class='fa fa-check'></i> Your blog is submitted and will be verfied in a while.");
                    $("#addBlogModal").modal('hide');
                    toastr.success('Submitting Public Blog Successful!');
                } else {
                    alert(data);
                }
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });
    });
}

function activatePost() {
    $("#gaPostCheck").click(function() {
        if ($(this).is(":checked")) {
            $("#gaPostDiv").slideDown('fast');
        } else {
            $("#gaPostDiv").slideUp('fast');
        }
    });
    $("#gabpPostCheck").click(function() {
        if ($(this).is(":checked")) {
            $("#gabpPostDiv").slideDown('fast');
        } else {
            $("#gabpPostDiv").slideUp('fast');
        }
    });
}

function activatePreview() {
    $("#gaPreviewBtn").click(function() {
        $.ajax({
            url: base_url + "projects/preview",
            data: {'text': $("#gaGeneratedTitles").val() + "\n\n" + $("#gaGeneratedContents").val()},
            cache: false,
            type: 'post',
            success: function(data) {
                if (data === "OK") {
                } else {
                    alert(data);
                }
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });

    });
    $("#gabpPreviewBtn").click(function() {
        $.ajax({
            url: base_url + "projects/preview",
            data: {'text': $("#gabpGeneratedTitles").val() + "\n\n" + $("#gabpGeneratedContents").val()},
            cache: false,
            type: 'post',
            success: function(data) {
                if (data === "OK") {
                } else {
                    alert(data);
                }
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });

    });
    $("#gtTitlePreview").click(function() {
        $.ajax({
            url: base_url + "projects/preview",
            data: {'text': $("#gtGeneratedTitles").val()},
            cache: false,
            type: 'post',
            success: function(data) {
                if (data === "OK") {
                } else {
                    alert(data);
                }
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });
    });
}


