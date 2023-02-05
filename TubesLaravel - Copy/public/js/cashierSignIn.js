import{
    show,
    hidden
}from "./component/popuAlert.js";
document.addEventListener("click", function(e){
    if(e.target.classList.contains("homepage__btn--primary")){
        const overlay = e.target.closest(".alert-cn").querySelector(".overlay");
        const alertCn = e.target.closest(".alert-cn");
        hidden([overlay, alertCn]);
    }
})