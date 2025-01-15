<?php
include("yhteys.php");

$tableSize = 300;
// In PHP, the implode() function is used to join elements of an array into a single string. It combines the array elements into a string, placing a specified separator between each element.
// The implodes signature is:
// string implode(string $separator, array $array)
$statements = implode("),(", array_fill(0, $tableSize, "?"));
$sql_lause = "INSERT INTO data(info) VALUES ($statements)";

$array = []; // create an array
for($i = 0; $i < $tableSize; $i++) {
    $array[$i] = $i + 1;
}

foreach($array as $number) { // for each number in the array
    echo $number . "<br>";
}

try {
    $kysely = $yhteys->prepare($sql_lause); // we always have to prepare the sql query
    $kysely->execute($array); // the query is being executed
} catch(PDOException $e) {
    die("VIRHE: " . $e->getMessage()); // in case we have an error
}

echo "The sql query " . $sql_lause . " was executed succesfully";
?>