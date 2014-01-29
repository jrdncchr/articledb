$(document).ready(function() {
    activatePreview();
    activatePost();
});

function activatePost() {
    $("#gaPostCheck").click(function() {
        if($(this).is(":checked")) {
            $("#gaPostDiv").slideDown('fast');
        } else {
            $("#gaPostDiv").slideUp('fast');
        }
    });
    $("#gabpPostCheck").click(function() {
        if($(this).is(":checked")) {
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
                    document.getElementById('showPreview').click();
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
                    document.getElementById('showPreview').click();
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


