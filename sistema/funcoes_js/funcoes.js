function addLike(id_artigo){
    $("#artigo_"+id_artigo+"_like").html("<img src='pikachu.gif'>");
    $.post('funcoes_php/somar.php', {artigo_id:id_artigo}, function(dados){
        if(dados == "sucess"){
            atualizaLike(id_artigo);
        }else{
            alert("não foi possível curtir");
        }
    })
}
function atualizaLike(id_do_artigo){
    $.post("funcoes_php/analizar.php", {artigo_id : id_do_artigo}, function(valor){
        $("#artigo_"+id_do_artigo+"_like").text(valor);
    })
}