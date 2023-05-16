<!DOCTYPE html>
<html>
<head>
    <title>Igralne kocke</title>
    <link rel="icon" type="image/x-icon" href="images/dicefavicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>IGRALNE KOCKE - VNOS UPORABNIKOV</h1>
    <form method="POST" action="play.php">
        <h2>Vnos 1. igralca</h2>
        <label for="ime1">Ime:</label>
        <input type="text" id="ime1" name="ime[]" required><br>
        <label for="priimek1">Priimek:</label>
        <input type="text" id="priimek1" name="priimek[]" required><br>

        <h2>Vnos 2. igralca</h2>
        <label for="ime2">Ime:</label>
        <input type="text" id="ime2" name="ime[]" required><br>
        <label for="priimek2">Priimek:</label>
        <input type="text" id="priimek2" name="priimek[]" required><br>


        <h2>Vnos 3. igralca</h2>
        <label for="ime3">Ime:</label>
        <input type="text" id="ime3" name="ime[]" required><br>
        <label for="priimek3">Priimek:</label>
        <input type="text" id="priimek3" name="priimek[]" required><br>


        <input type="submit" value="Igraj">
    </form>
</body>
</html>
