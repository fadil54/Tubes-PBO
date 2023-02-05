// import { add } from "lodash";
import{
    show,
    hidden
}from "./component/popuAlert.js";
const inputSearch = document.getElementById("inputSearch");
const tbBarangRows = document.querySelectorAll(".tb-barang .tb__row");
const tbBarang = document.querySelector(".tb-barang");
const inputIdBarang = document.querySelector("#inputIdBarang");
const inputQuantity = document.querySelector("#inputQuantity");
const addToCartBtn = document.querySelector(".form__submit-add");
const fieldsError = document.querySelectorAll(".form__error");
const tbCartBody = document.querySelector(".tb-cart .tb__body");
const tbCartRow = document.querySelector(".tb-cart .tb__body");
const alertPopup = document.querySelector(".alert-cn-barang");
const alertIcon = document.querySelector(".alert-cn-barang .alert__icn");
const alertMessage = document.querySelector(".alert-cn-barang .alert__message");
const nomSubtotal = document.querySelector(".li-item__nom-subtotal");
const nomDiscount = document.querySelector(".li-item__nom-discount");
const inputNominalBayar = document.getElementById("inputNominalBayar");
const nomTotal = document.querySelector(".li-item__nom-total");
const nomKembalian = document.querySelector(".li-item__nom-kembalian");
const inputTotalQuantity = document.getElementById("inputTotalQuantity");
const inputTotal = document.getElementById("inputTotal");
const inputNominal = document.getElementById("inputNominal");
const inputKembalian = document.getElementById("inputKembalian");
const countSubTotal = function(){
    let subTotal = 0;
    const tbCartRows = document.querySelectorAll(".tb-cart .tb__row");
    tbCartRows.forEach(function(tbRow){
        const tbData = [...tbRow.querySelectorAll(".tb__data")];
        const [
            idBarang,
            namaBarang,
            quantity,
            hargaBarang,
            discount
        ] = tbData.map(tbData => tbData.textContent.toLowerCase());
        subTotal += parseInt(hargaBarang) * quantity;
    })
    return subTotal; 
}
const countDiscount = function(){
    let totalDisc = 0;
    let discountSatuan = 0;

    const tbCartRows = document.querySelectorAll(".tb-cart .tb__row");
    tbCartRows.forEach(function(tbRow){
        const tbData = [...tbRow.querySelectorAll(".tb__data")];
        const [
            idBarang,
            namaBarang,
            quantity,
            hargaBarang,
            discount
        ] = tbData.map(tbData => tbData.textContent.toLowerCase());
        discountSatuan = discount / 100 * hargaBarang * quantity;
        totalDisc = Math.round(totalDisc + discountSatuan);
    })
    return totalDisc; 
}
const countTotalQuantity = function(){
    let totalQuantity = 0;
    const tbCartRows = document.querySelectorAll(".tb-cart .tb__row");
    tbCartRows.forEach(function(tbRow){
        const tbData = [...tbRow.querySelectorAll(".tb__data")];
        const [
            idBarang,
            namaBarang,
            quantity,
            hargaBarang,
            discount
        ] = tbData.map(tbData => tbData.textContent.toLowerCase());
        totalQuantity += parseInt(quantity);
    })
    return totalQuantity; 
}
const countPayAmount = function(){
    if(inputNominalBayar.value.trim() === "") return 0;
    return Number(inputNominalBayar.value); 
}
const countTotal = function(subTotal, discount){
    return subTotal - discount;
}
const countReturn = function(total, nominalBayar){
    return total - nominalBayar;
}
tbBarang.addEventListener("click", function(e){
    if(e.target.classList.contains("tb__data")){
        const tbData = [...e.target.closest(".tb__row").querySelectorAll(".tb__data")];
        const [
            idBarang,
            namaBarang,
            hargaBarang,
            stokBarang,
            discount
        ] = tbData.map(tbData => tbData.textContent);

        inputIdBarang.value = idBarang;
    }
})
inputSearch.addEventListener("input", function(e){
    const keyw = inputSearch.value.toLowerCase();
    tbBarangRows.forEach(function(tbRow){
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
document.addEventListener("click", function(e){
    if(e.target.classList.contains("homepage__btn--primary")){
        const alertCn = e.target.closest(".alert-cn");
        hidden([alertCn]);
    }
})
addToCartBtn.addEventListener("click", function(e){
    const [idBarangLabel, quantityLabel] = fieldsError;
    const tbCartRows = document.querySelectorAll(".tb-cart .tb__row");

    let barangAda = false;
    if(inputIdBarang.value.trim() === ""){
        show([idBarangLabel]);
    }else{
        hidden([idBarangLabel]);
    }
    if(inputQuantity.value.trim() === ""){
        show([quantityLabel]);
    }else{
        hidden([quantityLabel]);
    }
    tbBarangRows.forEach(function(tbRow){
        const tbData = [...tbRow.querySelectorAll(".tb__data")];
        const [
            idBarang,
            namaBarang,
            hargaBarang,
            stokBarang,
            discount
        ] = tbData.map(tbData => tbData.textContent);
        if(idBarang === inputIdBarang.value){
            barangAda = true;
            const tbRow = document.createElement("tr");
            tbRow.classList.add("tb__row");
            tbRow.classList.add(tbCartRows.length % 2 === 0 ? "tb__row--odd" : "tb__row--even");

            const idBarangEl = document.createElement("td");
            idBarangEl.classList.add("tb__data");
            idBarangEl.textContent = idBarang;

            const namaBarangEl = document.createElement("td");
            namaBarangEl.classList.add("tb__data");
            namaBarangEl.textContent = namaBarang;

            const quantityEL = document.createElement("td");
            quantityEL.classList.add("tb__data");
            quantityEL.textContent = inputQuantity.value;

            const hargaBarangEl = document.createElement("td");
            hargaBarangEl.classList.add("tb__data");
            hargaBarangEl.textContent = hargaBarang;

            const discountEl = document.createElement("td");
            discountEl.classList.add("tb__data");
            discountEl.textContent = discount;

            tbRow.append(idBarangEl, namaBarangEl, quantityEL, hargaBarangEl, discountEl);
            tbCartBody.append(tbRow);

            inputIdBarang.value = "";
            inputQuantity.value = "";
            
            nomSubtotal.textContent = "Rp." + countSubTotal();
            nomDiscount.textContent = "Rp." + countDiscount();
            nomTotal.textContent = "Rp." + countTotal(countSubTotal(), countDiscount());

            inputTotalQuantity.value = countTotalQuantity();
            inputTotal.value = countTotal(countSubTotal(), countDiscount()) - countPayAmount();
            

            alertIcon.setAttribute("src", "assets/icons/succes.svg");
            alertMessage.textContent = "barang berhasil ditambahkan";
            show([alertPopup])
        }
    })

    if(barangAda === false){
        if(!(inputIdBarang.value.trim() === "" && inputQuantity.value.trim() === "")){
            alertIcon.setAttribute("src", "assets/icons/error-circle-rounded-outline.svg");
            alertMessage.textContent = "Barang tidak ditemukan";
            show([alertPopup]);
        }
    }
})

inputNominalBayar.addEventListener("input", function(e){
    // console.log(countTotal);
    nomKembalian.textContent = "Rp." + (countTotal(countSubTotal(), countDiscount()) - countPayAmount());
    // inputNominal.value = countPayAmount();
    // inputKembalian.value = parseInt(nomKembalian.textContent);
})
