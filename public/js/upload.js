function createUpload(nb) {
    var name = 'uploaded'+nb;
    return "<br/><input type='file' name='"+name+"' id='"+name+"' onChange='newUpload(\""+name+"\")' class='uploaded' />";
}

function newUpload(id) {
    if ($('#'+id)[0].value !== null) {
        var html = createUpload(parseInt(id.replace('uploaded',''))+1);
        $('#'+id).after(html);
    }
}

$(document).ready(function() {
    
});