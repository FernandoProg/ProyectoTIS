$(document).ready(function () {
    $("#categoria").change(function(e){
        e.preventDefault();
        $("#link2").attr("href",`view_noticias.php?categoria=${$("#categoria").val()}&pagina=1`);
    });
});