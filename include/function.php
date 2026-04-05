<?php
/*
 *Name: Y.ghlit
 *Date: 24-02-2026
 *function: oproepen van de Data base
 */
?>
<?php

$conn = null;

function StartConnection($dbname)
{
    global $conn;
    $host = "localhost";
    $user = "root";
    $pass = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function ExecuteSelectQuery($query)
{
    global $conn;
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function ExecuteQuery($query)
{
    global $conn;
    return $conn->exec($query);
}
