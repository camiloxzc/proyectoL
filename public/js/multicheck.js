var checkboxes = document.querySelectorAll("input[name = 'modulo[]'");
function checkAll(myCheckbox){
    if(myCheckbox.checked == true){
        checkboxes.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
        checkboxes.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}

var checkboxes2 = document.querySelectorAll("input[name = 'permission[]'");
function checkAll2(myCheckbox){
    if(myCheckbox.checked == true){
        checkboxes2.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
        checkboxes2.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}
