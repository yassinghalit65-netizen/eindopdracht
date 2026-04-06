<?php
/*
 * Gemaakt:Y.Ghalit
 * Date:5-03-2026
 * functie: gegevens bewerken
 *
 */
?>
<?php
include "include/function.php";
StartConnection("naw_system");
$id = $_GET['id'];

if(isset($_POST['submit'])) {
    ExecuteQuery("UPDATE nawdb SET 
                  naam='{$_POST['naam']}', 
                  adres='{$_POST['adres']}', 
                  postcode='{$_POST['postcode']}', 
                  woonplaats='{$_POST['woonplaats']}', 
                  email='{$_POST['email']}', 
                  telefoon='{$_POST['telefoon']}' 
                  WHERE id=$id");
    header("Location: Naw.php");
    exit();
}

$row = ExecuteSelectQuery("SELECT * FROM nawdb WHERE id=$id")[0];
?>
<!DOCTYPE html>
<html>
<head>
    <title>NAW Bewerken</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="Naw.php">Bekijken</a>
</nav>
<main class="form-container">
    <h1>✏️ NAW Bewerken</h1>
    <form method="POST">
        <label>Naam:</label>
        <input type="text" name="naam" value="<?php echo $row['naam']; ?>" required>

        <label>Adres:</label>
        <input type="text" name="adres" value="<?php echo $row['adres']; ?>" required>

        <label>Postcode:</label>
        <input type="text" name="postcode" value="<?php echo $row['postcode']; ?>" required>

        <label>Woonplaats:</label>
        <input type="text" name="woonplaats" value="<?php echo $row['woonplaats']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label>Telefoon:</label>
        <input type="text" name="telefoon" value="<?php echo $row['telefoon']; ?>" required>

        <br>
        <input type="submit" name="submit" value="Bijwerken" class="btn btn-update">
        <a href="Naw.php" class="btn btn-cancel">Annuleer</a>
    </form>
</main>
</body>
</html>