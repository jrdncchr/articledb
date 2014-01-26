$(document).ready(function() {
    activatePreview();
    activatePost();
});

function activatePost() {
    $("#gaPostBtn").click(function() {
        $("#gaPostBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
        if (!$("#gaAdmin").is(":checked") && !$("#gaPublic").is(":checked")) {
            $("#gaPostMessage").removeClass().addClass("alert alert-danger")
                    .html("<i class='fa fa-exclamation-circle'></i> Please select atleast 1 blog type.");
        } else {
            var type = "";
            if ($("#gaAdmin").is(":checked") && $("#gaPublic").is(":checked")) {
                type = "both";
            } else if ($("#gaAdmin").is(":checked") && !$("#gaPublic").is(":checked")) {
                type = "admin";
            } else if (!$("#gaAdmin").is(":checked") && $("#gaPublic").is(":checked")) {
                type = "public";
            }
            $.ajax({
                url: base_url + "projects/post",
                data: {'title': $("#gaGeneratedTitles").val(), 'content': $("#gaGeneratedContents").val(),
                    'type': type, 'blogCount': $("#gaNoBlogs").val()},
                cache: false,
                type: 'post',
                success: function(data) {
                    //get the ids
                    var string = data;
                    var links = "";
                    for (var i = 0; i < parseInt($("#gaNoBlogs").val()); i++) {
                        var startTag = string.indexOf("<string>") + 8;
                        var endTag = string.indexOf("</string>");
                        var id = string.slice(startTag, endTag);
                        startTag = string.indexOf("<url>") + 5;
                        endTag = string.indexOf("</url>");
                        var url = string.slice(startTag, endTag);
                        string = string.substr(endTag + 8, string.length);
                        links += "<p><a href='" + url + "?p=" + id + "' target='_blank'>" + url + "?p=" + id + "</></p>";
                    }
                     $("#gaPostMessage").removeClass().addClass("alert alert-success")
                             .html("<i class='fa fa-check'></i> Posting to WordPress successful!" + links);
                     $("#gaPostBtn").prop('disabled', false).html("Post");
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
    
    $("#gabpPostBtn").click(function() {
        $("#gabpPostBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
        if (!$("#gabpAdmin").is(":checked") && !$("#gabpPublic").is(":checked")) {
            $("#gabpPostMessage").removeClass().addClass("alert alert-danger")
                    .html("<i class='fa fa-exclamation-circle'></i> Please select atleast 1 blog type.");
        } else {
            var type = "";
            if ($("#gabpAdmin").is(":checked") && $("#gabpPublic").is(":checked")) {
                type = "both";
            } else if ($("#gabpAdmin").is(":checked") && !$("#gabpPublic").is(":checked")) {
                type = "admin";
            } else if (!$("#gabpAdmin").is(":checked") && $("#gabpPublic").is(":checked")) {
                type = "public";
            }
            $.ajax({
                url: base_url + "projects/post",
                data: {'title': $("#gabpGeneratedTitles").val(), 'content': $("#gabpGeneratedContents").val(),
                    'type': type, 'blogCount': $("#gabpNoBlogs").val()},
                cache: false,
                type: 'post',
                success: function(data) {
                    //get the ids
                    var string = data;
                    var links = "";
                    for (var i = 0; i < parseInt($("#gabpNoBlogs").val()); i++) {
                        var startTag = string.indexOf("<string>") + 8;
                        var endTag = string.indexOf("</string>");
                        var id = string.slice(startTag, endTag);
                        startTag = string.indexOf("<url>") + 5;
                        endTag = string.indexOf("</url>");
                        var url = string.slice(startTag, endTag);
                        string = string.substr(endTag + 8, string.length);
                        links += "<p><a href='" + url + "?p=" + id + "' target='_blank'>" + url + "?p=" + id + "</></p>";
                    }
                     $("#gabpPostMessage").removeClass().addClass("alert alert-success")
                             .html("<i class='fa fa-check'></i> Posting to WordPress successful!" + links);
                     $("#gabpPostBtn").prop('disabled', false).html("Post");
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
}

function activatePreview() {
    $("#gaTitlePreview").click(function() {
        $.ajax({
            url: base_url + "projects/preview",
            data: {'text': $("#gaGeneratedTitles").val()},
            cache: false,
            type: 'post',
            success: function(data) {
                if (data === "OK") {
                    PopupCenter(base_url + "projects/showPreview", "Preview", 500, 300);
                } else {
                    alert(data);
                }
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });

    });
    $("#gaContentPreview").click(function() {
        $.ajax({
            url: base_url + "projects/preview",
            data: {'text': $("#gaGeneratedContents").val()},
            cache: false,
            type: 'post',
            success: function(data) {
                if (data === "OK") {
                    PopupCenter(base_url + "projects/showPreview", "Preview", 500, 300);
                } else {
                    alert(data);
                }
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });
    });
    $("#gabpTitlePreview").click(function() {
        $.ajax({
            url: base_url + "projects/preview",
            data: {'text': $("#gabpGeneratedTitles").val()},
            cache: false,
            type: 'post',
            success: function(data) {
                if (data === "OK") {
                    PopupCenter(base_url + "projects/showPreview", "Preview", 500, 300);
                } else {
                    alert(data);
                }
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });

    });
    $("#gabpContentPreview").click(function() {
        $.ajax({
            url: base_url + "projects/preview",
            data: {'text': $("#gabpGeneratedContents").val()},
            cache: false,
            type: 'post',
            success: function(data) {
                if (data === "OK") {
                    PopupCenter(base_url + "projects/showPreview", "Preview", 500, 300);
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
                    PopupCenter(base_url + "projects/showPreview", "Preview", 500, 300);
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

function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
}

