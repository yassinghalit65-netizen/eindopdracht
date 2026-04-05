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
    header("Location: naw_gegevens.php");
    exit();
}

$row = ExecuteSelectQuery("SELECT * FROM nawdb WHERE id=$id")[0];
?>
<!DOCTYPE html>
<html>
<head>
    <title>NAW Bewerken</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:Arial;background:#f4f4f4;padding:20px;}
        main{max-width:600px;margin:0 auto;background:white;border-radius:10px;padding:30px;}
        h1{margin-bottom:20px;}
        label{display:block;margin-top:15px;font-weight:bold;}
        input{width:100%;padding:10px;margin-top:5px;border:1px solid #ddd;border-radius:5px;}
        .btn{background:#2196F3;color:white;padding:12px 30px;border:none;border-radius:5px;cursor:pointer;margin-top:20px;}
        .cancel{background:#666;color:white;padding:12px 30px;text-decoration:none;border-radius:5px;margin-left:10px;}
    </style>
</head>
<body>
<main>
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
        <input type="submit" name="submit" value="Bijwerken" class="btn">
        <a href="naw_gegevens.php" class="cancel">Annuleer</a>
    </form>
</main>
</body>
</html>