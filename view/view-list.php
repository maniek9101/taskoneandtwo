<?php 
if($list_by_name->num_rows<=0)
{   
    echo 'Brak danych';
    die(); 
}
?> 
<p>Posortowane ze względu na nazwe produktu:</p><br>

<?php foreach ($list_by_name as $row): ?>
    <li>Nazwa Produktu: <?= $row['nazwa_produktu'] ?> - Producent: <?= $row['producent'] ?> - Ilość:  <?= $row['ilosc'] ?></li>
<?php endforeach ?>

<p>Posortowane ze względu na ilość:</p><br>

<?php foreach ($list_by_amount as $row): ?>
    <li>Nazwa Produktu: <?= $row['nazwa_produktu'] ?> - Producent: <?= $row['producent'] ?> - Ilość:  <?= $row['ilosc'] ?></li>
<?php endforeach ?>