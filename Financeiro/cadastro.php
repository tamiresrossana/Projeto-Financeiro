<?php

    require_once '../DAO/UsuarioDAO.php';

    if(isset($_POST['btnCadastrar'])){
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);
        $repSenha = trim($_POST['repSenha']);

        $objDAO = new UsuarioDAO();
        $ret = $objDAO->CadastrarUsuario($nome, $email, $senha, $repSenha);
    }


?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';
?>

<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br />
                <br />
                <h2>Cadastre uma Conta</h2>
                <h5>(Faça o Cadastro de sua conta aqui)</h5>
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Preencher com os dados solicitados</strong>
                    </div>
                    <div class="panel-body">
                        <?php include_once '_msg.php' ?>
                        <br/>
                        <form action="cadastro.php" method="POST" role="form">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
                                <input type="text" class="form-control" placeholder="Digite seu Nome aqui" name="nome"  id="nome" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" placeholder="Digite seu email aqui..." name="email" id="email" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Crie uma senha (mínimo 6 caracteres)"  name="senha" id="senha"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Repita a senha criada" name="repSenha" id="repSenha" />
                            </div>
                            <button type="submit" class="btn btn-success" name="btnCadastrar" onclick="return ValidarCadastro();">Finalizar Cadastro</button>
                        </form>
                        <hr/>
                        <span>Já possui cadastro? </span> <a href="login.php">Clique aqui</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>