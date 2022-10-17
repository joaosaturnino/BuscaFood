$(function(){
    $("button#btnEntrar").on("click", function(e){
        e.preventDefault();

        var campousuEmail = $("form#formularioLogin #usuEmail").val();
        var campousuSenha = $("form#formularioLogin #usuSenha").val();

        if(campousuEmail.trim() == "" || campousuSenha.trim() == ""){
            $("div#mensagem").html("Preencha todos os campos");
        }else{
            $.ajax({
                url: "acoes/login.php",
                type: "POST",
                data: {
                    usuEmail: campousuEmail,
                    usuSenha: campousuSenha
                },
    
                success: function(retorno){
                    retorno = JSON.parse(retorno);
    
                    if(retorno["erro"]){
                        $("div#mensagem").html(retorno["mensagem"]);
                    }else{
                        window.location = "home.php"
                    }
                },

                error: function(){
                    $("div#mensagem").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });
});