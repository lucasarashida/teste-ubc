<?php 
    include_once 'model/Conexao.php';
    include_once 'model/Manager.php';

    $manager = new Manager();
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <?php include_once 'view/head.php' ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://brazcubas.br/wp-content/uploads/2019/02/logo_educacao_colorido-2.svg" width="200" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Alunos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view/telaProfessor.php">Professores</a>
                </li>
            </ul>
        </div>
    </nav>
    <p>&nbsp;</p>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h1>Alunos</h1>
                    </div>
                    <div class="col-4 text-right">
                        <form action="view/resultadoPesquisa.php" method="POST">
                            <label for="idPesquisa">Consulte aluno ou professor pelo código</label>
                            <input type="text" name="idPesquisa" id="idPesquisa">
                            <button type="submit" class="btn btn-success"><span class="oi oi-magnifying-glass"></span></button>
                        </form>
                    </div>
                    <div class="col-2 text-right">
                        <a href="view/novoAluno.php" class="btn btn-primary">
                            <span class="oi oi-plus"></span>
                        </a>
                    </div>
                </div>
                
                <?php $consultaAlunos = $manager->listaAlunos();
                // Ao carregar a index. Se houver registro de Alunos, liste-os
                if(mysqli_num_rows($consultaAlunos) > 0){ ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Cód.</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Curso</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Professor</th>
                                <th scope="col">Título</th>
                                <th scope="col" colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($consultaAlunos as $aluno) : ?>
                            <tr>
                                <td><?php echo $aluno['id']; ?></th>
                                <td><?php echo $aluno['nome']; ?></td>
                                <td><?php echo $aluno['cpf']; ?></td>
                                <td><?php echo $aluno['nome_curso']; ?></td>
                                <td><?php echo $aluno['email']; ?></td>
                                <td><?php if($aluno['telefone']==""){
                                    echo '-';
                                } else {
                                    echo $aluno['telefone'];
                                } ?></td>
                                <td><?php if($aluno['flg_prof']==1){
                                    echo 'Sim';
                                } else {
                                    echo 'Não';
                                }
                                ?></td>
                                <td><?php if($aluno['id_titulo']==0){
                                    echo '-';
                                } else {
                                    echo $aluno['nome_titulo'];
                                } ?></td>
                                <td>
                                    <form action="view/editarAluno.php" method="POST">
                                        <input type="hidden" name="id" value="<?=$aluno['id']?>"> <!-- Pega o ID do Aluno para usá-lo na página de edição -->
                                        <button type="submit" class="btn btn-primary"><span class="oi oi-pencil" title="Editar" aria-hidden="true"></span></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="controller/deletePessoas.php" method="POST" onclick="return confirm('Tem certeza que deseja excluir?');">
                                        <input type="hidden" name="id" value="<?=$aluno['id']?>"> <!-- Pega o ID do Aluno para usá-lo na exclusão -->
                                        <input type="hidden" name="currentPage" value="<?=basename(__FILE__)?>">
                                        <button type="submit" class="btn btn-danger"><span class="oi oi-trash"></span></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach;
                            } else { ?>
                                <div class="col">
                                    <hr>
                                    <h2>Não há alunos cadastrados.</h2>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Opcional -->
    <?php include 'view/scriptFooter.php' ?>

</body>

</html>