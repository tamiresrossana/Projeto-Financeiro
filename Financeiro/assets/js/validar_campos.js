// Variável com Mensagem padrão.
var msg = "Preencher o campo obrigatório";
var msg_select = "Selecione o item obrigatório";
var msg_senha = "A SENHA deve conter entre 6 e 8 caracteres!";
var msg_rep_senha = "As SENHAS deverão ser iguais!";

// 1ª Validação: Tela de Login:
function ValidarLogin(){
    if($("#emailUsuario").val().trim()==''){
        alert(msg + ' E-MAIL!');
        $("#emailUsuario").focus();
        return false;
    }

    if($("#senha").val().trim()== ''){
        alert(msg + ' SENHA!');
        $("#senha").focus();
        return false;
    }

     if($("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 8){
        alert(msg_senha);
        $("#senha").focus();
        return false;
    }
}

    // 2ª Validação: Tela de Cadastro de Usuário

   function ValidarCadastro(){
    if($("#nome").val().trim()==''){
        alert(msg + ' NOME!');
        $("#nome").focus();
        return false;
    }

      if($("#email").val().trim()==''){
        alert(msg + 'E-MAIL!');
        $("#email").focus();
        return false;
    }

      if($("#senha").val().trim()==''){
        alert(msg + ' SENHA!');
        $("#senha").focus();
        return false;
    }

      if($("#repSenha").val().trim()==''){
        alert(msg + ' REPETIR SENHA!');
        $("#repSenha").focus();
        return false;
    }

   if($("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 8){
        alert(msg_senha);
        $("#senha").focus();
        return false;
    }

    if($("#senha").val().trim() != $("#repsenha").val().trim()){
        alert(msg_rep_senha);
        $("#repsenha").focus();
        return false;
    }

    

} 

// 3ª Validação: Tela Meus Dados

 function ValidarMeusDados(){
    if($("#nome").val().trim()==''){
        alert(msg + ' NOME!');
        $("#nome").focus();
        return false;
    }

    if($("#email").val().trim()==''){
        alert(msg + ' E-MAIL!');
        $("#email").focus();
        return false;
     }

    if($("#senha").val().trim()==''){
        alert(msg + ' SENHA!');
        $("#senha").focus();
        return false;
    }

     if($("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 8){
        alert(msg_senha);
        $("#senha").focus();
        return false;
    }

 }

 // 4ª Validação: Tela Cadastrar/Alterar Categoria Financeira.

    function ValidarCategoria(){
        if($("#nomeCtg").val().trim() == ''){
            alert(msg + ' NOME DA CATEGORIA FINANCEIRA!');
            $("#nomeCtg").focus();
            return false;
        }
        
        
    }

    // 5ª Validação: Tela Cadastrar/Alterar Empresa.

    function ValidarEmpresa(){        
       if($("#nomeEmp").val().trim() == ''){
            alert(msg + 'NOME DA EMPRESA!');
            $("#nomeEmp").focus();
            return false;
        }

       if($("#tele").val().trim() == ''){
            alert(msg + 'TELEFONE!');
            $("#tele").focus();
            return false;
       }

        if($("#local").val().trim() == ''){
            alert(msg + 'ENDEREÇO!');
            $("#local").focus();
            return false;
        }
    }

    // 6ª Validação: Tela Cadastrar/Alterar Conta Bancária.

       function ValidarConta(){        
       if($("#banco").val().trim() == ''){
            alert(msg + ' NOME DO BANCO!');
            $("#banco").focus();
            return false;
        }

       if($("#agencia").val().trim() == ''){
            alert(msg + ' NÚM. DA AGÊNCIA!');
            $("#agencia").focus();
            return false;
       }

        if($("#numero").val().trim() == ''){
            alert(msg + ' NUM. DA CONTA!');
            $("#numero").focus();
            return false;
        }

        if($("#saldo").val().trim() == ''){
            alert(msg + ' SALDO!');
            $("#saldo").focus();
            return false;
        }
    }

     // 7ª Validação: Tela Realizar Movimento Financeiro.

      function ValidarRealizarMovimento(){        
       if($("#tipo").val().trim() == ''){
            alert(msg + ' TIPO DE MOVIMENTO!');
            $("#tipo").focus();
            return false;
        }

       if($("#data").val().trim() == ''){
            alert(msg + ' DATA!');
            $("#data").focus();
            return false;
       }

        if($("#valor").val().trim() == ''){
            alert(msg + ' VALOR (R$)!');
            $("#valor").focus();
            return false;
        }

        if($("#categoria").val().trim() == ''){
            alert(msg + ' CATEGORIA FINANCEIRA!');
            $("#categoria").focus();
            return false;
        }

         if($("#empresa").val().trim() == ''){
            alert(msg + ' EMPRESA!');
            $("#empresa").focus();
            return false;
        }

         if($("#conta").val().trim() == ''){
            alert(msg + ' CONTA BANCÁRIA!');
            $("#conta").focus();
            return false;
        }
      }
      
      // 8ª Validação: Tela Consultar Movimento Financeiro.

      function ValidarConsultarMovimento(){        
       if($("#tipoMov").val().trim() == ''){
            alert(msg + ' TIPO DO MOVIMENTO!');
            $("#tipoMov").focus();
            return false;
        }

       if($("#dtInicio").val().trim() == ''){
            alert(msg + ' DATA DE INÍCIO!');
            $("#dtInicio").focus();
            return false;
       }

        if($("#dtFinal").val().trim() == ''){
            alert(msg + ' DATA FINAL!');
            $("#dtFinal").focus();
            return false;
        }
      }

