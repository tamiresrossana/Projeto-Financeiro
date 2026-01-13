<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/CategoriaDAO.php';

if (isset($_POST['btnSalvar'])) {
    $nomeCatg = trim($_POST['nomeCtg']);

    $objDAO = new CategoriaDAO();
    $ret = $objDAO->CadastrarCategoria($nomeCatg);
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
                        <h2>Cadastrar uma Nova Categoria Fianceira</h2>
                        <h5>Aqui você pode CADASTRAR suas categorias Financeiras. </h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_categoria.php" method="POST">
                    <div class="form-group">
                        <label>Digite o Nome da Categoria Financeira</label>
                        <input type="text" class="form-control" placeholder="Digite o Nome da Categoria aqui..." name="nomeCtg" id="nomeCtg" maxlength="35" />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return ValidarCategoria();">Salvar</button>
                </form>
            </div>



        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>