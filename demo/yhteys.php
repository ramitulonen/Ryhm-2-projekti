<?php
$servername = "localhost";
$username = "demouser";
$password = "root";

try {
    $yhteys = new PDO("mysql:host=$servername;dbname=$username", $username, $password);
    $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Yhteytta ei ole: " . $e->getMessage();
    return;
}
// echo "Yhteys ok!!!<br>"
?>