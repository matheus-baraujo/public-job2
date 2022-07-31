<?php

    include 'connection.php';


    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $tipo = $_POST['tipo'];
    $local = $_POST['local'];
    $dia = $_POST['dia'];
    $mensagem = $_POST['mensagem'];

    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');

    $arquivo = "
    <html>
        <p><b>Nome: </b>$nome</p>
        <p><b>E-mail: </b>$email</p>
        <p><b>Telefone: </b>$telefone</p>
        <p><b>Local: </b>$local</p>
        <p><b>Data agendada: </b>$dia</p>
        <p><b>Mensagem: </b>$mensagem</p>
        <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
    ";

    //send email

    // destinatary email
    $emailenviar = ""; // ATENÇÃO!!!!!!!! ESTE EMAIL DEVE SER O EMAIL DA EMPRESA 
    $destino = $emailenviar;
    $assunto = "Agendamento pelo site para o dia ".$dia."";

    // formatting email to html

    $headers = "MIME-Version: 1.1\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: $nome <$email>\r\n"; // remetente
    $headers .= "Return-Path: $email\r\n"; // return-path
    $enviaremail = mail($destino, $assunto, $arquivo, $headers);


    // inserting in the database

    $localQuery = 'INSERT INTO agendamentos (nome, email, telefone, tipo, local, dia, mensagem) VALUES ("'.$nome.'", "'.$email.'", "'.$telefone.'", "'.$tipo.'", "'.$local.'", "'.$dia.'", "'.$mensagem.'")';


    //return
    if($enviaremail || $success = mysqli_query($conn, $localQuery)){
        header("location: index.php?page=contact&status=sucesso");
    }
    else{
        header("location: index.php?page=contact&status=falha");
    }