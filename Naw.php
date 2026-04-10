<?php
/*
 * Gemaakt: Y.Ghalit
 * Date: 5-03-2026
 * functie: laat de gegevens van de data base zien
 */
include "include/function.php";
StartConnection("tes2");
$resultaten = ExecuteSelectQuery("SELECT * FROM gebruikers");
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAW Gegevens</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Eigen CSS -->
    <link rel="stylesheet" href="css.css">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">📋 NAW Systeem</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Naw.php">NAW Gegevens</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main content -->
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h1 class="h3 mb-0">📋 NAW Gegevens</h1>
        </div>
        <div class="card-body">
            <a href="Toevoegen.php" class="btn btn-success mb-3">➕ Nieuwe NAW</a>

            <?php if(!empty($resultaten)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-success">
                        <tr>
                            <th>#</th>           <!-- Volgnummer ipv ID -->
                            <th>Naam</th>
                            <th>Adres</th>
                            <th>Postcode</th>
                            <th>Woonplaats</th>
                            <th>Email</th>
                            <th>Telefoon</th>
                            <th>Acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $nummer = 1;  // Tellertje voor dynamisch volgnummer
                        foreach($resultaten as $row):
                            ?>
                            <tr>
                                <td><?php echo $nummer++; ?></td>  <!-- Dynamisch volgnummer -->
                                <td><?php echo htmlspecialchars($row['naam']); ?></td>
                                <td><?php echo htmlspecialchars($row['adres']); ?></td>
                                <td><?php echo htmlspecialchars($row['postcode']); ?></td>
                                <td><?php echo htmlspecialchars($row['woonplaats']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['telefoon']); ?></td>
                                <td>
                                    <a href="bewerk.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">✏️ Bewerken</a>
                                    <a href="verwijder.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Weet u het zeker?')">🗑️ Verwijderen</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info text-center">
                    Geen NAW gegevens gevonden. Klik op "Nieuwe NAW" om toe te voegen.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>