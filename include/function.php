<?php
/*
 *Name: Y.ghlit
 *Date: 24-02-2026
 *function: oproepen van de Data base
 */
?>

<?php
    global
 $conn;

function StartConnection($dbname)
{
    global $conn;
    $host = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Verbinding mislukt: " . $e->getMessage());
    }
}

// VEILIGE VERSIE met prepared statements
function ExecuteSelectQuerySafe($query, $params = [])
{
    global $conn;
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Query fout: " . $e->getMessage());
    }
}

// VEILIGE VERSIE voor INSERT, UPDATE, DELETE
function ExecuteQuerySafe($query, $params = [])
{
    global $conn;
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    } catch (PDOException $e) {
        die("Query fout: " . $e->getMessage());
    }
}

// OUDE functies (niet meer gebruiken - alleen voor compatibiliteit)
function ExecuteSelectQuery($query)
{
    global $conn;
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Query fout: " . $e->getMessage());
    }
}

function ExecuteQuery($query)
{
    global $conn;
    try {
        return $conn->exec($query);
    } catch (PDOException $e) {
        die("Query fout: " . $e->getMessage());
    }
}
?>