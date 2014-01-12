$(document).ready(function() {
    activateArticleTable();
    activateAddArticle();
});


function activateArticleTable() {
    $('#articles').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "main/getArticles",
        "aoColumnDefs": [
            {
                "aTargets": [1], // Column to target
                "mRender": function(data, type, full) {
                    return '<a href="' + base_url + 'main/articles/' + full[0] + '">' + full[1] + '</a>';
                }
            }
        ]
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
                url: base_url + "main/addArticle",
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