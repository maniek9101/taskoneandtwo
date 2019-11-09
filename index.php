<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form
        {
            display:flex;
            flex-direction:column;
            width:20rem;
            border:1px solid black;
            padding:1rem;
        }
    </style>
</head>
<body>
    <form action="dodaj.php" method="POST">
        <label for="nazwa_produktu">Nazwa produktu:</label>
        <input type="text" name="nazwa_produktu" id="nazwa_produktu" required>
        <label for="producent">Producent:</label>
        <input type="text" name="producent" id="producent"required>
        <label for="ilosc">Ilość:</label>
        <input type="number" min="0" step="1" name="ilosc" id="ilosc" required>
        <input type="submit" value="dodaj do bd">
        <a href="tabela.php">Idź do wyświetlenia tabeli</a>
    </form>
    <?php
        include_once 'data/dbinit.php';
        include_once 'model/model.php';
        session_start();

        $sqlcode = file_get_contents('data/dbcode.sql'); //get sql to create table in db

        $isdb->check_table_exist($sqlcode); // check table exist in db
        $isdb->close_connect();

        if(isset($_SESSION['info']))
        {
            echo $_SESSION['info'];
            unset($_SESSION['info']);
        }
        
    ?>
</body>
</html>