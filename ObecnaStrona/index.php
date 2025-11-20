<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include('cfg.php');
include('showpage.php');

$idp = isset($_GET['idp']) ? $_GET['idp'] : 1;


$styleMap = [
    1 => 'styleGlowna.css',
    2 => 'styleMisje.css',
    3 => 'styleAstronauci.css',
    4 => 'styleTechnologie.css',
    5 => 'styleFilmy.css',
    6 => 'styleGaleria.css',
    7 => 'styleAutor.css'
];

$style = isset($styleMap[$idp]) ? $styleMap[$idp] : 'styleGlowna.css';

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia lotów kosmicznych</title>
    <link rel="stylesheet" href="css/<?php echo $style; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="js/skrypty.js"></script>
</head>
<body onload="startclock()">
<script>
    if(localStorage.getItem("motyw") === "jasny" ) onload=toggleTheme();
</script>

<header class="naglowek">
    <div class="logo">
        <h1>Historia lotów kosmicznych</h1>
        <p>Poznaj tajemnice tego jak ludzie wlecieli do gwiazd</p>
    </div>
    <nav class="menu">
        <ul>
            <li><a href="index.php?idp=1">Strona główna</a></li>
            <li><a href="index.php?idp=2">Misje kosmiczne</a></li>
            <li><a href="index.php?idp=3">Astronauci</a></li>
            <li><a href="index.php?idp=4">Technologie</a></li>
            <li><a href="index.php?idp=5">Filmy</a></li>
            <li><a href="index.php?idp=6">Galeria</a></li>
            <li><a href="index.php?idp=7">O autorze</a></li>
        </ul>
    </nav>
</header>

<main class="sekcjaGlowna">
    <div class="trescGlowna">
        <?php
            if (isset($_GET['idp'])) {
                $idp = $_GET['idp'];
                echo PokazPodstrone($idp);
            } else {
                echo PokazPodstrone(1); // domyślna strona
        }
        ?>
    </div>
</main>

<footer class="stopka">
    Historia lotów kosmicznych  |  Konrad Zajączkowski  |  UWM ISI 3 III rok
    <br>
    <button class="przyciskMotyw" onclick="toggleTheme()">Zmień motyw</button>
</footer>

<?php
$nr_indeksu = '178150';
$nrGrupy = 'ISI3';
echo 'Autor: Konrad Zajączkowski '.$nr_indeksu.' grupa '.$nrGrupy.' <br /><br />';
?>
</body>
</html>