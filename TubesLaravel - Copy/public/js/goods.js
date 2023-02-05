import{
    show,
    hidden
}from "./component/popuAlert.js";
const formEdit = document.querySelector(".form-cn-popup");
const tbBarang = document.querySelector(".tb-cn");
const inputNamaBarang = document.querySelector(".form__input-popup-nama");
const inputHargaBarang = document.querySelector(".form__input-popup-harga");
const inputStokBarang = document.querySelector(".form__input-popup-stok");
const inputDiscount = document.querySelector(".form__input-popup-discount");
const inputIdBarang = document.querySelector(".form__input-popup-id");
const inputSearch = document.getElementById("inputSearch");
const tbRows = document.querySelectorAll(".tb__row");
tbBarang.addEventListener("click", function(e){
    const overlay = e.target.closest(".tb__data-actions").querySelector(".overlay");
    const alertConfirm = e.target.closest(".tb__data-actions").querySelector(".alert-cn");

    if(e.target.classList.contains("tb__icn-edit")){
        const tableData = [...e.target.parentElement.parentElement.querySelectorAll(".tb__data")]
        const [
            idBarang, 
            namaBarang, 
            hargaBarang,
            stokBarang,
            discount
        ] = tableData.map(function(tbData){
            return tbData.textContent;
        });
        inputIdBarang.value = idBarang;
        inputNamaBarang.value = namaBarang;
        inputHargaBarang.value = hargaBarang;
        inputStokBarang.value = stokBarang;
        inputDiscount.value = discount;
        formEdit.classList.remove("hidden");
        overlay.classList.remove("hidden");
    }

    if(e.target.classList.contains("tb__icn-trash")){
        const inputDeleteId = e.target.closest(".tb__data-actions").querySelector(".inputDeleteId");
        const tableData = [...e.target.parentElement.parentElement.parentElement.querySelectorAll(".tb__data")]
        const [idBarang] = tableData.map(function(tbData){
            return tbData.textContent;
        });
        inputDeleteId.value = parseInt(idBarang);
        show([alertConfirm,overlay]);
    }

    if(e.target.classList.contains("overlay")){
        hidden([overlay, formEdit, alertConfirm]);
    }

    if(e.target.classList.contains("alert__btn-cancel")){
        hidden([overlay, alertConfirm]);
    }
})

document.addEventListener("click", function(e){
    if(e.target.classList.contains("homepage__btn--primary")){
        const overlay = e.target.closest(".alert-cn").querySelector(".overlay");
        const alertCn = e.target.closest(".alert-cn");
        hidden([overlay, alertCn]);
    }
})

inputSearch.addEventListener("input", function(e){
    const keyw = inputSearch.value.toLowerCase();
    tbRows.forEach(function(tbRow){
        const tbData = [...tbRow.querySelectorAll(".tb__data")];
        const [
            idBarang,
            namaBarang,
            hargaBarang,
            stokBarang,
            discount
        ] = tbData.map(tbData => tbData.textContent.toLowerCase());

        if(
            idBarang.includes(keyw) || 
            namaBarang.includes(keyw) || 
            hargaBarang.includes(keyw) || 
            stokBarang.includes(keyw) || 
            discount.includes(keyw))
        {
            show([tbRow]);
        }else{
            hidden([tbRow]);
        }
    })
})