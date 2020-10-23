var gallery = {
    // Visione ingrandita al click
    show : function(img){
        var clone = img.cloneNode(),
            front = document.getElementById("lfront"),
            back = document.getElementById("lback");

        front.innerHTML = "";
        front.appendChild(clone);
        back.classList.add("show");
    },

    // ridimensionamento al momento del click esterno alla foto
    hide : function(){
        document.getElementById("lback").classList.remove("show");
    }
};
