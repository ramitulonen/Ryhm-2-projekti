<?php
include("yhteys.php");

$name = null;
$surname = null;
$age = null;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $age = $_POST["age"];
} else {
    die("VIRHE: There is no data");
}

$sql_lause = "INSERT INTO people(name, surname, age) VALUES
('$name', '$surname', '$age');";

try {
    $kysely = $yhteys->prepare($sql_lause); // prepare the sql query
    $kysely->execute(); // execute the query
} catch(PDOException $e) {
    die("Virhe: " . $e->getMessage());
}
echo "Sql query was executed: " . $sql_lause;
?>