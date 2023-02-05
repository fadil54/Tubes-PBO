export const hidden = function(elements){
    elements.forEach(function(el){
        el.classList.add("hidden");
    })
}
export const show = function(elements){
    elements.forEach(function(el){
        el.classList.remove("hidden");
    })
}

