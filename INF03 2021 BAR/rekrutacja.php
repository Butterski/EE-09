<?php
$conn = new mysqli('localhost', 'root', '', 'dane2');

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$stanowisko = $_POST['stanowisko'];

if(empty($imie) && empty($nazwisko) && empty($stanowisko)){
    echo('Prosze wypełnić pola!');
    echo('<br><a href="bar.html"><button>WRÓĆ</button></a>');
} else {
    $sql = "INSERT INTO pracownicy VALUES ('', '$imie','$nazwisko','$stanowisko')";
    mysqli_query($conn, $sql);
    echo('Dodano pracownika<br>');
    echo('<a href="bar.html"><button>WRÓĆ</button></a>');
}

$conn -> close();
?>
