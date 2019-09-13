<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php

        include_once '../model/Conexao.php';
        include_once '../model/Manager.php';

        $manager = new Manager();

        $id = $_POST['id'];
        $nome = $_POST['nome']; 
        $id_titulo = $_POST['titulo'];
        $email = $_POST['email'];

        // se o checkbox 'Tambem sou Aluno' foi marcado, seta flgAluno = 1 e atribui o ID do curso
        if(array_key_exists('flgAluno', $_POST)){
            $flgAluno = 1;
            $id_curso = $_POST['curso'];
        }
        else {
            $flgAluno = 0;
            $id_curso = 0;
        }

        if(array_key_exists('telefone', $_POST)){
            $telefones = $_POST['telefone'];
            $tipo_tel = $_POST['tipo_tel'];
        } 
        else { // se não houver registro, seta telefones e tipo_tel em branco
            $telefones = "";
            $tipo_tel = "";
        }

        $manager->alteraProfessor($id, $nome, $id_titulo, $email, $flgAluno, $id_curso, $telefones, $tipo_tel);

        echo '<script>
            swal({
                text: "Alterado com sucesso!",
                icon: "success"
            }).then(function() {
               window.location = "../view/telaProfessor.php";
            });
            </script>';?>

        <!-- JavaScript Opcional -->
        <?php include '../view/scriptFooter.php' ?>
    </body>
</html>