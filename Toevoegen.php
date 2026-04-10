<?php
/*
 * Gemaakt:Y.Ghalit
 * functie: mensen toe te voegen aan de data base
 * Date:5-03-2026
 *
 *
 */
 ?>
<?php
session_start();
include "include/function.php";
StartConnection("tes2");

// checks if it is send
if(isset($_POST['submit'])) {
    // validator
    $naam = htmlspecialchars(trim($_POST['naam']));
    $adres = htmlspecialchars(trim($_POST['adres']));
    $postcode = htmlspecialchars(trim($_POST['postcode']));
    $woonplaats = htmlspecialchars(trim($_POST['woonplaats']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $telefoon = htmlspecialchars(trim($_POST['telefoon']));

    // Checks if the field are valid
    if($naam && $adres && $postcode && $woonplaats && $email && $telefoon) {
        // VEILIGE INSERT met prepared statement
        ExecuteQuerySafe(
                "INSERT INTO gebruikers (naam, adres, postcode, woonplaats, email, telefoon) 
             VALUES (?, ?, ?, ?, ?, ?)",
                [$naam, $adres, $postcode, $woonplaats, $email, $telefoon]
        );

        // it adds a log
        $tijd = date('Y-m-d H:i:s');
        $log = "[$tijd] Toegevoegd: $naam, $woonplaats\n";


        header("Location: Naw.php");
        exit();
    } else {
        $error = "Ongeldige invoer. Controleer alle velden.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>NAW Toevoegen</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="Naw.php">Bekijken</a>
</nav>
<main>
    <h1> NAW Toevoegen</h1>
    <?php if(isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Naam:</label>
        <input type="text" name="naam" required>
        <label>Adres:</label>
        <input type="text" name="adres" required>
        <label>Postcode:</label>
        <input type="text" name="postcode" required>
        <label>Woonplaats:</label>
        <input type="text" name="woonplaats" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Telefoon:</label>
        <input type="number" name="telefoon" required>
        <br>
        <input type="submit" name="submit" value="Opslaan">
        <a href="Naw.php">Annuleer</a>
    </form>
</main>
</body>
</html>
