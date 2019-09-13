<?php 
include_once '../model/Conexao.php';
include_once '../model/Manager.php';
$manager = new Manager();
$id = $_POST['id'];
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <?php include_once 'head.php';
          include_once 'templateTel.php';?>

    <!-- Template para quando houver um telefone já vinculado ao Professor -->
    <template id="editaTelefone"> 
        <?php foreach($manager->consultaInfo($id) as $tel_info) : ?>
        <div class="form-group">
            <label for="telefone" class="sr-only">Telefone</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id=""><?=$tel_info['tipo_tel']?></span>
                </div>
                <input type="hidden" name="tipo_tel" value="{{tipoTelefone}}">
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite um telefone" value="<?=$tel_info['telefone']?>">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger removerTelefone"><span class="oi oi-minus"></span></button>
                </div>
            </div>
            <small id="phoneHelp" class="form-text text-muted">Não compartilhe esse telefone com nínguem.</small>
        </div>
        <?php endforeach; ?>
    </template>
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
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Alunos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="professores.html">Professores</a>
                </li>
            </ul>
        </div>
    </nav>
    <p>&nbsp;</p>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Editar Professor</h1>
            </div>
            <div class="col-12">
                <form method="POST" action="../controller/updateProfessor.php">
                    <?php foreach($manager->consultaInfo($id) as $prof_info) : ?>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?=$prof_info['nome']?>" placeholder="Digite um nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?=$prof_info['cpf']?>" placeholder="Digite um CPF" disabled>
                    </div>
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <select type="text" class="form-control" id="titulo" name="titulo" required>
                            <?php foreach ($manager->listaTitulos() as $titulo) : 
                                    $tituloAtual = $prof_info['id_titulo'] == $titulo['id_titulo'];
                                    $selecionado = $tituloAtual ? 'selected="selected"' : ''; ?>
                                    <option value="<?=$titulo['id_titulo']?>" <?=$selecionado?>><?=$titulo['nm_titulo']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$prof_info['email']?>" aria-describedby="emailHelp" 
                            placeholder="Digite um e-mail" required>
                        <small id="emailHelp" class="form-text text-muted">Não compartilhe esse e-mail com
                            nínguem.</small>
                    </div>
                    <div class="form-group">
                        <label for="flgAluno">Também sou Aluno</label>
                        <?php $flg_aluno = $prof_info['flg_aluno'] ? 'checked="checked"' : ''; ?>
                        <input type="checkbox" id="flgAluno" name="flgAluno" value="true" <?=$flg_aluno?>>
                    </div>
                    <div class="form-group" id="showCurso">
                        <label for="curso">Curso</label>
                        <select type="text" class="form-control" id="curso" name="curso">
                            <option value="">Selecione um Curso</option>
                            <?php foreach ($manager->listaCursos() as $curso) : 
                                    $cursoAtual = $prof_info['id_curso'] == $curso['id_curso'];
                                    $selecionado = $cursoAtual ? 'selected="selected"' : ''; ?>
                                <option value="<?=$curso['id_curso']?>" <?=$selecionado?>><?=$curso['nm_curso']?></option>
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
                                    <!-- Se existir um telefone salvo, adiciona essa âncora para ativar a function que simulará um click nela -->
                                    <?php if($prof_info['telefone']){?>
                                        <a id="showTel" class="dropdown-item editaTel" href="#" style="display:none"><?=$prof_info['tipo_tel']?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="telefones">
                        <small>Utilize o <span class="oi oi-plus"></span> para adicionar mais telefones.</small>
                    </div>
                    <?php endforeach; ?>
                    <input type="hidden" name="id" value="<?=$id?>"> <!-- Enviando o ID do aluno para montar a query de edição -->
                    <a href="telaProfessor.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- JavaScript Opcional -->
    <?php include 'scriptFooter.php' ?>
    
</body>

</html>