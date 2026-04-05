<?php
include "include/function.php";
$conn = StartConnection("naw_system");
$result = ExecuteSelectQuery("SELECT * FROM nawdb");
echo "<pre>";
print_r($result);
echo "</pre>";
?>