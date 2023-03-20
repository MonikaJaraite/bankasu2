<?php
session_start();
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    $color = $_SESSION['color'];
    unset($_SESSION['msg']);
    unset($_SESSION['color']);
    echo '<h2 style="color:'. $color .'">' . $msg . '</h2>';
}

if(isset($_POST) && !empty($_POST)) {
    var_dump($_POST);
    $workers = json_decode(file_get_contents('./workers.json'));
    foreach($workers as $worker) {
        if($worker->name == $_POST['name'] && $worker->password == $_POST['password']) {
            $_SESSION['id'] = $worker->name;
            $_SESSION['msg'] = 'Sekmingai prisijungete';
            $_SESSION['color'] = 'green';
            header('Location: http://localhost/bankasu2/sarasas.php');
            die;
        }
    } 
    $_SESSION['msg'] = 'Neteisingai ivesti duomenys';
    $_SESSION['color'] = 'red';
    header('Location: http://localhost/bankasu2/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="name">Prisijungimo vardas:</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="password">Slaptazodis:</label>
            <input type="text" name="password">
        </div>
        <div>
            <input type="submit" name="login" value="Log In">
        </div>
    </form>
</body>
</html>