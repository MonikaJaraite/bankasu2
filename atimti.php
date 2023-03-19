<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once('./menu.php');
    ?>
    <form action="atemimas.php" method="post">
        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <input type="text" name="funds">
        <input type="submit" value="atimti">
    </form>
</body>
</html>