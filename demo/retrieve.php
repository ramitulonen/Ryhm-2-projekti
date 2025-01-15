<?php
include("yhteys.php");
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0; // Default to 0 if no offset is provided
$size = isset($_GET['size']) ? (int)$_GET['size'] : 150; // Default to 0 if no offset is provided

$sql_lause = "SELECT * FROM data LIMIT :offset, :limit";

try {
    $kysely = $yhteys->prepare($sql_lause); //necessary step. We always have to prepare an sql query
    $kysely->bindParam(":offset", $offset, PDO::PARAM_INT); //we are binding the offset variable to the query. Doing this, when the value of offset will change then the change will also be reflected to the query automatically
    $kysely->bindParam(":limit", $size, PDO::PARAM_INT); // same as above
    $kysely->execute(); // the query is being executed
    
    $tulos = $kysely->fetchAll(); // Getting the results

    $response = ""; //  we could have omit this line. I just put here in order to understand that first we create a variable of type String

    //  response .= "text" is the same as response = response + "text" 
    $response .= "<table id = 'data' border = 1>";

        $response .= "<tr>";
            $response .= "<th>id</th>";
            $response .= "<th>info</th>";
        $response .= "</tr>";

        // for every element in tulos, save to the response variable. Here, as keyword does not work like the as keyword in mysql. In mySql as keyword serves putting an alias to a field.
        //However here $rivi is an actual element of the $tulos array. So it basicallly means for every element in the array.
        foreach($tulos as $rivi) { 
            $response .= "<tr>";
                $response .= "<td>" . $rivi['id'] . "</td>";
                $response .= "<td>" . $rivi['info'] . "</td>";
            $response .= "</tr>";
        }

    $response .= "</table>";

    echo $response; // send response from server
} catch(PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}


?>