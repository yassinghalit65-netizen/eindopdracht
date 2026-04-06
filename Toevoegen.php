<?php
/*
 * Gemaakt:Y.Ghalit
 * Date
 *
 */
?>
<?php
include "include/function.php";
StartConnection("naw_system");

if(isset($_POST['submit'])) {
    ExecuteQuery("INSERT INTO nawdb (naam, adres, postcode, woonplaats, email, telefoon) 
                  VALUES ('{$_POST['naam']}', '{$_POST['adres']}', '{$_POST['postcode']}', 
                          '{$_POST['woonplaats']}', '{$_POST['email']}', '{$_POST['telefoon']}')");
    header("Location: Naw.php");
    exit();
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
<main class="form-container">
    <h1>➕ NAW Toevoegen</h1>
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
        <input type="text" name="telefoon" required>

        <br>
        <input type="submit" name="submit" value="Opslaan" class="btn btn-submit">
        <a href="Naw.php" class="btn btn-cancel">Annuleer</a>
    </form>
</main>
</body>
</html>
