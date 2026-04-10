<?php
/**
 * Bestand: verwijder.php
 * Functie: veilig verwijderen van gegevens met prepared statements
 * AVG: Logt welke gebruiker wat verwijdert en wanneer
 * Gemaakt:Y.Ghalit
 * Date:5-03-2026
 *
 */

session_start();
include "include/function.php";
StartConnection("tes2");

// Checks if the id exist
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // checks what you want to delete
    $data = ExecuteSelectQuerySafe("SELECT * FROM gebruikers WHERE id = ?", [$id]);

    if(!empty($data)) {
        $verwijderde_data = $data[0];

        // removes the item safely
        ExecuteQuerySafe("DELETE FROM gebruikers WHERE id = ?", [$id]);


    }
}
// Goes back to Naw.php
header("Location: Naw.php");
exit();
?>


