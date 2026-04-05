<?php
/*
 * Gemaakt:Y.Ghalit
 *Date:5-03-2026
 * Functie: verwijderen van gegevens
 */
?><?php
include "include/function.php";
StartConnection("naw_system");
ExecuteQuery("DELETE FROM nawdb WHERE id=" . $_GET['id']);
header("Location: naw_gegevens.php");
exit();
?>

