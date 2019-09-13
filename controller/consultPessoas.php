<?php

    include_once '../model/Conexao.php';
    include_once '../model/Manager.php';

    $manager = new Manager();

    $id = $_POST['id'];
    $currentPage = $_POST['currentPage'];

    $resultadoPesquisa = $manager->consultaInfo($id);

    header("Location: ../view/resultadoPesquisa.php");
?>