$(document).ready(function() {
    activatePreview();
    activatePost();
    activateAddBlog();
    activatePostAction();
    activateSpinAction();
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

function activateSpinAction() {
    $("#spinLink").click(function() {
        refresh();
        $("#smHeadTitle").html("<i class='fa fa-spinner'></i> Spin using TBS");
        $("#spinLinkBtn").fadeIn('fast');
        $("#nonSpinLinkBtn").fadeOut('fast');
        $('#spinModal').modal('show');
    });

    $("#nonSpinLink").click(function() {
        refresh();
        $("#smHeadTitle").html("<i class='fa fa-spinner'></i> Non Spin");
        $("#spinLinkBtn").fadeOut('fast');
        $("#nonSpinLinkBtn").fadeIn('fast');
        $('#spinModal').modal('show');
    });

    function refresh() {
        $("#smTitles").val("");
        $("#smContents").val("");
        $("#smMessage").removeClass().addClass('alert-success').html("");
    }

    $("#nonSpinLinkBtn").click(function() {
        $("#nonSpinLinkBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
        $.ajax({
            url: base_url + "projects/nonSpin",
            data: {'text': $("#smTitles").val()},
            cache: false,
            type: 'post',
            success: function(data2) {
                $("#smTitles").val(data2);
                $.ajax({
                    url: base_url + "projects/nonSpin",
                    data: {'text': $("#smContents").val()},
                    cache: false,
                    type: 'post',
                    success: function(data3) {
                        $("#smContents").val(data3);
                        toastr.success('Non Spin Successful!');
                        $("#nonSpinLinkBtn").prop('disabled', false).html("Spin using TBS");
                        $("#smMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Non Spin Successful!");
                    }
                });
            }
        });

    });

    $("#spinLinkBtn").click(function() {
        $("#spinLinkBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
        $.ajax({
            url: base_url + "main/spin",
            data: {'text': $("#smTitles").val()},
            cache: false,
            type: 'post',
            dataType: 'json',
            success: function(data2) {
                if (data2.result === "OK") {
                    $("#smTitles").val(data2.output);
                    $.ajax({
                        url: base_url + "main/spin",
                        data: {'text': $("#smContents").val()},
                        cache: false,
                        type: 'post',
                        dataType: 'json',
                        success: function(data3) {
                            if (data3.result === "OK") {
                                toastr.success('Spinning Successful!');
                                $("#smMessage").removeClass().addClass('alert alert-success')
                                        .html("<i class='fa fa-check'></i> Spinning Successful!");
                                $("#smContents").val(data3.output);
                                $("#spinLinkBtn").prop('disabled', false).html("Spin using TBS");
                            } else {
                                $("#smMessage").removeClass().addClass('alert alert-danger')
                                        .html("<i class='fa fa-exclamation-circle'></i> " + data3.result);
                                $("#spinLinkBtn").prop('disabled', false).html("Spin using TBS");
                            }
                        }
                    });
                } else {
                    $("#smMessage").removeClass().addClass('alert alert-danger')
                            .html("<i class='fa fa-exclamation-circle'></i> " + data2.result);
                    $("#spinLinkBtn").prop('disabled', false).html("Spin using TBS");
                }
            }
        });

    });
}

function activatePostAction() {
    $("select#pmNoBlogs option").each(function() {
        this.selected = (this.text === '3');
    });
    $("#pmAdmin").prop('checked', true);

    $("#pmPostBtn").click(function() {
        $("#pmPostBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
        var type = "";
        if ($("#pmAdmin").is(":checked") && $("#pmPublic").is(":checked")) {
            type = "both";
        } else if ($("#pmAdmin").is(":checked") && !$("#pmPublic").is(":checked")) {
            type = "admin";
        } else if (!$("#pmAdmin").is(":checked") && $("#pmPublic").is(":checked")) {
            type = "public";
        }
        if (type !== "") {
            $.ajax({
                url: base_url + "projects/post",
                data: {'title': $("#pmTitles").val(), 'content': $("#pmContents").val(),
                    'type': type, 'blogCount': $("#pmNoBlogs").val()},
                cache: false,
                type: 'post',
                success: function(data) {
                    var urls = data.split(',');
                    var links = "";
                    for (var i = 0; i < urls.length; i++) {
                        links += "<p><a href='" + urls[i] + "' target='_blank'>" + urls[i] + "</a></p>";
                    }
                    toastr.success('Posting to WordPress Blogs Successful!');
                    $("#mainMessage").removeClass().addClass("alert alert-success")
                            .html("<i class='fa fa-check'></i> Posting to WordPress successful!" + links);
                    $("#pmMessage").removeClass().addClass('alert alert-info')
                            .html("<i class='fa fa-info'></i> Post this project on a random WordPress blog.");
                    $("#pmPostBtn").prop('disabled', false).html("Post");
                    $("#postModal").modal('hide');
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        } else {
            $("#pmMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation'></i> Please select a type of blogs.");
        }

    });

    $("#pmSaveBtn").click(function() {
        if (($("#pmTitles").val().length < 5) || ($("#pmContents").val().length < 15)) {
            $("#pmMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Title/Content Character length in not enough.");
        } else {
            if ($("#pmName").val().length < 4) {
                $("#pmMessage").removeClass().addClass('alert alert-danger')
                        .html("<i class='fa fa-exclamation-circle'></i> Project name is required. Characters should be atleast 4 characters.");
            } else {
                $("#pmSaveBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
                $.ajax({
                    url: base_url + "projects/add",
                    data: {'name': $("#pmName").val(), 'title': $("#pmTitles").val(), 'content': $("#pmContents").val(),
                        'category': 'Uncategorized'},
                    cache: false,
                    type: 'post',
                    success: function(data) {
                        var oTable = $('#projects').dataTable();
                        oTable.fnReloadAjax();
                        toastr.success('Saving Project Successful!');
                        $("#pmMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Saving Project Successful!");
                        $("#pmSaveBtn").prop('disabled', false).html("Save to Project");
                    }
                });
            }
        }

    });
}



