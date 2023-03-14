<?php
if(isset($_GET['empty_fields']) && $_GET['empty_fields'] == 1) {
    echo "<div style=\"padding: 20px; color: red;\">Prasome uzpildyti visus laukus</div>";
}

if(isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<div style=\"padding: 20px; color: green;\">Vartotojas sukurtas sekmingai</div>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
    <?php 
        require_once('./menu.php');
    ?>
    <form action="sukurimas.php" method="post">
        <div>
            <label for="name">Vardas:</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="surname">Pavardė:</label>
            <input type="text" name="surname">
        </div>
        <div>
            <label for="personal_id">Asmens kodas:</label>
            <input type="text" name="personal_id">
        </div>
        <div>
            <input type="submit" name="create" value="Sukurti">
        </div>
    </form>
</body>
</html>