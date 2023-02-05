import{
    show,
    hidden
}from "./component/popuAlert.js";
const form = document.querySelector(".form-cashier");
const inputKasirUsername = document.querySelector("#inputKasirUsername");
form.addEventListener("click", function(e){
    if(e.target.classList.contains("form__submit-create")) form.action = "/settings-create";
    if(e.target.classList.contains("form__submit-update")) form.action = "/settings-update-cashier";
})
document.addEventListener("click", function(e){
    if(e.target.classList.contains("homepage__btn--primary")){
        const overlay = e.target.closest(".alert-cn").querySelector(".overlay");
        const alertCn = e.target.closest(".alert-cn");
        hidden([overlay, alertCn]);
    }
})
inputKasirUsername.addEventListener("keydown", function(e){
    if(e.key === "Backspace"){
        const username = inputKasirUsername.value;
        inputKasirUsername.value += username.length - 1;
    }
})

