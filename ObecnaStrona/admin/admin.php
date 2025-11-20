<?php
include("..\cfg.php");

function FormularzLogowania() {
        $wynik = '
    <div class="logowanie">
        <h1 class="heading">Panel CMS:</h1>
        <form method="post" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
            <table class="logowanie">
                <tr><td class="log4_t">[email]</td>
                    <td><input type="text" name="login_email" /></td></tr>
                <tr><td class="log4_t">[hasło]</td>
                    <td><input type="password" name="login_pass" /></td></tr>
                <tr><td>&nbsp;</td>
                    <td><input type="submit" name="x1_submit" value="Zaloguj" /></td></tr>
            </table>
        </form>
    </div>';
        return $wynik;
}


function ListaPodstron() {
    global $conn;

    $query = "SELECT * FROM page_list ORDER BY id ASC LIMIT 100";
    $result = mysqli_query($conn, $query);

    echo "<h2>Lista podstron</h2>";

    while ($row = mysqli_fetch_array($result)) {
        echo $row['id']." — ".$row['tytul'].
            " <a href='admin.php?akcja=edytuj&id=".$row['id']."'>edytuj</a>".
            " <a href='admin.php?akcja=usun&id=".$row['id']."'>usuń</a><br>";
    }
}

function EdytujPodstrone($id) {
    global $link;

    $id = intval($id);
    $query = "SELECT * FROM page_list WHERE id=$id LIMIT 1";
    $result = mysqli_query($link, $query);
    $page = mysqli_fetch_assoc($result);

    echo "
        <h2>Edytuj podstronę</h2>
        <form method='post'>
            <label>Tytuł:</label><br>
            <input type='text' name='title' value='".$page['page_title']."'><br><br>

            <label>Treść:</label><br>
            <textarea name='content' rows='10' cols='60'>".$page['page_content']."</textarea><br><br>

            <label>Aktywna?</label>
            <input type='checkbox' name='status' ".($page['status']==1 ? 'checked' : '')."><br><br>

            <input type='submit' name='zapisz' value='Zapisz zmiany'>
        </form>
    ";

    if(isset($_POST['zapisz'])) {
        $title = mysqli_real_escape_string($link, $_POST['title']);
        $content = mysqli_real_escape_string($link, $_POST['content']);
        $status = isset($_POST['status']) ? 1 : 0;

        $update = "UPDATE page_list SET 
            page_title='$title', 
            page_content='$content', 
            status='$status' 
        WHERE id=$id LIMIT 1";

        mysqli_query($link, $update);

        echo "<br><b>Zapisano zmiany</b><br>";
    }
}

function DodajNowaPodstrone() {
    global $link;

    echo "
        <h2>Dodaj nową podstronę</h2>
        <form method='post'>
            <label>Tytuł:</label><br>
            <input type='text' name='title'><br><br>

            <label>Treść:</label><br>
            <textarea name='content' rows='10' cols='60'></textarea><br><br>

            <label>Aktywna?</label>
            <input type='checkbox' name='status'><br><br>

            <input type='submit' name='dodaj' value='Dodaj stronę'>
        </form>
    ";

    if(isset($_POST['dodaj'])) {
        $title = mysqli_real_escape_string($link, $_POST['title']);
        $content = mysqli_real_escape_string($link, $_POST['content']);
        $status = isset($_POST['status']) ? 1 : 0;

        $insert = "INSERT INTO page_list (page_title, page_content, status) 
                   VALUES ('$title', '$content', '$status')";

        mysqli_query($link, $insert);

        echo "<br><b>Dodano nową podstronę</b><br>";
    }
}

function UsunPodstrone($id) {
    global $link;

    $id = intval($id);

    $delete = "DELETE FROM page_list WHERE id=$id LIMIT 1";
    mysqli_query($link, $delete);

    echo "<b>Podstrona została usunięta</b><br>";
}

if(!isset($_SESSION['logged'])) $_SESSION['logged'] = false;

if(isset($_POST['zaloguj'])) {
    if($_POST['login'] === $login && $_POST['pass'] === $pass) {
        $_SESSION['logged'] = true;
    } else {
        echo "<b>BŁĘDNY LOGIN LUB HASŁO</b><br><br>";
        FormularzLogowania();
        exit;
    }
}

if(!$_SESSION['logged']) {
    FormularzLogowania();
    exit;
}


echo "<h1>Panel administratora</h1>";
echo "<a href='admin.php'>Lista podstron</a> | ";
echo "<a href='admin.php?add=1'>Dodaj nową</a> | ";
echo "<a href='admin.php?logout=1'>Wyloguj</a><br><br>";

if(isset($_GET['logout'])) {
    $_SESSION['logged'] = false;
    header("Location: admin.php");
}

if(isset($_GET['edit'])) {
    EdytujPodstrone($_GET['edit']);
} elseif(isset($_GET['delete'])) {
    UsunPodstrone($_GET['delete']);
} elseif(isset($_GET['add'])) {
    DodajNowaPodstrone();
} else {
    ListaPodstron();
}

?>
