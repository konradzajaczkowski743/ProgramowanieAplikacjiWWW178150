<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$idp = isset($_GET['idp']) ? $_GET['idp'] : 'Glowna';

$allowed = ['Glowna','misjeKosmiczne','Astronauci','Technologie','Galeria','Autor','Filmy'];
$baseDir = __DIR__ . '/html/';
$defaultFile = $baseDir . 'Glowna.html';

if (in_array($idp, $allowed, true)) {
    $file = $baseDir . $idp . '.html';
    if (file_exists($file)) {
        $strona = $file;
    } else {
        $strona = $defaultFile;
        $idp = 'Glowna';
    }
} else {
    $strona = $defaultFile;
    $idp = 'Glowna';
}

/* przypisz odpowiedni plik CSS dla danej podstrony */
$styleMap = [
    'Glowna' => 'styleGlowna.css',
    'misjeKosmiczne' => 'styleMisje.css',
    'Astronauci' => 'styleAstronauci.css',
    'Technologie' => 'styleTechnologie.css',
    'Galeria' => 'styleGaleria.css',
    'Autor' => 'styleAutor.css',
    'Filmy' => 'styleFilmy.css'
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
            <li><a href="index.php?idp=Glowna">Strona główna</a></li>
            <li><a href="index.php?idp=misjeKosmiczne">Misje kosmiczne</a></li>
            <li><a href="index.php?idp=Astronauci">Astronauci</a></li>
            <li><a href="index.php?idp=Technologie">Technologie</a></li>
            <li><a href="index.php?idp=Galeria">Galeria</a></li>
            <li><a href="index.php?idp=Autor">O autorze</a></li>
            <li><a href="index.php?idp=Filmy">Filmy</a></li>
        </ul>
    </nav>
</header>

<main class="sekcjaGlowna">
    <div class="trescGlowna">
        <?php include($strona); ?>
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