//funcão que recebe e envia os dadosr recebidos
//envia para uma função php que vai adicionar e modificar os dados na tabela
function addLike(id_artigo){
    $("#artigo_"+id_artigo+"_like").html("<img src='pikachu.gif'>");
    $.post('funcoes_php/somar.php', {artigo_id:id_artigo}, function(dados){
       //analisa o callback da função post, caso tenha modificado chama função AtualizaLike 
        if(dados == "sucess"){
            atualizaLike(id_artigo);
        }else{
            alert("não foi possível curtir");
        }
    })
}
//atualiza a informação de like caso a modificação e inserção da tabela seja um sucesso
function atualizaLike(id_do_artigo){
    $.post("funcoes_php/analizar.php", {artigo_id : id_do_artigo}, function(valor){
        $("#artigo_"+id_do_artigo+"_like").text(valor);
    })
}