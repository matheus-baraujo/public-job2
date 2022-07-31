<?php

session_start();

if(isset($_SESSION['login'])){

    include 'connection.php';

    switch ($tipo = $_POST['type']) {
        case 'post':
            $title = $_POST['titulo'];
            $text = $_POST['texto'];
            $imagem = $_FILES['imagem'];
            $data = $_POST['data'];
            $categoria = $_POST['categoria'];

            $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './posts/'; //Diretório para uploads

            move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

            $query = 'INSERT INTO posts (titulo, imagem, texto, dia, id_categoria) VALUES ("'.$title.'","'.$dir.$new_name.'","'.$text.'","'.$data.'", '.$categoria.')';

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }


            break;
        
        case 'categoria':
            $categoria = $_POST['categoria'];

            $query = 'INSERT INTO categorias_posts (categoria) VALUES ("'.$categoria.'")';

            if ($success = mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin&status=sucesso');
            }else{
                header('location: index.php?page=loggedAdmin&status=erro');
            }


            break;
        
        default:
            # code...
            break;
    }
    
    

}else {
    header('location: index.php?page=admin');
}