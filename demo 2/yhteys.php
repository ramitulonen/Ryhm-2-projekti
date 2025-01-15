<?php
$servername = "localhost";
$username = "demouser";
$password = "root";

try {
    $yhteys = new PDO("mysql:host=$servername;dbname=$username", $username, $password);
    $yhteys->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "VIRHE: " . $e->getMessage();
    return;
}
// echo "Yhteys OK!!!<br>";
?>