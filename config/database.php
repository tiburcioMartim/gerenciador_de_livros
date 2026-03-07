<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_book_mananger";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->errno == 0) {
    // echo "<p style='color:lightgrey;'>Conectado.</p>";
} else {
    echo "<pre>Falha ao conectar: " . $conn->error . "</pre>";
}
