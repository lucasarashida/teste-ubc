<?php 
    include_once '../model/Conexao.php';
    include_once '../model/Manager.php';

    $manager = new Manager();

    $id = $_POST['idPesquisa'];
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <?php include_once 'head.php' ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">
            <img src="https://brazcubas.br/wp-content/uploads/2019/02/logo_educacao_colorido-2.svg" width="200" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <p>&nbsp;</p>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-10">
                        <h1>Resultado da pesquisa</h1>
                    </div>
                    <div class="col-2 text-right">
                        <a href="../index.php" class="btn btn-primary">
                            <span>Voltar</span>
                        </a>
                    </div>
                </div>
                
                <?php $resultadoPesquisa = $manager->pesquisar($id);;
                // Se houver registro nesse id, liste-o
                if(mysqli_num_rows($resultadoPesquisa) > 0){ ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Cód.</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Aluno</th>
                                <th scope="col">Curso</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Professor</th>
                                <th scope="col">Título</th>
                                <th scope="col" colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($resultadoPesquisa as $resultado) : ?>
                            <tr>
                                <td><?php echo $resultado['id']; ?></th>
                                <td><?php echo $resultado['nome']; ?></td>
                                <td><?php echo $resultado['cpf']; ?></td>
                                <td><?php if($resultado['flg_aluno']==1){
                                    echo 'Sim';
                                } else {
                                    echo 'Não';
                                }
                                ?></td>
                                <td><?php echo $resultado['nome_curso']; ?></td>
                                <td><?php echo $resultado['email']; ?></td>
                                <td><?php if($resultado['telefone']==""){
                                    echo '-';
                                } else {
                                    echo $resultado['telefone'];
                                } ?></td>
                                <td><?php if($resultado['flg_prof']==1){
                                    echo 'Sim';
                                } else {
                                    echo 'Não';
                                }
                                ?></td>
                                <td><?php if($resultado['id_titulo']==0){
                                    echo '-';
                                } else {
                                    echo $resultado['nome_titulo'];
                                } ?></td>
                                <td>
                                    <?php if($resultado['flg_aluno']==1){ // Se o registro pertence a um aluno, o formulário de edição será o de aluno ?> 
                                    <form action="editarAluno.php" method="POST">
                                    <?php } else { ?>
                                    <form action="editarProfessor.php" method="POST">
                                    <?php } ?>
                                        <input type="hidden" name="id" value="<?=$resultado['id']?>"> <!-- Pega o ID do Aluno ou Professor para usá-lo na página de edição -->
                                        <button type="submit" class="btn btn-primary"><span class="oi oi-pencil" title="Editar" aria-hidden="true"></span></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="../controller/deletePessoas.php" method="POST" onclick="return confirm('Tem certeza que deseja excluir?');">
                                        <input type="hidden" name="id" value="<?=$resultado['id']?>"> <!-- Pega o ID do Aluno ou Professor para usá-lo na exclusão -->
                                        <input type="hidden" name="currentPage" value="<?=basename(__FILE__)?>">
                                        <button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach;
                            } else { ?>
                                <div class="col">
                                    <hr>
                                    <h2>Não há registro com esse código.</h2>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Opcional -->
    <?php include 'scriptFooter.php' ?>

</body>

</html>