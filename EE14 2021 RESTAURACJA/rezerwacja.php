<?php
$conn= new mysqli('localhost', 'root', '', 'restauracja');

$data = $_POST["data"];
$osoby = $_POST["osoby"];
$telefon = $_POST["telefon"];

$sql="INSERT INTO rezerwacje VALUES ('', '', '$data', '$osoby', '$telefon')";

if(isset($_POST["dane"])){
    mysqli_query($conn, $sql);
    echo 'dodano rezerwacje do bazy
        <a href="restauracja.html"><button>Wróć</button></a>';
} else {
    echo 'nie zgodzono się na przetwarzanie danych
        <a href="restauracja.html"><button>Wróć</button></a>';
};

$conn->close();
?>