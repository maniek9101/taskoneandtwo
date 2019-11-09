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
            display:flex ;
            flex-direction:column;
            width:20rem;
            border:1px solid black;
            padding:1rem;
        }
    </style>
</head>
<body>
    <form method="GET">
        <label for="par1">Podaj wartość parametru w adresie URL</label>
        <input type="text" id="par1" name="par1">
        <input type="submit">
        <a href="index.php">Wróc do dodawania do bd</a>
    </form>
    <?php
        include_once 'data/dbinit.php';
        include_once 'model/model.php';
        $sqlcode = file_get_contents('data/dbcode.sql'); //get sql to create table in db

        if(isset($_GET['par1']))
        {
            $parametr = $_GET['par1'];
            
            $isdb->check_table_exist($sqlcode); // check table exist in db

            switch($parametr)
            {
                case 'prawda':
                    $list_by_name = $isdb->get_product_by_name();
                    $list_by_amount = $isdb->get_product_by_amount();
                    $isdb->close_connect();
                    //show
                    include 'view/view-list.php';
                    break;
                case 'nieprawda':
                    echo 'nieprawda';
                    break;
                default:
                    echo 'brak lub inny';
                    break;
            }
        }
    ?>
</body>
</html>