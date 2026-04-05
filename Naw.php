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
    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:Arial;background:#f4f4f4;padding:20px;}
        main{max-width:1200px;margin:0 auto;background:white;border-radius:10px;padding:20px;}
        h1{text-align:center;margin-bottom:20px;}
        .btn{display:inline-block;background:#4CAF50;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;margin-bottom:20px;}
        .edit{background:#2196F3;}
        .delete{background:#f44336;}
        table{width:100%;border-collapse:collapse;}
        th,td{border:1px solid #ddd;padding:12px;text-align:left;}
        th{background:#4CAF50;color:white;}
        tr:nth-child(even){background:#f9f9f9;}
        .geen-data{text-align:center;padding:50px;color:#666;}
    </style>
</head>
<body>
<main>
    <h1>📋 NAW Gegevens</h1>
    <a href="naw_toevoegen.php" class="btn">➕ Nieuwe NAW</a>

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
                    <a href="naw_bewerken.php?id=<?php echo $row['id']; ?>" class="btn edit">Bewerken</a>
                    <a href="naw_verwijderen.php?id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Weet u het zeker?')">Verwijderen</a>
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