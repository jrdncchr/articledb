$(document).ready(function() {
    activateTables();
    activateAddArticle();
    activateGenerateTitle();
    activateGenerateArticles();
    activateGenerateArticlesByProject();
});


function activateTables() {
    $('#articles').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "articles/get",
        "aoColumnDefs": [
            {
                "aTargets": [1], // Column to target
                "mRender": function(data, type, full) {
                    return '<a href="' + base_url + 'articles/info/' + full[0] + '">' + full[1] + '</a>';
                }
            }
        ],
        "oLanguage": {
            "sEmptyTable": "You don't have any articles."
        }
    });
    $('#projects').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "projects/get",
        "aoColumnDefs": [
            {
                "aTargets": [1], // Column to target
                "mRender": function(data, type, full) {
                    return '<a href="' + base_url + 'projects/info/' + full[0] + '">' + full[1] + '</a>';
                }
            }
        ],
        "oLanguage": {
            "sEmptyTable": "You don't have any projects yet."
        }
    });
}

function activateGenerateArticlesByProject() {
    $("#showGABPForm").click(function() {
        $.ajax({
            url: base_url + 'projects/getProjectCategories',
            cache: false,
            success: function(data) {
                $("#gabpCategory").html(data);
            }
        });
    });
    $("#gabpCategory").change(function() {
        if ($("#gabpCategory").val() !== "") {
            checkCategory();
        } else {
            if ($("#gabpKeyword").val().length > 3) {
                checkKeyword();
            }
            $("#gabpMessage").removeClass().addClass('alert alert-info')
                    .html("<i class='fa fa-info'></i> Keyword and Category can't have a value at the same time.");
        }
    });
    function checkCategory() {
        $.ajax({
            url: base_url + 'projects/getProjectCountByCategory',
            cache: false,
            type: 'post',
            data: {'category': $("#gabpCategory").val()},
            success: function(data) {
                if (data > 0 && data < 15) {
                    var options;
                    for (var i = 1; i <= data; i++) {
                        options += "<option value='" + i + "'>" + i + "</option>";
                    }
                    $("#gabpNoArticlesToMix").html(options);
                } else {
                    var options;
                    for (var i = 1; i <= 15; i++) {
                        options += "<option value='" + i + "'>" + i + "</option>";
                    }
                    $("#gabpNoArticlesToMix").html(options);
                }
                $("#gabpMessage").removeClass().addClass('alert alert-success')
                        .html("<i class='fa fa-smile-o'></i> There are " + data + " projects in that category.");
            }
        });
    }
    $("#gabpKeyword").keyup(function(e) {
        if (e.which !== 13) {
            if ($("#gabpKeyword").val().length > 3) {
                checkKeyword();
            } else {
                $("#gabpMessage").removeClass().addClass('alert alert-info')
                        .html("<i class='fa fa-info'></i> Keyword and Category can't have a value at the same time.");
                $("#gabpNoArticlesToMix").html("");
                if ($("#gabpKeyword").val().length === 0) {
                    checkCategory();
                }
            }
        }

    });
    function checkKeyword() {
        $.ajax({
            url: base_url + 'projects/countProjectsByKeyword',
            data: {'keyword': $("#gabpKeyword").val()},
            cache: false,
            type: 'post',
            success: function(data) {
                if (data > 0) {
                    var options = "";
                    if (data < 15) {
                        for (var i = 1; i <= data; i++) {
                            options += "<option value='" + i + "'>" + i + "</option>";
                        }
                        $("#gabpNoArticlesToMix").html(options);
                    } else {
                        for (var i = 1; i <= 15; i++) {
                            options += "<option value='" + i + "'>" + i + "</option>";
                        }
                        $("#gabpNoArticlesToMix").html(options);
                    }
                    $("#gabpMessage").removeClass().addClass('alert alert-success')
                            .html("<i class='fa fa-smile-o'></i> There are " + data + " projects found containing the keyword.");
                } else {
                    $("#gabpMessage").removeClass().addClass('alert alert-danger')
                            .html("<i class='fa fa-frown-o'></i> Sorry! You don't have any project containing that keyword.");
                    $("#gabpNoArticlesToMix").html("");
                }
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });
    }
    $("#gabpRefreshBtn").click(function() {
        refresh();
    });
    function refresh() {
        $("#gabpMessage").removeClass().addClass('alert alert-info')
                .html("<i class='fa fa-info'></i> Keyword and Category can't have a value at the same time.");
        $("#gabpArticleForm").slideDown('slow');
        $("#gabpArticleFormOutput").slideUp('slow');
        $("#gabpSaveBtn").hide();
        $("#gabpGenerateBtn").show();
    }
    $("#gabpGenerateBtn").click(function() {
        if (validateGenerateArticlesByProject() === true) {
            $.ajax({
                url: base_url + 'main/generateArticlesByProject',
                data: {'keyword': $("#gabpKeyword").val(), 'category': $("#gabpCategory").val(), 'noTitles': $("#gabpNoTitles").val(),
                    'noArticlesToMix': $("#gabpNoArticlesToMix").val(), 'pMin': $("#gabpPMin").val(), 'pMax': $("#gabpPMax").val(),
                    sMin: $("#gabpSPMin").val(), sMax: $("#gabpSPMax").val()},
                cache: false,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    $("#gabpArticleForm").slideUp('fast');
                    $("#gabpArticleFormOutput").slideDown('slow');
                    $("#gabpGenerateBtn").hide();
                    $("#gabpSaveBtn").show();
                    $("#gabpMessage").removeClass().addClass('alert alert-success')
                            .html("<i class='fa fa-check'></i> Generating Project Successful!.");
                    $("#gabpGeneratedTitles").val(data.titles);
                    gabpTitleAutoHeightContent();
                    $("#gabpGeneratedContents").val(data.article);
                    $("#gabpCharCount").html("Characters Count: " + $("#gabpGeneratedContents").val().length);
                },
                error: function(xhr, status, error) {
                    $("#gabpMessage").removeClass().addClass('alert alert-danger')
                            .html("<i class='fa fa-exclamation-circle'></i> Mixing projects failed, please try again.");
                }
            });
        }
    });
    $("#gabpSaveBtn").click(function() {
        if (($("#gabpGeneratedTitles").val().length < 5) || ($("#gabpGeneratedContents").val().length < 15)) {
            $("#gabpMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Title/Content Character length in not enough.");
        } else {
            if ($("#gabpName").val().length < 4) {
                $("#gabpMessage").removeClass().addClass('alert alert-danger')
                        .html("<i class='fa fa-exclamation-circle'></i> Project name is required. Characters should be atleast 4 characters.");
            } else {
                $.ajax({
                    url: base_url + 'projects/add',
                    data: {'title': $("#gabpGeneratedTitles").val(), 'content': $("#gabpGeneratedContents").val(),
                        'category': $("#gabpCategory").val(), 'name': $("#gabpName").val()},
                    cache: false,
                    type: 'post',
                    success: function(data) {
                        if (data === "OK") {
                            refresh();
                            $("#genABPModal").modal('hide');
                            var oTable = $('#projects').dataTable();
                            oTable.fnReloadAjax();
                            toastr.success('Saving Project Successful!');
                        } else {
                            alert(data);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert(error);
                    }
                });
            }
        }
    });
    $("#gabpSpinTitle").click(function() {
        if ($("#gabpGeneratedTitles").val().length < 8) {
            $("#gabpMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Generated title must be atleast 8 characters.");
        } else {
            $("#gabpSpinBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
            $("#gabpSaveBtn").prop('disabled', true);
            $("#gabpRefreshBtn").prop('disabled', true);
            $("#gabpMessage").removeClass().addClass('alert alert-warning')
                    .html("<i class='fa fa-anchor'></i> Spinning, please wait...");
            $.ajax({
                url: base_url + "main/spin",
                data: {'text': $("#gabpGeneratedTitles").val()},
                cache: false,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data.result === "OK") {
                        $("#gabpMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Spinning Titles Successful!");
                        $("#gabpGeneratedTitles").val(data.output);
                        gabpTitleAutoHeightContent();
                    } else {
                        $("#gabpMessage").removeClass().addClass('alert alert-danger')
                                .html("<i class='fa fa-exclamation-circle'></i> " + data.result);
                    }
                    $("#gabpSpinBtn").prop('disabled', false).html("<i class='fa fa-spinner'></i> Spin <span class='caret'></span>");
                    $("#gabpSaveBtn").prop('disabled', false);
                    $("#gabpRefreshBtn").prop('disabled', false);
                }
            });
        }
    });
    $("#gabpSpinContent").click(function() {
        if ($("#gabpGeneratedContents").val().length < 8) {
            $("#gabpMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Generated title must be atleast 8 characters.");
        } else if ($("#gabpGeneratedContents").val().length > 5000) {
            $("#gabpMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> You cannot spin text with more than 5000 characters.");
        } else {
            $("#gabpSpinBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
            $("#gabpSaveBtn").prop('disabled', true);
            $("#gabpRefreshBtn").prop('disabled', true);
            $("#gabpMessage").removeClass().addClass('alert alert-warning')
                    .html("<i class='fa fa-anchor'></i> Spinning, please wait...");
            $.ajax({
                url: base_url + "main/spin",
                data: {'text': $("#gabpGeneratedContents").val()},
                cache: false,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data.result === "OK") {
                        $("#gabpMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Spinning Contents Successful!");
                        $("#gabpGeneratedContents").val(data.output);
                    } else {
                        $("#gabpMessage").removeClass().addClass('alert alert-danger')
                                .html("<i class='fa fa-exclamation-circle'></i> " + data.result);
                    }
                    $("#gabpCharCount").html("Characters Count: " + $("#gabpGeneratedContents").val().length);
                    $("#gabpSpinBtn").prop('disabled', false).html("<i class='fa fa-spinner'></i> Spin <span class='caret'></span>");
                    $("#gabpSaveBtn").prop('disabled', false);
                    $("#gabpRefreshBtn").prop('disabled', false);
                }
            });
        }
    });
    $("#gabpGeneratedContents").keyup(function() {
        $("#gabpCharCount").html("Characters Count: " + $("#gabpGeneratedContents").val().length);
    });
}

function activateGenerateArticles() {
    $("#gaGenerateBtn").click(function() {
        if (validateGenerateArticles() === true) {
            $.ajax({
                url: base_url + 'main/generateArticles',
                data: {'keyword': $("#gaKeyword").val(), 'category': $("#gaCategory").val(), 'noTitles': $("#gaNoTitles").val(),
                    'noArticlesToMix': $("#gaNoArticlesToMix").val(), 'pMin': $("#gaPMin").val(), 'pMax': $("#gaPMax").val(),
                    sMin: $("#gaSPMin").val(), sMax: $("#gaSPMax").val()},
                cache: false,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    $("#genArticleForm").slideUp('fast');
                    $("#genArticleFormOutput").slideDown('slow');
                    $("#gaGenerateBtn").hide();
                    $("#gaSaveBtn").show();
                    $("#gaMessage").removeClass().addClass('alert alert-success')
                            .html("<i class='fa fa-check'></i> Generating Article Successful!.");
                    $("#gaGeneratedTitles").val(data.titles);
                    gaTitleAutoHeightContent();
                    $("#gaGeneratedContents").val(data.article);
                    $("#gaCharCount").html("Characters Count: " + $("#gaGeneratedContents").val().length);
                },
                error: function(xhr, status, error) {
                    $("#gaMessage").removeClass().addClass('alert alert-danger')
                            .html("<i class='fa fa-exclamation-circle'></i> Mixing articles failed, please try again.");
                }
            });
        }
    });
    $("#gaRefreshBtn").click(function() {
        refresh();
    });
    function refresh() {
        $("#gaMessage").removeClass().addClass('alert alert-info')
                .html("<i class='fa fa-info'></i> Keyword and Category can't have a value at the same time.");
        $("#genArticleForm").slideDown('slow');
        $("#genArticleFormOutput").slideUp('slow');
        $("#gaSaveBtn").hide();
        $("#gaGenerateBtn").show();
    }

    $("#gaSaveBtn").click(function() {
        if (($("#gaGeneratedTitles").val().length < 5) || ($("#gaGeneratedContents").val().length < 15)) {
            $("#gaMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Title/Content Character length in not enough.");
        } else {
            if ($("#gaName").val().length < 4) {
                $("#gaMessage").removeClass().addClass('alert alert-danger')
                        .html("<i class='fa fa-exclamation-circle'></i> Project name is required. Characters should be atleast 4 characters.");
            } else {
                $.ajax({
                    url: base_url + 'projects/add',
                    data: {'title': $("#gaGeneratedTitles").val(), 'content': $("#gaGeneratedContents").val(),
                        'category': $("#gaCategory").val(), 'name': $("#gaName").val()},
                    cache: false,
                    type: 'post',
                    success: function(data) {
                        if (data === "OK") {
                            refresh();
                            $("#genArticleModal").modal('hide');
                            var oTable = $('#projects').dataTable();
                            oTable.fnReloadAjax();
                            toastr.success('Saving Project Successful!');
                        } else {
                            alert(data);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert(error);
                    }
                });
            }
        }
    });
    $("#gaKeyword").keyup(function(e) {
        if (e.which !== 13) {
            if ($("#gaKeyword").val().length > 3) {
                $.ajax({
                    url: base_url + 'main/countArticlesByKeyword',
                    data: {'keyword': $("#gaKeyword").val()},
                    cache: false,
                    type: 'post',
                    success: function(data) {
                        if (data > 0) {
                            var options = "";
                            if (data < 15) {
                                for (var i = 1; i <= data; i++) {
                                    options += "<option value='" + i + "'>" + i + "</option>";
                                }
                                $("#gaNoArticlesToMix").html(options);
                            }
                            $("#gaMessage").removeClass().addClass('alert alert-success')
                                    .html("<i class='fa fa-smile-o'></i> There are " + data + " articles found containing the keyword.");
                        } else {
                            $("#gaMessage").removeClass().addClass('alert alert-danger')
                                    .html("<i class='fa fa-frown-o'></i> Sorry! There are no articles yet containing the keyword.");
                            $("#gaNoArticlesToMix").html("");
                        }
                    },
                    error: function(xhr, status, error) {
                        alert(error);
                    }
                });
            } else {
                $("#gaMessage").removeClass().addClass('alert alert-info')
                        .html("<i class='fa fa-info'></i> Keyword and Category can't have a value at the same time.");
                var options = "";
                for (var i = 1; i <= 15; i++) {
                    options += "<option value='" + i + "'>" + i + "</option>";
                }
                $("#gaNoArticlesToMix").html(options);
            }
        }
    });
    $("#gaSpinTitle").click(function() {
        if ($("#gaGeneratedTitles").val().length < 8) {
            $("#gaMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Generated title must be atleast 8 characters.");
        } else {
            $("#gaSpinBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
            $("#gaSaveBtn").prop('disabled', true);
            $("#gaRefreshBtn").prop('disabled', true);
            $("#gaMessage").removeClass().addClass('alert alert-warning')
                    .html("<i class='fa fa-anchor'></i> Spinning, please wait...");
            $.ajax({
                url: base_url + "main/spin",
                data: {'text': $("#gaGeneratedTitles").val()},
                cache: false,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data.result === "OK") {
                        $("#gaMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Spinning Titles Successful!");
                        $("#gaGeneratedTitles").val(data.output);
                        gaTitleAutoHeightContent();
                    } else {
                        $("#gaMessage").removeClass().addClass('alert alert-danger')
                                .html("<i class='fa fa-exclamation-circle'></i> " + data.result);
                    }
                    $("#gaSpinBtn").prop('disabled', false).html("<i class='fa fa-spinner'></i> Spin <span class='caret'></span>");
                    $("#gaSaveBtn").prop('disabled', false);
                    $("#gaRefreshBtn").prop('disabled', false);
                }
            });
        }
    });
    $("#gaSpinContent").click(function() {
        if ($("#gaGeneratedContents").val().length < 8) {
            $("#gaMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Generated title must be atleast 8 characters.");
        } else if ($("#gaGeneratedContents").val().length > 5000) {
            $("#gaMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> You cannot spin text with more than 5000 characters.");
        } else {
            $("#gaSpinBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
            $("#gaSaveBtn").prop('disabled', true);
            $("#gaRefreshBtn").prop('disabled', true);
            $("#gaMessage").removeClass().addClass('alert alert-warning')
                    .html("<i class='fa fa-anchor'></i> Spinning, please wait...");
            $.ajax({
                url: base_url + "main/spin",
                data: {'text': $("#gaGeneratedContents").val()},
                cache: false,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data.result === "OK") {
                        $("#gaMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Spinning Contents Successful!");
                        $("#gaGeneratedContents").val(data.output);
                    } else {
                        $("#gaMessage").removeClass().addClass('alert alert-danger')
                                .html("<i class='fa fa-exclamation-circle'></i> " + data.result);
                    }
                    $("#gaCharCount").html("Characters Count: " + $("#gaGeneratedContents").val().length);
                    $("#gaSpinBtn").prop('disabled', false).html("<i class='fa fa-spinner'></i> Spin <span class='caret'></span>");
                    $("#gaSaveBtn").prop('disabled', false);
                    $("#gaRefreshBtn").prop('disabled', false);
                }
            });
        }
    });
    $("#gaGeneratedContents").keyup(function() {
        $("#gaCharCount").html("Characters Count: " + $("#gaGeneratedContents").val().length);
    });

}

function validateGenerateArticles() {
    var keyword = $("#gaKeyword").val();
    var category = $("#gaCategory").val();

    if (keyword === "" && category === "") {
        $("#gaMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> Keyword and Category cannot be both empty.");
        return false;
    }
    if (keyword !== "" && category !== "") {
        $("#gaMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> Keyword and Category can't have value at the same time.");
        return false;
    }
    if (keyword !== "") {
        if (keyword.length > 0 && keyword.length < 4) {
            $("#gaMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Keyword must be atleast 4 characters.");
            return false;
        }
    }
    if ((parseInt($("#gaPMin").val()) > parseInt($("#gaPMax").val())) || (parseInt($("#gaSPMin").val()) > parseInt($("#gaSPMax").val()))) {
        $("#gaMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> Minimum value cannot be greater than Maximum value.");
        return false;
    }

    return true;
}

function validateGenerateArticlesByProject() {
    var keyword = $("#gabpKeyword").val();
    var category = $("#gabpCategory").val();

    if (keyword === "" && category === "") {
        $("#gabpMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> Keyword and Category cannot be both empty.");
        return false;
    }
    if (keyword !== "" && category !== "") {
        $("#gabpMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> Keyword and Category can't have value at the same time.");
        return false;
    }
    if (keyword !== "") {
        if (keyword.length > 0 && keyword.length < 4) {
            $("#gabpMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Keyword must be atleast 4 characters.");
            return false;
        }
    }
    if ((parseInt($("#gabpPMin").val()) > parseInt($("#gabpPMax").val())) || (parseInt($("#gabpSPMin").val()) > parseInt($("#gabpSPMax").val()))) {
        $("#gabpMessage").removeClass().addClass('alert alert-danger')
                .html("<i class='fa fa-exclamation-circle'></i> Minimum value cannot be greater than Maximum value.");
        return false;
    }
    return true;
}

function activateGenerateTitle() {
    $("#gtBtn").click(function() {
        var keyword = $("#gtKeyword").val();
        var category = $("#gtCategory").val();
        var noTitles = $("#gtNoTitles").val();

        if (keyword === "" && category === "") {
            $("#gtMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Keyword and Category cannot be both empty.");
        } else {
            if (keyword !== "" && category !== "") {
                $("#gtMessage").removeClass().addClass('alert alert-danger')
                        .html("<i class='fa fa-exclamation-circle'></i> Keyword and Category can't have value at the same time.");
            } else {
                $.ajax({
                    url: base_url + "main/generateTitles",
                    data: {'keyword': keyword, 'category': category, 'noTitles': noTitles},
                    cache: false,
                    type: 'post',
                    dataType: 'json',
                    success: function(data) {
                        if (data.result === "OK") {
                            $("#gtMessage").removeClass().addClass('alert alert-success')
                                    .html("<i class='fa fa-check'></i> Generating Titles Successful!");
                            $("#gtGeneratedTitles").val(data.titles);
                            gtAutoHeightContent();
                        } else {
                            $("#gtMessage").removeClass().addClass('alert alert-danger').html(data);
                        }
                    }
                });
            }
        }
    });
    $("#gtSpinBtn").click(function() {
        if ($("#gtGeneratedTitles").val() === "") {
            $("#gtMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> You must generate a title first.");
        } else if ($("#gtGeneratedTitles").val().length < 8) {
            $("#gtMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Generated title must be atleast 8 characters.");
        } else {
            $("#gtSpinBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
            $("#gtBtn").prop('disabled', true);
            $("#gtMessage").removeClass().addClass('alert alert-warning')
                    .html("<i class='fa fa-anchor'></i> Spinning, please wait...");
            $.ajax({
                url: base_url + "main/spin",
                data: {'text': $("#gtGeneratedTitles").val()},
                cache: false,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data.result === "OK") {
                        $("#gtMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Spinning Titles Successful!");
                        $("#gtGeneratedTitles").val(data.output);
                        gtAutoHeightContent();
                    } else {
                        $("#gtMessage").removeClass().addClass('alert alert-danger')
                                .html("<i class='fa fa-exclamation-circle'></i> " + data.result);
                    }
                    $("#gtSpinBtn").prop('disabled', false).html("<i class='fa fa-spinner'></i> Spin");
                    $("#gtBtn").prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    $("#gtMessage").removeClass().addClass('alert alert-danger')
                            .html("<i class='fa fa-exclamation-circle'></i> " + data.result);
                }
            });
        }
    });
}

// adding new article
function activateAddArticle() {
    $("#naBtn").click(function() {
        var title = $("#naTitle").val();
        var category = $("#naCategory").val();
        var content = $("#naContent").val();
        if (validateInput() === true) {
            $.ajax({
                url: base_url + "articles/add",
                data: {'title': title, 'category': category, 'content': content},
                cache: false,
                type: 'post',
                success: function(data) {
                    if (data === "OK") {
                        var oTable = $('#articles').dataTable();
                        oTable.fnReloadAjax();
                        $("#newArticleModal").modal('hide');
                        clearData();
                        toastr.success('Adding Article Successful!');
                    } else {
                        alert(data);
                    }
                }
            });
        }

    });

    function clearData() {
        $("#naTitle").val("");
        $("#naCategory").val("");
        $("#naContent").val("");
        $("#naMessage").removeClass('alert').html("");
    }

    function validateInput() {
        var title = $("#naTitle").val();
        var category = $("#naCategory").val();
        var content = $("#naContent").val();

        if (title.length < 2) {
            $("#naMessage").addClass('alert').html("<i class='fa fa-exclamation-circle'></i> Title must be atleast 3 characters.");
            return false;
        }
        if (category === "") {
            $("#naMessage").addClass('alert').html("<i class='fa fa-exclamation-circle'></i> Please choose a category.");
            return false;
        }
        if (content.length < 30) {
            $("#naMessage").addClass('alert').html("<i class='fa fa-exclamation-circle'></i> Content must be atleast 30 characters.");
            return false;
        }
        return true;
    }
}

function gtAutoHeightContent() {
    $('#gtGeneratedTitles').on('keyup', function(e) {
        $(this).css('height', 'auto');
        $(this).height(this.scrollHeight);
    });
    $('#gtGeneratedTitles').keyup();

}

function gaTitleAutoHeightContent() {
    $('#gaGeneratedTitles').on('keyup', function(e) {
        $(this).css('height', 'auto');
        $(this).height(this.scrollHeight);
    });
    $('#gaGeneratedTitles').keyup();

}

function gabpTitleAutoHeightContent() {
    $('#gabpGeneratedTitles').on('keyup', function(e) {
        $(this).css('height', 'auto');
        $(this).height(this.scrollHeight);
    });
    $('#gabpGeneratedTitles').keyup();
}

$.fn.dataTableExt.oApi.fnReloadAjax = function(oSettings, sNewSource, fnCallback, bStandingRedraw)
{
    // DataTables 1.10 compatibility - if 1.10 then versionCheck exists.
    // 1.10s API has ajax reloading built in, so we use those abilities
    // directly.
    if ($.fn.dataTable.versionCheck) {
        var api = new $.fn.dataTable.Api(oSettings);

        if (sNewSource) {
            api.ajax.url(sNewSource).load(fnCallback, !bStandingRedraw);
        }
        else {
            api.ajax.reload(fnCallback, !bStandingRedraw);
        }
        return;
    }

    if (sNewSource !== undefined && sNewSource !== null) {
        oSettings.sAjaxSource = sNewSource;
    }

    // Server-side processing should just call fnDraw
    if (oSettings.oFeatures.bServerSide) {
        this.fnDraw();
        return;
    }

    this.oApi._fnProcessingDisplay(oSettings, true);
    var that = this;
    var iStart = oSettings._iDisplayStart;
    var aData = [];

    this.oApi._fnServerParams(oSettings, aData);

    oSettings.fnServerData.call(oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
        /* Clear the old information from the table */
        that.oApi._fnClearTable(oSettings);

        /* Got the data - add it to the table */
        var aData = (oSettings.sAjaxDataProp !== "") ?
                that.oApi._fnGetObjectDataFn(oSettings.sAjaxDataProp)(json) : json;

        for (var i = 0; i < aData.length; i++)
        {
            that.oApi._fnAddData(oSettings, aData[i]);
        }

        oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();

        that.fnDraw();

        if (bStandingRedraw === true)
        {
            oSettings._iDisplayStart = iStart;
            that.oApi._fnCalculateEnd(oSettings);
            that.fnDraw(false);
        }

        that.oApi._fnProcessingDisplay(oSettings, false);

        /* Callback user function - for event handlers etc */
        if (typeof fnCallback == 'function' && fnCallback !== null)
        {
            fnCallback(oSettings);
        }
    }, oSettings);
};