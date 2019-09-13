<?php

class Manager extends Conexao {

    // INSERÇÃO DE ALUNOS - Todas as pessoas cadastradas através da tela de Alunos possuem por padrão a flg_aluno = 1.
    public function insereAluno($nome, $cpf, $id_curso, $email, $flgProf, $id_titulo, $telefone, $tipo_tel){
        $query = "insert into 
        pessoas 
        (nome, cpf, flg_aluno, id_curso, email, flg_prof, id_titulo, telefone, tipo_tel) 
        values 
        ('{$nome}', '{$cpf}', 1, {$id_curso}, '{$email}', {$flgProf}, {$id_titulo}, '{$telefone}', '{$tipo_tel}')";

        mysqli_query(parent::get_connect(), $query);
    }

    // INSERÇÃO DE PROFESSORES - Todas as pessoas cadastradas através da tela de Professores possuem por padrão a flg_prof = 1.
    public function insereProfessor($nome, $cpf, $id_titulo, $email, $flgAluno, $id_curso, $telefone, $tipo_tel){
        $query = "insert into 
        pessoas 
        (nome, cpf, flg_aluno, id_curso, email, flg_prof, id_titulo, telefone, tipo_tel) 
        values 
        ('{$nome}', '{$cpf}', {$flgAluno}, {$id_curso}, '{$email}', 1, {$id_titulo}, '{$telefone}', '{$tipo_tel}')";

        mysqli_query(parent::get_connect(), $query);
    }

    // EDIÇÃO DE ALUNOS
    public function alteraAluno($id, $nome, $id_curso, $email, $flgProf, $id_titulo, $telefone, $tipo_tel){
        $query = "update pessoas set 
        nome = '{$nome}', 
        id_curso = {$id_curso}, 
        email = '{$email}', 
        flg_prof = {$flgProf}, 
        id_titulo = {$id_titulo},
        telefone = '{$telefone}', 
        tipo_tel = '{$tipo_tel}' 
        where id = {$id}";

        mysqli_query(parent::get_connect(), $query);
    }

    // EDIÇÃO DE PROFESSORES
    public function alteraProfessor($id, $nome, $id_titulo, $email, $flgAluno, $id_curso, $telefone, $tipo_tel){
        $query = "update pessoas set 
        nome = '{$nome}', 
        id_titulo = {$id_titulo}, 
        email = '{$email}', 
        flg_aluno = {$flgAluno}, 
        id_curso = {$id_curso},
        telefone = '{$telefone}', 
        tipo_tel = '{$tipo_tel}' 
        where id = {$id}";

        mysqli_query(parent::get_connect(), $query);
    }

    // EXCLUSÃO DE ALUNOS/PROFESSORES
    public function remover($id){
        $query = "delete from pessoas where id = {$id}";
        mysqli_query(parent::get_connect(), $query);
    }

    // Popula a tabela da página index.php
    public function listaAlunos(){
        $query = "select p.*, c.nm_curso as nome_curso, t.nm_titulo as nome_titulo
        from pessoas as p 
        join cursos as c on p.id_curso = c.id_curso 
        left join titulos as t on p.id_titulo = t.id_titulo
        where flg_aluno = 1";

        return mysqli_query(parent::get_connect(), $query);
    }

    // Popula a tabela da página telaProfessor.php
    public function listaProfessores(){
        $query = "select p.*, t.nm_titulo as nome_titulo, c.nm_curso as nome_curso
        from pessoas as p 
        join titulos as t on p.id_titulo = t.id_titulo
        left join cursos as c on p.id_curso = c.id_curso 
        where flg_prof = 1";

        return mysqli_query(parent::get_connect(), $query);
    }

    public function listaCursos(){
        $query = "select * from cursos";
        return mysqli_query(parent::get_connect(), $query); 
    }

    public function listaTitulos(){
        $query = "select * from titulos";
        return mysqli_query(parent::get_connect(), $query);
    }

    // Verifica se já existem alguém com o mesmo CPF
    public function consultaCpf($cpf){
        $query = "select * from pessoas where cpf = '{$cpf}'";
        return mysqli_query(parent::get_connect(), $query);
    }

    public function consultaInfo($id){
        $query = "select * from pessoas where id = {$id}";
        return mysqli_query(parent::get_connect(), $query);
    }

    // traz o resultado da pesquisa
    public function pesquisar($id){   
        $query = "select p.*, c.nm_curso as nome_curso, t.nm_titulo as nome_titulo
        from pessoas as p 
        left join cursos as c on p.id_curso = c.id_curso 
        left join titulos as t on p.id_titulo = t.id_titulo
        where id = {$id}";

        return mysqli_query(parent::get_connect(), $query);
    }
}
?>