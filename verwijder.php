<?php
/*
 * Gemaakt:Y.Ghalit
 *Date:5-03-2026
 * Functie: verwijderen van gegevens
 */
?>
<?php

include "include/function.php";
StartConnection("naw_system");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    ExecuteQuery("DELETE FROM nawdb WHERE id = $id");

    // Reset de AUTO_INCREMENT naar het hoogste ID + 1
    ExecuteQuery("SET @count = 0");
    ExecuteQuery("UPDATE nawdb SET id = @count:= @count + 1");
    ExecuteQuery("ALTER TABLE nawdb AUTO_INCREMENT = 1");
}

header("Location: Naw.php");
exit();

