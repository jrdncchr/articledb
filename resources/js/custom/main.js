$(document).ready(function() {
    setDefaultValues();
    activateTables();
    activateAddArticle();
    activateGenerateTitle();
    activateGenerateArticles();
    activateGenerateArticlesByProject();
    activateAddMultipleArticles();
});

function setDefaultValues() {
    $("#gaAddedCode").popover();
    $("#gabpAddedCode").popover();
    
    $("select#gabpNoBlogs option").each(function() {
        this.selected = (this.text === '3');
    });
    $("select#gaNoBlogs option").each(function() {
        this.selected = (this.text === '3');
    });
    $("select#gtNoTitles option").each(function() {
        this.selected = (this.text === '5');
    });
    $("select#gaNoTitles option").each(function() {
        this.selected = (this.text === '5');
    });
    $("select#gabpNoTitles option").each(function() {
        this.selected = (this.text === '5');
    });
    $("select#gaNoArticlesToMix option").each(function() {
        this.selected = (this.text === '5');
    });
    $("select#gaPMin option").each(function() {
        this.selected = (this.text === '5');
    });
    $("select#gaPMax option").each(function() {
        this.selected = (this.text === '8');
    });
    $("select#gaSPMin option").each(function() {
        this.selected = (this.text === '5');
    });
    $("select#gaSPMax option").each(function() {
        this.selected = (this.text === '8');
    });
    $("select#gabpPMin option").each(function() {
        this.selected = (this.text === '5');
    });
    $("select#gabpPMax option").each(function() {
        this.selected = (this.text === '8');
    });
    $("select#gabpSPMin option").each(function() {
        this.selected = (this.text === '5');
    });
    $("select#gabpSPMax option").each(function() {
        this.selected = (this.text === '8');
    });

}

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

function activateAddMultipleArticles() {
    var list = new Array();

    $("#namInput").change(function(e) {
        list = new Array();
        var error = "";
        var files = e.target.files;
        if (files) {
            for (var i = 0, f; f = files[i]; i++) {
                if (!f.type.match('text.*')) {
                    error += "<p><i class='fa fa-exclamation-circle'></i> " + f.name + " is not a valid text file.</p>";
                } else {
                    var r = new FileReader();
                    r.onload = (function(f) {
                        return function(e) {
                            var contents = e.target.result;
                            list.push(contents);
                        };
                    })(f);
                    r.readAsText(f);
                }

            }
            if (error !== "") {
                $("#namMessage").removeClass().addClass('alert alert-danger')
                        .html(error);
            } else {
                $("#namMessage").removeClass().addClass('alert alert-success')
                        .html("<p><i class='fa fa-check'></i> All files are ready to be added.</p>");
            }
        } else {
            alert("Failed to load files");
        }
    });
    $("#namBtn").click(function() {
        if (list.length > 0) {
            if ($("#namCategory").val() !== "") {
                $.ajax({
                    url: base_url + "articles/addMultiple",
                    data: {'list': list, 'category': $("#namCategory").val()},
                    type: 'post',
                    cache: false,
                    success: function(data) {
                        $("#namMessage").removeClass().addClass('alert alert-success')
                                .html("<p><i class='fa fa-check'></i> You have successfully added " + list.length + " articles in " + $("#namCategory").val() + " category!</p>");
                        reset($("#namInput"));
                        $("#namCategory").val("");
                        var oTable = $('#articles').dataTable();
                        oTable.fnReloadAjax();
                        toastr.success('Adding Articles Successful!');
                        list = new Array();
                    }
                });
            } else {
                $("#namMessage").removeClass().addClass('alert alert-danger')
                        .html("<p><i class='fa fa-exclamation-circle'></i> Please select the category of the articles to be added.</p>");
            }
        } else {
            $("#namMessage").removeClass().addClass('alert alert-danger')
                    .html("<p><i class='fa fa-exclamation-circle'></i> Please select atleast 1 file(.txt).</p>");
        }
    });
    $("#namClearBtn").click(function() {
        list = new Array();
        reset($("#namInput"));
        $("#namCategory").val("");
        $("#namMessage").removeClass().addClass('alert alert-info')
                .html("<p><i class='fa fa-info'></i> Select all the files(.txt) to be added. Note that the first line will be the title.</p>");
    });
    function reset(e) {
        e.wrap('<form>').parent('form').trigger('reset');
        e.unwrap();
    }
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
        $("#gabpGenerateBtn").show();
        $("#gabpCheckDiv").fadeIn('fast');
        $("#gabpPostMessage").removeClass().addClass("alert alert-info")
                             .html("<i class='fa fa-info'></i> This will post your generated article in a random available blogs. After posting, it will show you the full URL of the posted articles.");
    }
    $("#gabpGenerateBtn").click(function() {
        if (validateGenerateArticlesByProject() === true) {
            $("#gabpGenerateBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
            $.ajax({
                url: base_url + 'main/generateArticlesByProject',
                data: {'keyword': $("#gabpKeyword").val(), 'category': $("#gabpCategory").val(), 'noTitles': $("#gabpNoTitles").val(),
                    'noArticlesToMix': $("#gabpNoArticlesToMix").val(), 'pMin': $("#gabpPMin").val(), 'pMax': $("#gabpPMax").val(),
                    sMin: $("#gabpSPMin").val(), sMax: $("#gabpSPMax").val()},
                cache: false,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    // Spin GENERATED TITLES and CONTENTS
                    if ($("#gabpCheck").is(":checked")) {
                        $("#gabpMessage").removeClass().addClass('alert alert-warning')
                                .html("<i class='fa fa-anchor'></i> Spinning, please wait...");
                        $.ajax({
                            url: base_url + "main/spin",
                            data: {'text': data.titles},
                            cache: false,
                            type: 'post',
                            dataType: 'json',
                            success: function(data2) {
                                if (data2.result === "OK") {
                                    $("#gabpGeneratedTitles").val(data2.output);
                                    $.ajax({
                                        url: base_url + "main/spin",
                                        data: {'text': data.article},
                                        cache: false,
                                        type: 'post',
                                        dataType: 'json',
                                        success: function(data3) {
                                            if (data3.result === "OK") {
                                                $("#gabpMessage").removeClass().addClass('alert alert-success')
                                                        .html("<i class='fa fa-check'></i> Generating and Spinning Contents Successful!");
                                                if ($("#gabpAddedCode").val() !== "") {
                                                    var content = data3.output;
                                                    var splitContent = content.trim().split(".");
                                                    var randomIndex = Math.floor((Math.random() * splitContent.length) + 1);
                                                    splitContent[randomIndex] = " " + $("#gabpAddedCode").val() + splitContent[randomIndex] + " ";
                                                    var newContent = "";
                                                    for (var i = 0; i < splitContent.length; i++) {
                                                        if (typeof(splitContent[i]) !== undefined) {
                                                            if (splitContent[i].length > 5) {
                                                                newContent += splitContent[i] + ".";
                                                            }
                                                        }
                                                    }
                                                    $("#gabpGeneratedContents").val(newContent);
                                                } else {
                                                    $("#gabpGeneratedContents").val($.trim(data3.output));
                                                }
                                            } else {
                                                $("#gabpMessage").removeClass().addClass('alert alert-danger')
                                                        .html("<i class='fa fa-exclamation-circle'></i> " + data3.result);
                                            }
                                            $("#gabpGenerateBtn").prop('disabled', false).html("Generate");
                                            $("#gabpGenerateBtn").hide();
                                            $("#gabpArticleForm").slideUp('fast');
                                            $("#gabpArticleFormOutput").slideDown('slow');
                                            $("#gabpGenerateBtn").hide();
                                            $("#gabpCheckDiv").fadeOut('fast');
                                        }
                                    });
                                } else {
                                    $("#gabpMessage").removeClass().addClass('alert alert-danger')
                                            .html("<i class='fa fa-exclamation-circle'></i> " + data2.result) + " ";
                                    $("#gabpGenerateBtn").prop('disabled', false).html("Generate");
                                }
                            }
                        });
                    } else {
                        if ($("#gabpAddedCode").val() !== "") {
                            var content = data.article;
                            var splitContent = content.trim().split(".");
                            var randomIndex = Math.floor((Math.random() * splitContent.length) + 1);
                            splitContent[randomIndex] = " " + $("#gabpAddedCode").val() + splitContent[randomIndex];
                            var newContent = "";
                            for (var i = 0; i < splitContent.length; i++) {
                                if (typeof(splitContent[i]) !== undefined) {
                                    if (splitContent[i].length > 5) {
                                        newContent += splitContent[i] + ".";
                                    }
                                }
                            }
                            $("#gabpGeneratedContents").val(newContent);
                        } else {
                            $("#gabpGeneratedContents").val($.trim(data.article));
                        }
                        $("#gabpArticleForm").slideUp('fast');
                        $("#gabpArticleFormOutput").slideDown('slow');
                        $("#gabpGenerateBtn").hide();
                        $("#gabpMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Generating Article Successful!");
                        $("#gabpGeneratedTitles").val(data.titles);
                        $("#gabpGenerateBtn").prop('disabled', false).html("Generate");
                        $("#gabpCheckDiv").fadeOut('fast');
                    }
                },
                error: function(xhr, status, error) {
                    $("#gabpMessage").removeClass().addClass('alert alert-danger')
                            .html("<i class='fa fa-exclamation-circle'></i> Mixing articles failed, please try again.");
                    $("#gabpGenerateBtn").prop('disabled', false).html("Generate");
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
}

function activateGenerateArticles() {
    $("#gaGenerateBtn").click(function() {
        if (validateGenerateArticles() === true) {
            $("#gaGenerateBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
            $.ajax({
                url: base_url + 'main/generateArticles',
                data: {'keyword': $("#gaKeyword").val(), 'category': $("#gaCategory").val(), 'noTitles': $("#gaNoTitles").val(),
                    'noArticlesToMix': $("#gaNoArticlesToMix").val(), 'pMin': $("#gaPMin").val(), 'pMax': $("#gaPMax").val(),
                    sMin: $("#gaSPMin").val(), sMax: $("#gaSPMax").val()},
                cache: false,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    // Spin GENERATED TITLES and CONTENTS
                    if ($("#gaCheck").is(":checked")) {
                        $("#gaMessage").removeClass().addClass('alert alert-warning')
                                .html("<i class='fa fa-anchor'></i> Spinning, please wait...");
                        $.ajax({
                            url: base_url + "main/spin",
                            data: {'text': data.titles},
                            cache: false,
                            type: 'post',
                            dataType: 'json',
                            success: function(data2) {
                                if (data2.result === "OK") {
                                    $("#gaGeneratedTitles").val(data2.output);
                                    $.ajax({
                                        url: base_url + "main/spin",
                                        data: {'text': data.article},
                                        cache: false,
                                        type: 'post',
                                        dataType: 'json',
                                        success: function(data3) {
                                            if (data3.result === "OK") {
                                                $("#gaMessage").removeClass().addClass('alert alert-success')
                                                        .html("<i class='fa fa-check'></i> Generating and Spinning Contents Successful!");
                                                if ($("#gaAddedCode").val() !== "") {
                                                    var content = data3.output;
                                                    var splitContent = content.trim().split(".");
                                                    var randomIndex = Math.floor((Math.random() * splitContent.length) + 10);
                                                    splitContent[randomIndex] = " " + $("#gaAddedCode").val() + splitContent[randomIndex] + " ";
                                                    var newContent = "";
                                                    for (var i = 0; i < splitContent.length; i++) {
                                                        if (splitContent[i].length > 5) {
                                                            if (typeof(splitContent[i]) !== undefined) {
                                                                if (splitContent[i].length > 5) {
                                                                    newContent += splitContent[i] + ".";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $("#gaGeneratedContents").val(newContent);
                                                } else {
                                                    $("#gaGeneratedContents").val($.trim(data3.output));
                                                }
                                            } else {
                                                $("#gaMessage").removeClass().addClass('alert alert-danger')
                                                        .html("<i class='fa fa-exclamation-circle'></i> " + data3.result);
                                            }
                                            $("#gaGenerateBtn").prop('disabled', false).html("Generate");
                                            $("#genArticleForm").slideUp('fast');
                                            $("#gaGenerateBtn").hide();
                                            $("#genArticleFormOutput").slideDown('slow');
                                            $("#gaCheckDiv").fadeOut('fast');
                                        }
                                    });
                                } else {
                                    $("#gaMessage").removeClass().addClass('alert alert-danger')
                                            .html("<i class='fa fa-exclamation-circle'></i> " + data2.result);
                                    $("#gaGenerateBtn").prop('disabled', false).html("Generate");
                                }
                            }
                        });
                    } else {
                        if ($("#gaAddedCode").val() !== "") {
                            var content = data.article;
                            var splitContent = content.trim().split(".");
                            var randomIndex = Math.floor((Math.random() * splitContent.length) + 10);
                            splitContent[randomIndex] = " " + $("#gaAddedCode").val() + splitContent[randomIndex] + " ";
                            var newContent = "";
                            for (var i = 0; i < splitContent.length; i++) {
                                if (typeof(splitContent[i]) !== undefined) {
                                    if (splitContent[i].length > 5) {
                                        newContent += splitContent[i] + ".";
                                    }
                                }
                            }
                            $("#gaGeneratedContents").val(newContent);
                        } else {
                            $("#gaGeneratedContents").val($.trim(data.article));
                        }
                        $("#genArticleForm").slideUp('fast');
                        $("#genArticleFormOutput").slideDown('slow');
                        $("#gaGenerateBtn").hide();
                        $("#gaMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Generating Article Successful!");
                        $("#gaGeneratedTitles").val(data.titles);
                        $("#gaGenerateBtn").prop('disabled', false).html("Generate");
                        $("#gaCheckDiv").fadeOut('fast');
                    }
                },
                error: function(xhr, status, error) {
                    $("#gaMessage").removeClass().addClass('alert alert-danger')
                            .html("<i class='fa fa-exclamation-circle'></i> Mixing articles failed, please try again.");
                    $("#gaGenerateBtn").prop('disabled', false).html("Generate");
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
        $("#gaGenerateBtn").show();
        $("#gaCheckDiv").fadeIn('fast');
        $("#gaPostMessage").removeClass().addClass("alert alert-info")
                             .html("<i class='fa fa-info'></i> This will post your generated article in a random available blogs. After posting, it will show you the full URL of the posted articles.");
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
                        .html("<i class='fa fa-exclamation-circle'></i> Keyword or Category is required.");
            } else if ($("#gtTemplate").is(":checked") && keyword === "") {
                $("#gtMessage").removeClass().addClass('alert alert-danger')
                        .html("<i class='fa fa-exclamation-circle'></i> If you want to use templates, keyword must be have a value.");
            } else {
                $("#gtBtn").prop('disabled', true).html("<img src='" + base_url + "resources/images/ajax-loader.gif' />");
                var useTemplate = "NO";
                if ($("#gtTemplate").is(":checked")) {
                    useTemplate = "YES";
                }
                $.ajax({
                    url: base_url + "main/generateTitles",
                    data: {'keyword': keyword, 'category': category, 'noTitles': noTitles, 'useTemplate': useTemplate},
                    cache: false,
                    type: 'post',
                    dataType: 'json',
                    success: function(data) {
                        if (data.result === "OK") {
                            if ($("#gtCheck").is(":checked")) {
                                $("#gtMessage").removeClass().addClass('alert alert-warning')
                                        .html("<i class='fa fa-anchor'></i> Spinning, please wait...");
                                $.ajax({
                                    url: base_url + "main/spin",
                                    data: {'text': data.titles},
                                    cache: false,
                                    type: 'post',
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data.result === "OK") {
                                            $("#gtMessage").removeClass().addClass('alert alert-success')
                                                    .html("<i class='fa fa-check'></i> Generating and Spinning Titles Successful!");
                                            $("#gtGeneratedTitles").val(data.output);
                                            gtAutoHeightContent();
                                        } else {
                                            $("#gtMessage").removeClass().addClass('alert alert-danger')
                                                    .html("<i class='fa fa-exclamation-circle'></i> " + data.result);
                                        }
                                        $("#gtBtn").prop('disabled', false).html("Generate Title");
                                    },
                                    error: function(xhr, status, error) {
                                        $("#gtMessage").removeClass().addClass('alert alert-danger')
                                                .html("<i class='fa fa-exclamation-circle'></i> " + error);
                                        $("#gtBtn").prop('disabled', false).html("Generate Title");
                                    }
                                });
                            } else {
                                $("#gtMessage").removeClass().addClass('alert alert-success')
                                        .html("<i class='fa fa-check'></i> Generating Titles Successful!");
                                $("#gtGeneratedTitles").val(data.titles);
                                $("#gtBtn").prop('disabled', false).html("Generate Title");
                                gtAutoHeightContent();
                            }
                        } else {
                            $("#gtMessage").removeClass().addClass('alert alert-danger')
                                    .html("<i class='fa fa-exclamation-circle'></i> " + data.result);
                        }
                    }
                });
            }
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

//function gaTitleAutoHeightContent() {
//    $('#gaGeneratedTitles').on('keyup', function(e) {
//        $(this).css('height', 'auto');
//        $(this).height(this.scrollHeight);
//    });
//    $('#gaGeneratedTitles').keyup();
//
//}
//
//function gabpTitleAutoHeightContent() {
//    $('#gabpGeneratedTitles').on('keyup', function(e) {
//        $(this).css('height', 'auto');
//        $(this).height(this.scrollHeight);
//    });
//    $('#gabpGeneratedTitles').keyup();
//}

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