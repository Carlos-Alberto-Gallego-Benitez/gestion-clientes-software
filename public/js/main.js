const inputs = document.querySelectorAll('.input');

function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove('focus');
    }

}

inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
})

$(document).ready(function () {
    var falsa = true;
    var form = $("#formulario");
    form.submit(function () {
        if ($("#pass").val() == '') {
            $("#mensaje").text('Todos los campos son obligatorios');
            falsa = false;
        }
        if ($("#name").val() == '') {
            $("#mensaje").text('Todos los campos son obligatorios');
            falsa = false;
        }
        if ($("#name").val() != '' && $("#pass").val() != '') {
            falsa = true;
            $("#mensaje").text('');
        }
        return falsa;
    });
});