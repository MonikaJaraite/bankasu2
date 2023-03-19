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

session_start();

if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    $color = $_SESSION['color'];
    unset($_SESSION['msg']);
    unset($_SESSION['color']);
    echo '<h2 style="color:'. $color .'">' . $msg . '</h2>';
}
?>
    <?php 
        require_once('./menu.php');
        $users = json_decode(file_get_contents('./users.json'));
        function sortByName($a, $b) {
            return strcmp($a->surname, $b->surname);
        }
        // rūšiavimas pagal pavardę
        usort($users, 'sortByName');

        ?>
        <table>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Asmens kodas</th>
                <th>Lėšos</th>
                <th>Pridėjimas</th>
                <th>Atėmimas</th>
                <th>Ištrynimas</th>
            </tr>
        <?php 
        if(!$users) die;
        foreach($users as $user) {
            echo '<tr>';
            echo '<td>' . $user->name . '</td>';
            echo '<td>' . $user->surname . '</td>';
            echo '<td>' . $user->personal_id . '</td>';
            echo '<td>' . $user->funds . '</td>';
            ?>
            <td>
                <a href="http://localhost/bankasu2/prideti.php?id=<?= $user->id; ?>">Prideti lesu</a>
            </td>
            <td>
                <a href="http://localhost/bankasu2/atimti.php?id=<?= $user->id; ?>">Atimti lesu</a>
            </td>
            <?php
            echo '<td>'; 
            ?>
            <form action="./istrynimas.php" method="post">
                <input type="hidden" name="id" value="<?= $user->id; ?>">
                <input type="submit" value="istrinti">
            </form>
            <?php
            echo '</td>';
            echo '</tr>';
        }
    ?>
    </table>
</body>
</html>