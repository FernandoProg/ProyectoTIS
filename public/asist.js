$(document).ready(function () {
    $("#asist").hover(function () {
            let id = $("#seleccion").val();
            console.log("sdf")
            var link = $(`<a id='remove' href='./consultas/remove_asist.php?id=${id}'style='display: none;' class=' ms-1 btn btn-danger align-middle'> Cancelar Asistencia </a>`)
            $("#asist").append(link)
            link.show(1000)
        }, function () {
            $("#remove").remove()
        }
    );
});