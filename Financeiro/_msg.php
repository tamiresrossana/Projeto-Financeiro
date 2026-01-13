<?php

if(isset($_GET['ret'])){
    $ret = $_GET['ret'];
}

if(isset($ret)){
    switch($ret){
        case 1:
            echo '<div class="alert alert-success">Ação realizada com SUCESSO!</div>';
            break;
        
        case 0: 
            echo '<div class="alert alert-warning">Preencher todos os campos OBRIGATÓRIOS!</div>';
            break;

        case -1: 
            echo '<div class="alert alert-danger">Houve uma falha na Aplicação. Tente novamente mais tarde!</div>';
            break;

        case -2: 
            echo '<div class="alert alert-warning">A SENHA deve conter entre 6 e 8 caracteres!</div>';
            break;

        case -3: 
            echo '<div class="alert alert-warning">As SENHAS deverão ser IGUAIS!</div>';
            break;  
        
        case -4: 
            echo '<div class="alert alert-warning">O Registro não poderá ser excluído, pois está em uso!</div>';
            break;
            
        case -5: 
            echo '<div class="alert alert-warning">E-mail já Cadastrado. Digite um outro email!</div>';
            break; 

         case -6: 
            echo '<div class="alert alert-warning">Usuário não encontrado!</div>';
            break; 


    }
}