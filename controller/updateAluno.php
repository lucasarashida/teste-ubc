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
        $id_curso = $_POST['curso'];
        $email = $_POST['email'];

        // se o checkbox 'Tambem sou Professor' foi marcado, seta flgProf = 1 e atribui o ID do titulo
        if(array_key_exists('flgProf', $_POST)){
            $flgProf = 1;
            $id_titulo = $_POST['titulo'];
        }
        else {
            $flgProf = 0;
            $id_titulo = 0;
        }
        
        if(array_key_exists('telefone', $_POST)){
            $telefones = $_POST['telefone'];
            $tipo_tel = $_POST['tipo_tel'];
        } 
        else { // se não houver registro, seta telefones e tipo_tel em branco
            $telefones = "";
            $tipo_tel = "";
        }

        $manager->alteraAluno($id, $nome, $id_curso, $email, $flgProf, $id_titulo, $telefones, $tipo_tel);

        echo '<script>
            swal({
                text: "Alterado com sucesso!",
                icon: "success"
            }).then(function() {
               window.location = "../index.php";
            });
            </script>';?>

        <!-- JavaScript Opcional -->
        <?php include '../view/scriptFooter.php' ?>
    </body>
</html>