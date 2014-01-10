var base_url = window.location.protocol + "//" + window.location.host + "/" + "articledb/";

$(document).ready(function() {
    $('#articles').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + "main/get_articles",
        "aoColumnDefs": [
            {
                "aTargets": [2], // Column to target
                "mRender": function(data, type, full) {
                    return '<a href="/comics/' + full[0] + '">View Article</a>';
                }
            },
            {
                "aTargets": [4], // Column to target
                "mRender": function(data, type, full) {
                    return "<button class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> Edit</button> \n\
                    <button class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Delete</button>";
                }
            },
        ]
    });
});