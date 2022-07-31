<?php

session_start();

if(isset($_SESSION['login'])){

    include 'connection.php';


    $tipo = $_GET['type'];

    switch ($tipo) {

        case 'categoria':
            $id = $_GET['id'];

            $query = 'DELETE FROM categorias_posts WHERE id_categoria ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin');
            }
            break;
        
        case 'post':
            $id = $_GET['id'];

            $item = mysqli_query($conn, 'SELECT * FROM posts WHERE id_posts= '.$id.'');
            $item2 = mysqli_fetch_array($item);
            unlink($item2['imagem']);

            $query = 'DELETE FROM posts WHERE id_posts ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin');
            }
            break;

        case 'agendamento':
            $id = $_GET['id'];

            $query = 'DELETE FROM agendamentos WHERE id_agendamentos ='.$id.'';
            
            if (mysqli_query($conn, $query)) {
                header('location: index.php?page=loggedAdmin');
            }
            break;
    
        default:
            header('location: index.php?i=loggedAdmin');
            break;
    }

}