<?php
$nr_indeksu = '178150';
$nrGrupy = '3';

echo 'Jan Kowalski ' . $nr_indeksu . ' grupa ' . $nrGrupy . '<br /><br />';
echo 'Zastosowanie metody include() <br />';

echo '<b>b) Warunki if, else, elseif, switch</b><br />';

$ocena = 4;

if ($ocena == 5) {
    echo 'Ocena bardzo dobra<br />';
} elseif ($ocena == 4) {
    echo 'Ocena dobra<br />';
} else {
    echo 'Inna ocena<br />';
}

$kolor = 'zielony';
switch ($kolor) {
    case 'czerwony':
        echo 'Kolor to czerwony<br />';
        break;
    case 'zielony':
        echo 'Kolor to zielony<br />';
        break;
    default:
        echo 'Nieznany kolor<br />';
}
echo '<br />';

echo '<b>c) Pętla while() i for()</b><br />';

echo 'Pętla while:<br />';
$i = 1;
while ($i <= 3) {
    echo 'Licznik while: ' . $i . '<br />';
    $i++;
}

echo '<br />Pętla for:<br />';
for ($j = 1; $j <= 3; $j++) {
    echo 'Licznik for: ' . $j . '<br />';
}
echo '<br />';

echo '<b>d) Typy zmiennych $_GET, $_POST, $_SESSION</b><br />';

session_start();

if (isset($_GET['imie'])) {
    echo 'Wartość z $_GET: ' . $_GET['imie'] . '<br />';
} else {
    echo 'Brak wartości w $_GET<br />';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'Wartość z $_POST: ' . $_POST['nazwisko'] . '<br />';
} else {
    echo 'Brak danych z POST (wyślij formularz poniżej)<br />';
}

$_SESSION['uzytkownik'] = 'Janek';
echo 'Wartość z $_SESSION: ' . $_SESSION['uzytkownik'] . '<br /><br />';


?>
<form method="post">
    <input type="text" name="nazwisko" placeholder="Podaj nazwisko">
    <input type="submit" value="Wyślij">
</form>
