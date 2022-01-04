<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Artykuły papiernicze</title>
	<link rel="stylesheet" href="styl.css">
</head>

<body>
	<header>
		<h1>W naszym sklepie internetowym kupisz najtaniej</h1>
	</header>
	<main>
		<div id="lewy">
			<h2>Kontakt</h2>
			<p>telefon: 444333222 </p>
			<p>email: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
			<img src="promocja2.png" alt="promocja" width="150px" height="150px">
		</div>
		<div id="srodkowy">
			<h2>Promocja 10% obejmuje artykuły:</h2>
			<ul>
				<?php
				$conn = new mysqli('localhost', 'root', '', 'sklep');
				$sql = 'SELECT nazwa FROM `towary` WHERE promocja != 0;';
				$result = mysqli_query($conn, $sql);
				while ($w = mysqli_fetch_array($result)) {
					echo "<li>" . $w['nazwa'] . "</li>";
				}
				$conn -> close();
				?>
			</ul>
		</div>
		<div id="prawy">
			<h2>Cena wybranego artykułu w promocji</h2>
			<form method="post">
				<select name="selektor" id="selektor">
					<option value="Gumka do mazania">Gumka do mazania</option>
					<option value="Cienkopis">Cienkopis</option>
					<option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
					<option value="Markery 4 szt.">Markery 4 szt.</option>
				</select>
				<input type="submit" value="WYBIERZ" class="button">
			</form>
			<div id='container'>
			<?php
				$conn = new mysqli('localhost', 'root', '', 'sklep');
				if(isset($_POST['selektor'])){
					$selektor = $_POST['selektor'];
					$sql = "SELECT nazwa, round(cena*0.9, 2) as cena FROM `towary` WHERE nazwa = '$selektor';";
					$result = mysqli_query($conn, $sql);
					while ($w = mysqli_fetch_array($result)) {
						echo "Nazwa: " . $w['nazwa'] . "<p>Cena: ". $w['cena'] . "zł";
					}
					$conn -> close();
				}
			?>
			</div>
		</div>
	</main>
	<footer>
		<h3>Autor strony: Miłosz Kucharski ©</h3>
	</footer>
</body>

</html>