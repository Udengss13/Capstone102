var counter =1;
function add_more_field(){
    counter +=1;
    html='<div class="input-group flex-nowrap my-2">\
    <input type="file" name="file[]" class="form-control">\
</div>';

var form = document.getElementById("inputfield")
form.innerHTML+=html
}

function add_more_field_material(){
    counter +=1;
    html='<input class=" form-control form-control-sm mb-2" type="file" name="file[]">';

var form = document.getElementById("fileuploadmaterial")
form.innerHTML+=html
}

