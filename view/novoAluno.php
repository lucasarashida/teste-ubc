<?php 
include_once '../model/Conexao.php';
include_once '../model/Manager.php';
$manager = new Manager();
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <?php include_once 'head.php' ?>
    <?php include_once 'templateTel.php' ?>
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

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Alunos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="telaProfessor.php">Professores</a>
                </li>
            </ul>
        </div>
    </nav>
    <p>&nbsp;</p>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Novo Aluno</h1>
            </div>
            <div class="col-12">
                <form method="POST" action="../controller/insertAluno.php">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite um nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite um CPF" required>
                    </div>
                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <select type="text" class="form-control" id="curso" name="curso" required>
                            <option value="">Selecione um Curso</option>
                            <?php foreach ($manager->listaCursos() as $curso) : ?>
                                <option value="<?=$curso['id_curso']?>"><?=$curso['nm_curso']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                            placeholder="Digite um e-mail" required>
                        <small id="emailHelp" class="form-text text-muted">Não compartilhe esse e-mail com
                            nínguem.</small>
                    </div>
                    <div class="form-group">
                        <label for="flgProf">Também sou Professor</label>
                        <input type="checkbox" id="flgProf" name="flgProf" value="true">
                    </div>
                    <div class="form-group" id="showTitulo">
                        <label for="titulo">Título</label>
                        <select type="text" class="form-control" id="titulo" name="titulo">
                            <option value="" disabled selected>Selecione um Título</option>
                            <?php foreach ($manager->listaTitulos() as $titulo) : ?>
                                <option value="<?=$titulo['id_titulo']?>"><?=$titulo['nm_titulo']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-10"><h2>Telefones</h2></div>
                        <div class="col-2 text-right">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="oi oi-plus"></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item addTel" href="#">Residencial</a>
                                    <a class="dropdown-item addTel" href="#">Celular</a>
                                    <a class="dropdown-item addTel" href="#">Outro</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="telefones">
                        <small>Utilize o <span class="oi oi-plus"></span> para adicionar mais telefones.</small>
                    </div>

                    <a href="../index.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- JavaScript Opcional -->
    <?php include 'scriptFooter.php' ?>

</body>

</html>