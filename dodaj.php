<?php
    include_once 'data/dbinit.php';
    include_once 'model/model.php';
    session_start();

    if(empty($_POST['nazwa_produktu']) || empty($_POST['producent']) || empty($_POST['ilosc']) || !ctype_digit($_POST['ilosc']))
    {
        //prevent from direct enter to tabela.php and undesirable value
        header('Location: index.php');
        die();
    }

    $isdb = new dbModel($db);
    $isdb -> add_to_db();  
    $isdb -> close_connect();
    
    $_SESSION['info'] = 'Dodano produkt do BD';
?>