$(function(){
    $("button#btnEntrar").on("click", function(e){
        e.preventDefault();

        var campousuEmail = $("form#formularioLogin #usuEmail").val();
        var campousuSenha = $("form#formularioLogin #usuSenha").val();

        if(campousuEmail.trim() == "" || campousuSenha.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos");
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
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "home.php"
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });

    $("button#btnCadastro").on("click", function(){
        $("div#formulario").addClass("cadastro");

        $("form#formularioLogin").hide();
        $("form#formularioCadastro").show();

        $("div#textoCadastro").hide();
        $("div#textoLogin").show();
    });
});

