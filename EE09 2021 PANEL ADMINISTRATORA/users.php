<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header><h3>Portal Społecznościowy - panel administratora</h3></header>
    <main>
        <div id="lewy">
            <h3>Użytkownicy</h3>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'dane4');

            $sql = "SELECT id, imie, nazwisko, (2021-rok_urodzenia) as wiek FROM OSOBY limit 30";
            $result = mysqli_query($conn, $sql);
            while($w = mysqli_fetch_array($result)){
                echo $w['id'] . '. ' .  $w['imie'] . ' ' . $w['nazwisko'] . ' ' . $w['wiek'] . '<br>';
            }
            $conn -> close();
            ?>
            <a href="settings.html">Inne ustawienia</a>
        </div>
        <div id="prawy">
            <h4>Podaj id użytkownika</h4>
            <form action="" method="POST">
                <input type="number" name="idosoby" id="idosoby">
                <input type="submit" value="ZOBACZ" class="button">
            </form>
            <hr>
            <?php
                $conn = new mysqli('localhost', 'root', '', 'dane4');
                if(isset($_POST['idosoby'])){
                    $id = $_POST['idosoby'];
                    $sql = "SELECT osoby.id, imie, nazwisko, rok_urodzenia, opis, hobby.nazwa, zdjecie FROM OSOBY, hobby where osoby.id=$id and Hobby_id = hobby.id";
                    $result = mysqli_query($conn, $sql);
                    while($w = mysqli_fetch_array($result)){
                        echo '<h2>' . $id . '. ' .  $w['imie'] . ' ' . $w['nazwisko'] . ' ' . '</h2><br>';
                        echo '<img width="100px" height="100px" src=' . $w['zdjecie'] . ' alt="'. $id .'">';
                        echo '<p>Rok urodzenia: ' .$w["rok_urodzenia"];
                        echo '<p>Opis: ' .$w["opis"];
                        echo '<p>Hobby: ' .$w["nazwa"];
                    }
                }
            
                $conn -> close();
            ?>
        </div>
    </main>
    <footer>
        Stronę wykonał: Miłosz Kucharski ©
    </footer>
</body>
</html>