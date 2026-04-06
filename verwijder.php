<?php
/*
 * Gemaakt:Y.Ghalit
 *Date:5-03-2026
 * Functie: verwijderen van gegevens
 */
?>
<?php
/**
 * Bestand: verwijder.php
 * Functie: verwijderen van gegevens
 */

include "include/function.php";
StartConnection("naw_system");

// Check of er een ID is meegegeven
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    ExecuteQuery("DELETE FROM nawdb WHERE id = $id");
}

// Ga terug naar de hoofdpagina
header("Location: Naw.php");
exit();
?>
