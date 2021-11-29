$(document).ready(function () {
    $("#rol").change(function(e){
        e.preventDefault();
        $("#link_user").attr("href",`index.php?rol=${$("#rol").val()}&pagina=1`);
    });
});