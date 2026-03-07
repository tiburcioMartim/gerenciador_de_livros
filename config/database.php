<?php
// Acesso XAMPP
// $hostname = "localhost";
// $username = "root";
// $password = "";
// $database = "db_book_mananger";

// Acesso Hospedagem
$hostname = "sql111.infinityfree.com";
$username = "if0_41316624";
$password = "efomLHH07z4pK60";
$database = "if0_41316624_db_book_mananger";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->errno == 0) {
    // echo "<p style='color:lightgrey;'>Conectado.</p>";
} else {
    echo "<pre>Falha ao conectar: " . $conn->error . "</pre>";
}
