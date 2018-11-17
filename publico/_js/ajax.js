$(document).ready(function(e){
    pegarProdutosCategoria();
});

function pegarProdutosCategoria(){
    $("#search-for-category").change(function(){
        var idCategoria = $("#search-for-category").val();
        
        $.ajax({
            type: "POST",
            data:{categoria:idCategoria},
            url:"./dashboard/produto/"
        })
    });
}