<?php

    include_once '../model/Conexao.php';
    include_once '../model/Manager.php';

    $manager = new Manager();

    $id = $_POST['id'];
    $currentPage = $_POST['currentPage'];

    $manager->remover($id);

    if($currentPage=='index.php')
        header("Location: ../index.php?removido=true");
    else {
        header("Location: ../view/telaProfessor.php?removido=true");
    }
?>