var gallery = {
    // (A) SHOW SELECTED IMAGE IN LIGHT BOX
    show : function(img){
        var clone = img.cloneNode(),
            front = document.getElementById("lfront"),
            back = document.getElementById("lback");

        front.innerHTML = "";
        front.appendChild(clone);
        back.classList.add("show");
    },

    // (B) HIDE THE LIGHTBOX
    hide : function(){
        document.getElementById("lback").classList.remove("show");
    }
};
