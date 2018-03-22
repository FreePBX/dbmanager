$(document).ready(function () {
    if ($('#backups').length){
        $('#backups').multiselect({enableFiltering: true});
    }
});

function linkFormatter(value, row, index) {
    var html = '<a href="?display=dbmanager&view=form&id=' + value + '"><i class="fa fa-pencil"></i></a>';
    html += '&nbsp;<a href="?display=dbmanager&action=delete&id=' + value + '" class="delAction"><i class="fa fa-trash"></i></a>';
    return html;
}