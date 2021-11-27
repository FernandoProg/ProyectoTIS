$(document).ready(function () {
    $("#rubro").change(function (e) { 
        e.preventDefault();
        $("#link").attr("href",`view_emprendedores.php?rubro=${$("#rubro").val()}`);
    });
});