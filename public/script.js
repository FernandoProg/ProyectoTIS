function a() { console.log("asfd")  }
/*const varArr = document.getElementsByClassName("visitas")
console.log(document.getElementsByClassName("visitas")[0])
Array.from(varArr).forEach((e)=>{
    console.log(e);
})
*/
$(document).ready(function () {
    const text = document.createElement("span")
    text.append("Visitas")
    const varArr = document.getElementsByClassName("visitas")
    const arr = Array.from(varArr)
    arr.map((e)=>{
        $(e).hover(function () {
                $(e).append($("<span class='fw-bolder'>Visitas </span>"))
            }, function () {
                $(e).children().last().remove()
            }
        );
    })
});