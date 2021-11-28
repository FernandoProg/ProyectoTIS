$(document).ready(function () {
    $("#rubro").change(function (e) { 
        e.preventDefault();
        $("#link").attr("href",`view_emprendedores.php?rubro=${$("#rubro").val()}`);
    });
    $("#categoria").change(function(e){
        e.preventDefault();
        $("#link_noticia").attr("href",`view_noticias.php?categoria=${$("#categoria").val()}&pagina=1`);
    });
});