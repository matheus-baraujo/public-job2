<?php

session_start();

if(isset($_SESSION['login'])){

    include 'connection.php';

    $title = $_POST['titulo'];
    $text = $_POST['texto'];
    $data = $_POST['data'];
    $categoria = $_POST['categoria'];

    if($_FILES['imagem']['size'] == 0){

        $query = 'UPDATE posts SET title = "'.$title.'", texto = "'.$text.'" WHERE id_post = '.$id.'';

    }else{

        $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
        $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = './post/'; //Diretório para uploads
    
        move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

        $current_imagem = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM posts WHERE id_posts = '.$id.''));
        unlink($current_cover['imagem']);

        $query = 'UPDATE posts SET titulo = "'.$title.'", imagem = "'.$dir.$new_name.'", texto = "'.$text.'", id_categoria = '.$categoria.' WHERE id_posts = '.$id.'';
            
    }

    if ($success = mysqli_query($conn, $query)) {
        header('location: index.php?page=loggedAdmin&status=sucesso');
    }else{
        header('location: index.php?page=loggedAdmin&status=erro');
    }

}