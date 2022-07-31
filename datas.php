<?php

include 'connection.php';

$datas = explode(", ",$_POST['datas']);
$type = $_POST['type'];

if($type == "desabilitar"){
    for($counter = 0; $counter < count($datas); $counter++){
        if(mysqli_query($conn, 'INSERT INTO datas (dia) VALUES ("'.$datas[$counter].'")')){
            header("location: index.php?page=loggedAdmin");
        }
    }

} elseif ($type == "habilitar") {
    for($counter = 0; $counter < count($datas); $counter++){
        if(mysqli_query($conn, 'DELETE FROM datas WHERE dia = "'.$datas[$counter].'"')){
            header("location: index.php?page=loggedAdmin");
        }
    }
    
}




