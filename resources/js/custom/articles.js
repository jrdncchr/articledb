$(document).ready(function() {
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
});