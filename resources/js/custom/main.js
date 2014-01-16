$(document).ready(function() {
    activateArticleTable();
    activateAddArticle();
    activateGenerateTitle();
    activateGenerateArticles();
});


function activateArticleTable() {
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
        ]
    });
}

function activateGenerateArticles() {
    $("#gaGenerateBtn").click(function() {
        var keyword = $("#gaKeyword").val();
        var category = $("#gaCategory").val();
        if (keyword === "" && category === "") {
            $("#gaMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Keyword and Category cannot be both empty.");
        } else {
            if (keyword !== "" && category !== "") {
                $("#gaMessage").removeClass().addClass('alert alert-danger')
                        .html("<i class='fa fa-exclamation-circle'></i> Keyword and Category can't have value at the same time.");
            } else {
                $.ajax({
                    url: base_url + 'main/generateArticles',
                    data: {'keyword': $("#gaKeyword").val(), 'category': $("#gaCategory").val(), 'noTitles': $("#gaNoTitles").val(),
                        'noArticlesToMix': $("#gaNoArticlesToMix").val(), 'pMin': $("#gaPMin").val(), 'pMax': $("#gaPMax").val()},
                    cache: false,
                    type: 'post',
                    success: function(data) {
                        $("#genArticleForm").slideUp('fast');
                        $("#genArticleFormOutput").slideDown('slow');
                        $("#gaGenerateBtn").hide();
                        $("#gaSaveBtn").show();
                        $("#gaMessage").removeClass().addClass('alert alert-success')
                                .html("<i class='fa fa-check'></i> Generating Article Successful!.");
                    },
                    error: function(xhr, status, error) {
                        alert(error);
                    }
                });
            }
        }
    });
    $("#gaRefreshBtn").click(function() {
        $("#gaMessage").removeClass().addClass('alert alert-info')
                                .html("<i class='fa fa-info'></i> Keyword and Category can't have a value at the same time.");
        $("#genArticleForm").slideDown('slow');
        $("#genArticleFormOutput").slideUp('slow');
        $("#gaSaveBtn").hide();
        $("#gaGenerateBtn").show();
    });
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
                            $("#gtGeneratedTitles").html(data.titles);
                            gtAutoHeightContent();
                        } else {
                            $("#gtMessage").removeClass().addClass('alert alert-danger').html(data);
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

    $("#gtGeneratedTitles").keydown(function(e) {
        e.preventDefault();
    });
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