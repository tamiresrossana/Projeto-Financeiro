<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/EmpresaDAO.php';

if (isset($_POST['btnSalvar'])) {
    $nomeEmp = trim($_POST['nomeEmp']);
    $telefone = trim($_POST['tele']);
    $endereco = trim($_POST['local']);



    $objDAO = new EmpresaDAO();
    $ret = $objDAO->CadastrarEmpresa($nomeEmp, $telefone, $endereco);
}



?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>


<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Cadastrar uma Nova Empresa</h2>
                        <h5>Aqui você poderá CADASTRAR suas empresas. </h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <form action="nova_empresa.php" method="POST">
                    <div class="form-group">
                        <label>Digite o Nome da Empresa:</label>
                        <input class="form-control" placeholder="Digite o Nome da Empresa aqui..." name="nomeEmp" id="nomeEmp" />
                    </div>
                    <div class="form-group">
                        <label>Digite o Telefone (WhatsApp):</label>
                        <input class="form-control" placeholder="Digite o Telefone aqui..." name="tele" id="tele" />
                    </div>
                    <div class="form-group">
                        <label>Digite o Endereço da Empresa:</label>
                        <input class="form-control" placeholder="Digite o Endereço aqui... " name="local" id="local" />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnSalvar" onclick="ValidarEmpresa();">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>