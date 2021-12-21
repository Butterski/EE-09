<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Video on demand</title>
</head>

<body>
    <header>
        <div id="head1">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </div>
        <div id="head2">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
    </header>
    <main>
        <div id="polecane">
            <h3>Polecamy</h3>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane3');
            $result = mysqli_query($conn, "SELECT id, nazwa, opis, zdjecie from produkty where id=18 or id=22 or id=23 or id=25");
            while ($w = mysqli_fetch_array($result)) {
                echo "<div class='item'><h4>" . $w["id"] . ". " . $w["nazwa"] . "</h4>
                    <img src='" . $w["zdjecie"] . "' alt='film'>
                    <p>" . $w["opis"] . "</p></div>";
            }
            $conn->close();
            ?>
        </div>
        <div id="fantastyczne">
            <h3>Filmy fantasyczne</h3>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane3');
            $result = mysqli_query($conn, "SELECT id, nazwa, opis, zdjecie from produkty where rodzaje_id = 12");
            while ($w = mysqli_fetch_array($result)) {
                echo "<div class='item'><h4>" . $w["id"] . ". " . $w["nazwa"] . "</h4>
                    <img src='" . $w["zdjecie"] . "' alt='film'>
                    <p>" . $w["opis"] . "</p></div>";
            }
            $conn->close();
            ?>
        </div>
    </main>
    <footer>
        <form method="post">
            <label for="ajdi">Usuń film nr.:</label>
            <input type="number" name="ajdi" id="ajdi">
            <input type="submit" value="usuń film">
        </form>
		<?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane3');
			if(isset($_POST["ajdi"])){
				$ajdi = $_POST["ajdi"];
				$sql2 = "DELETE FROM produkty WHERE id = " . $ajdi;
				$result = mysqli_query($conn, $sql2);
			}
            
            $conn->close();
			?>
		<p>Stronę wykonał : <a href="mailto:ja@poczta.pl">PESEL</a></p>
    </footer>
</body>

</html>