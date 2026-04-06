<?php
/*
 * Gemaakt:Y.Ghalit
 * Date:5-03-2026
 * functie: laat de gegevens van de data base zien
 */
?>
<?php
include "include/function.php";
StartConnection("naw_system");
$resultaten = ExecuteSelectQuery("SELECT * FROM nawdb");
?>
<!DOCTYPE html>
<html>
<head>
    <title>NAW Gegevens</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="Naw.php" class="active">Bekijken</a>
</nav>
<main>
    <h1>📋 NAW Gegevens</h1>
    <a href="Toevoegen.php" class="btn">➕ Nieuwe NAW</a>

    <?php if(!empty($resultaten)): ?>
        <table>
            <thead>
            <tr><th>ID</th><th>Naam</th><th>Adres</th><th>Postcode</th><th>Woonplaats</th><th>Email</th><th>Telefoon</th><th>Acties</th></tr>
            </thead>
            <tbody>
            <?php foreach($resultaten as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['naam']); ?></td>
                    <td><?php echo htmlspecialchars($row['adres']); ?></td>
                    <td><?php echo htmlspecialchars($row['postcode']); ?></td>
                    <td><?php echo htmlspecialchars($row['woonplaats']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefoon']); ?></td>
                    <td>
                        <a href="bewerk.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Bewerken</a>
                        <a href="verwijder.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Weet u het zeker?')">Verwijderen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="geen-data">Geen gegevens gevonden</div>
    <?php endif; ?>
</main>
</body>
</html>