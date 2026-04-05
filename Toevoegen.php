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
    header("Location: naw_gegevens.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>NAW Toevoegen</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:Arial;background:#f4f4f4;padding:20px;}
        main{max-width:600px;margin:0 auto;background:white;border-radius:10px;padding:30px;}
        h1{margin-bottom:20px;}
        label{display:block;margin-top:15px;font-weight:bold;}
        input{width:100%;padding:10px;margin-top:5px;border:1px solid #ddd;border-radius:5px;}
        .btn{background:#4CAF50;color:white;padding:12px 30px;border:none;border-radius:5px;cursor:pointer;margin-top:20px;}
        .cancel{background:#666;color:white;padding:12px 30px;text-decoration:none;border-radius:5px;margin-left:10px;}
    </style>
</head>
<body>
<main>
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
        <input type="submit" name="submit" value="Opslaan" class="btn">
        <a href="naw_gegevens.php" class="cancel">Annuleer</a>
    </form>
</main>
</body>
</html>
