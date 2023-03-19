<?php

session_start();

if (!isset($_POST)) {
    $_SESSION['msg'] = 'Atsiprasome, ivyko klaida';
    $_SESSION['color'] = 'red';
    header('Location: http://localhost/bankasu2/sarasas.php');
    die;
}

$users = json_decode(file_get_contents('./users.json'));

foreach ($users as &$user) {
    if($user->id == $_POST['id']) {
        if($user->funds >= $_POST['funds']) {
            $user->funds -= $_POST['funds'];
        } else {
            $_SESSION['msg'] = 'Saskaitoje per mazai lesu';
            $_SESSION['color'] = 'red';
            header('Location: http://localhost/bankasu2/sarasas.php');
            die;
        }
    }
}

file_put_contents('users.json', json_encode($users));
$_SESSION['msg'] = 'Lesos atimtos sekmingai';
$_SESSION['color'] = 'green';
header('Location: http://localhost/bankasu2/sarasas.php');