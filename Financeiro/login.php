<?php

    require_once '../DAO/UsuarioDAO.php';

    if(isset($_POST['btnAcessar'])){
        $email = trim($_POST['emailUsuario']);
        $senha = trim($_POST['senha']);

        $objDAO = new UsuarioDAO();
        $ret = $objDAO->ValidarLogin($email, $senha);
    }



?>







<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';
?>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Intranet Controle Financeiro</h2>
                <h5>(Faça seu login de acesso aqui)</h5>
                <br />
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Entre com seus dados </strong>
                    </div>
                    <div class="panel-body">
                        <?php include_once '_msg.php'; ?>
                        <form action="login.php" method="POST"  role="form">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="email" class="form-control" placeholder="Seu e-mail " name="emailUsuario" id="emailUsuario" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Sua senha" name="senha" id="senha" />
                            </div>
                            <button type="submit" class="btn btn-primary" name="btnAcessar" onclick="return ValidarLogin();">Acessar</button>
                            <hr/>
                            <span>Caso não tenha cadastro,</span> <a href="cadastro.php">clique aqui </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>