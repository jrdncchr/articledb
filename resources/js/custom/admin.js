$(document).ready(function() {
    activateCategories();
    activateUsers();
});
function activateCategories() {
    $('#categories').dataTable({
        "bInfo": false,
        "bPaginate": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "admin/getCategories",
        "aoColumnDefs": [
            {
                "aTargets": [2], // Column to target
                "mRender": function(data, type, full) {
                    return '<button class="btn btn-danger btn-xs" onclick="deleteCategory(' + full[0] + ');"><i class="fa fa-trash-o"></i></button>\n\
                            <button class="btn btn-primary btn-xs" onclick="updateCategory(' + full[0] + ', \'' + full[1] + '\');"><i class="fa fa-edit"></i></button>';
                }
            }
        ]
    });
    activateCategoriesEvents();
}

function activateUsers() {
    $('#users').dataTable({
        "bInfo": false,
        "bPaginate": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "admin/getUsers"
    });
    activateCategoriesEvents();
}

function activateCategoriesEvents() {
    $("#showAddCtgBtn").click(function() {
        $("#ncName").val("");
        $("#ncTitle").html("Add Category");
        $("#editCtgBtn").hide();
        $("#ncBtn").show();
    });

    $("#ncBtn").click(function() {
        var name = $("#ncName").val();
        if (name.length > 2) {
            $("#ncMessage").removeClass().html("");
            $.ajax({
                url: base_url + 'admin/addCategory',
                data: {'name': name},
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data === "OK") {
                        var oTable = $('#categories').dataTable();
                        oTable.fnReloadAjax();
                        $("#newCategoryModal").modal('hide');
                        $("#ncName").val("");
                        toastr.success('Adding Category Successful!');
                    }
                }
            });
        } else {
            $("#ncMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Category name must be atleast 3 characters.");
        }
    });
}

function deleteCategory(id) {
    var verify = confirm('Are you sure to delete this category?');
    if (verify) {
        $.ajax({
            url: base_url + 'admin/deleteCategory',
            data: {'id': id},
            type: 'post',
            cache: false,
            success: function(data) {
                if (data === "OK") {
                    var oTable = $('#categories').dataTable();
                    oTable.fnReloadAjax();
                    toastr.success('Deleting Category Successful!');
                }
            }
        });
    }
}

function updateCategory(id, name) {
    $("#newCategoryModal").modal('show');
    $("#ncName").val(name);
    $("#ncTitle").html("Edit Category");
    $("#ncBtn").hide();
    $("#editCtgBtn").show();

    $("#editCtgBtn").unbind('click').click(function() {
        var name = $("#ncName").val();
        if (name.length > 2) {
            $("#ncMessage").removeClass().html("");
            $.ajax({
                url: base_url + 'admin/updateCategory',
                data: {'id': id, 'name': name},
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data === "OK") {
                        var oTable = $('#categories').dataTable();
                        oTable.fnReloadAjax();
                        $("#newCategoryModal").modal('hide');
                        $("#ncName").val("");
                        toastr.success('Updating Category Successful!');
                    }
                }
            });
        } else {
            $("#ncMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Category name must be atleast 3 characters.");
        }
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