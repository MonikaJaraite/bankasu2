<?php

// var_dump($_POST);
// die;

session_start();

if(!isset($_POST['id'])) {
    $_SESSION['msg'] = 'Atsiprasome - vartotojo istrinti nepavyko';
    $_SESSION['color'] = 'red';
    header('Location: http://localhost/bankasu2/sarasas.php');
    die;
}

$users = json_decode(file_get_contents('./users.json'));

$users2 = [];
foreach ($users as &$user) {
    if($user->id !== $_POST['id']) {
        $users2[] = $user;
    } else {
        if($user->funds > 0) {
            $_SESSION['msg'] = 'Negalima istrinti - saskaitoje yra lesu';
            $_SESSION['color'] = 'red';
            header('Location: http://localhost/bankasu2/sarasas.php');
            die;
        }
    }
}

file_put_contents('users.json', json_encode( $users2));
$_SESSION['msg'] = 'Vartotojas istrintas sekmingai';
$_SESSION['color'] = 'green';
header('Location: http://localhost/bankasu2/sarasas.php');