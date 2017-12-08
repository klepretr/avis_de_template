tx = "404 error quizz";
    couleur = new Array("#ff8248","#00ff00","#345687","#547964","#000000","#ffff00","#f0f0f0","#123456","#009854","#276590","#296375","#098765","#385437","#285903","#238746","#832685");

function color(){
    b = Math.floor(Math.random()*16)+1;
    return b;
}
    
function anim(){
    nouveau = tx;
    tx2 = document.getElementById("textanim");
    tx2.firstChild.nodeValue = nouveau;
    tx2.style.color = couleur[color()];
    window.setTimeout("anim()",10);
}