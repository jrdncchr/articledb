$(document).ready(function() {
    $("#tabs").tabs();
    activateCategories();
    activateUsers();
    activateTitles();
    activateFaqs();
    activateBlogs();
});
function activateCategories() {
    $('#categories').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
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

function activateFaqs() {
    $('#faqs').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "admin/getFaqs",
        "aoColumnDefs": [
            {
                "aTargets": [2], // Column to target
                "mRender": function(data, type, full) {
                    return '<button class="btn btn-danger btn-xs" onclick="deleteFaq(' + full[0] + ');"><i class="fa fa-trash-o"></i></button>\n\
                            <button class="btn btn-primary btn-xs" onclick="updateFaq(' + full[0] + ', \'' + full[1] + '\', \'' + full[2] + '\');"><i class="fa fa-edit"></i></button>';
                }
            }
        ]
    });
    activateAddFaqEvents();
}

function activateTitles() {
    $('#titles').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "admin/getTitles",
        "aoColumnDefs": [
            {
                "aTargets": [2], // Column to target
                "mRender": function(data, type, full) {
                    return '<button class="btn btn-danger btn-xs" onclick="deleteTitleTemplate(' + full[0] + ');"><i class="fa fa-trash-o"></i></button>\n\
                            <button class="btn btn-primary btn-xs" onclick="updateTitleTemplate(' + full[0] + ', \'' + full[1] + '\');"><i class="fa fa-edit"></i></button>';
                }
            }
        ]
    });
    activateTitleEvents();
}

function activateBlogs() {
    $('#blogs').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "admin/getBlogs",
        "aoColumnDefs": [
            {
                "aTargets": [5], // Column to target
                "mRender": function(data, type, full) {
                    return '<button class="btn btn-danger btn-xs" onclick="deleteBlog(' + full[0] + ');"><i class="fa fa-trash-o"></i></button>\n\
                            <button class="btn btn-primary btn-xs" onclick="updateBlog(' + full[0] + ', \'' + full[1] + '\', \'' + full[2] + '\', \'' + full[3] + '\', \'' + full[4] + '\', \'' + full[5] + '\');"><i class="fa fa-edit"></i></button>';
                }
            }
        ]
    });
    activateAddBlogEvents();
}

function activateAddBlogEvents() {
    $("#addBlogBtn").click(function() {
        $("#nbUrl").val("");
        $("#nbUsername").val("");
        $("#nbPassword").val("");
        $("#nbHead").html("Add Blog");
        $("#ebBtn").hide();
        $("#nbBtn").show();
    });

    $("#nbBtn").click(function() {
        if ($("#nbUrl").val() === "" || $("#nbUsername") === "" || $("#nbPassword").val() === "") {
            $("#nbMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> A required field is empty.");
        } else {
            $.ajax({
                url: base_url + "admin/addBlog",
                data: {'url': $("#nbUrl").val(), 'username': $("#nbUsername").val(), 'password': $("#nbPassword").val()},
                cache: false,
                type: 'post',
                success: function(data) {
                    if (data === "OK") {
                        var oTable = $('#blogs').dataTable();
                        oTable.fnReloadAjax();
                        $("#blogModal").modal('hide');
                        toastr.success('Adding Blog Successful!');
                    }
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
}

function updateBlog(id, url, username, type, status, password) {
    $("#nbUsername").val("");
    $("#nbPassword").val("");
    $("#blogModal").modal('show');
    $("#nbUrl").val(url);
    $("#nbUsername").val(username);
    $("#nbPassword").val(password);
    $("#nbType").val(type);
    $("#nbStatus").val(status);
    $("#nbHead").html("Edit Blog");
    $("#nbBtn").hide();
    $("#ebBtn").show();

    $("#ebBtn").unbind('click').click(function() {
        if ($("#nbUrl").length === "" || $("#nbUsername") === "" || $("#nbPassword").val() === "") {
            $("#nbMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> A required field is empty.");
        } else {
            $("#nbMessage").removeClass().html("");
            $.ajax({
                url: base_url + 'admin/updateBlog',
                data: {'id': id, 'url': $("#nbUrl").val(), 'username': $("#nbUsername").val(), 'password': $("#nbPassword").val(), 'type': $("#nbType").val(), 'status': $("#nbStatus").val()},
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data === "OK") {
                        var oTable = $('#blogs').dataTable();
                        oTable.fnReloadAjax();
                        $("#blogModal").modal('hide');
                        toastr.success('Updating Blog Successful!');
                    } else {
                        alert(data);
                    }
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
}

function deleteBlog(id) {
    var verify = confirm('Are you sure to delete this blog?');
    if (verify) {
        $.ajax({
            url: base_url + 'admin/deleteBlog',
            data: {'id': id},
            type: 'post',
            cache: false,
            success: function(data) {
                if (data === "OK") {
                    var oTable = $('#blogs').dataTable();
                    oTable.fnReloadAjax();
                    toastr.success('Deleting blog Successful!');
                }
            }
        });
    }
}

function activateAddFaqEvents() {
    $("#addFaqBtn").click(function() {
        $("#nfQuestion").val("");
        $("#nfAnswer").val("");
        $("#nbHead").html("Add FAQ");
        $("#efBtn").hide();
        $("#nfBtn").show();
    });

    $("#nfBtn").click(function() {
        if ($("#nfQuestion").val() === "" || $("#nfAnswer") === "") {
            $("#nfMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> A required field is empty.");
        } else {
            $.ajax({
                url: base_url + "admin/addFaq",
                data: {'question': $("#nfQuestion").val(), 'answer': $("#nfAnswer").val()},
                cache: false,
                type: 'post',
                success: function(data) {
                    if (data === "OK") {
                        var oTable = $('#faqs').dataTable();
                        oTable.fnReloadAjax();
                        $("#faqModal").modal('hide');
                        toastr.success('Adding FAQ Successful!');
                    }
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
}

function updateFaq(id, question, answer) {
    $("#faqModal").modal('show');
    $("#nfQuestion").val(question);
    $("#nfAnswer").val(answer);
    $("#nfHead").html("Edit FAQ");
    $("#nfBtn").hide();
    $("#efBtn").show();

    $("#efBtn").unbind('click').click(function() {
        if ($("#nfQuestion").length === "" || $("#nfPassword") === "") {
            $("#nfMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> A required field is empty.");
        } else {
            $("#nfMessage").removeClass().html("");
            $.ajax({
                url: base_url + 'admin/updateFaq',
                data: {'id': id, 'question': $("#nfQuestion").val(), 'answer': $("#nfAnswer").val()},
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data === "OK") {
                        var oTable = $('#faqs').dataTable();
                        oTable.fnReloadAjax();
                        $("#faqModal").modal('hide');
                        toastr.success('Updating FAQ Successful!');
                    } else {
                        alert(data);
                    }
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    });
}

function deleteFaq(id) {
    var verify = confirm('Are you sure to delete this FAQ?');
    if (verify) {
        $.ajax({
            url: base_url + 'admin/deleteFaq',
            data: {'id': id},
            type: 'post',
            cache: false,
            success: function(data) {
                if (data === "OK") {
                    var oTable = $('#faqs').dataTable();
                    oTable.fnReloadAjax();
                    toastr.success('Deleting FAQ Successful!');
                }
            }
        });
    }
}

function activateTitleEvents() {
    $("#addTitleBtn").click(function() {
        $("#ntTitle").val("");
        $("#ntHead").html("Add Title Template");
        $("#etBtn").hide();
        $("#ntBtn").show();
    });

    $("#ntBtn").click(function() {
        var title = $("#ntTitle").val();
        if (title.length > 2) {
            $("#ntMessage").removeClass().html("");
            $.ajax({
                url: base_url + 'admin/addTitleTemplate',
                data: {'title': title},
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data === "OK") {
                        var oTable = $('#titles').dataTable();
                        oTable.fnReloadAjax();
                        $("#titleModal").modal('hide');
                        $("#ntTitle").val("");
                        toastr.success('Adding Title Template Successful!');
                    }
                }
            });
        } else {
            $("#ntMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Title cannot be empty.");
        }
    });
}

function deleteTitleTemplate(id) {
    var verify = confirm('Are you sure to delete this title template?');
    if (verify) {
        $.ajax({
            url: base_url + 'admin/deleteTitleTemplate',
            data: {'id': id},
            type: 'post',
            cache: false,
            success: function(data) {
                if (data === "OK") {
                    var oTable = $('#titles').dataTable();
                    oTable.fnReloadAjax();
                    toastr.success('Deleting title template Successful!');
                }
            }
        });
    }
}

function updateTitleTemplate(id, title) {
    $("#titleModal").modal('show');
    $("#ntTitle").val(title);
    $("#ntHead").html("Edit Title Template");
    $("#ntBtn").hide();
    $("#etBtn").show();

    $("#etBtn").unbind('click').click(function() {
        var title = $("#ntTitle").val();
        if (title.length > 2) {
            $("#ntMessage").removeClass().html("");
            $.ajax({
                url: base_url + 'admin/updateTitleTemplate',
                data: {'id': id, 'title': title},
                type: 'post',
                cache: false,
                success: function(data) {
                    if (data === "OK") {
                        var oTable = $('#titles').dataTable();
                        oTable.fnReloadAjax();
                        $("#titleModal").modal('hide');
                        $("#ntTitle").val("");
                        toastr.success('Updating title template Successful!');
                    }
                }
            });
        } else {
            $("#ncMessage").removeClass().addClass('alert alert-danger')
                    .html("<i class='fa fa-exclamation-circle'></i> Category name must be atleast 3 characters.");
        }
    });
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

function activateUsers() {
    $('#users').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "admin/getUsers"
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