function mostrar(id) {
    if (document.getElementById(id).style.display == "block") {
        document.getElementById(id).style.display = "none";
    }
    else {
        document.getElementById(id).style.display = "block";
    }
}

// $(function (){
//     $('article div.btn').click(function(){
//         $(this).siblings('').slideToggle();
//         // if($(this).text() == "ESCOLHA UM MODELO"){
//         //     $(this).text("FECHAR");
//         // }
//         // else{
//         //     $(this).text("ESCOLHA UM MODELO")
//         // }
//     });
// });
