<?php

session_start();

if(strlen($_POST['name']) < 3 || strlen($_POST['surname']) < 3 || strlen($_POST['personal_id']) < 3) {
    $_SESSION['msg'] = 'Prasome ivesti teisingus duomenis';
    $_SESSION['color'] = 'red';
    header('Location: http://localhost/bankasu2/sukurti.php');
    die;
}

$content = file_get_contents('users.json');

if($content == '') {
    $users = [];
} else {
    $users = json_decode($content);
}
$id = file_get_contents('id.json');
if(!empty($users)) {
    foreach ($users as $user) {
        if($user->personal_id == $_POST['personal_id']) {
            $_SESSION['msg'] = 'Toks asmens kodas jau egzistuoja';
            $_SESSION['color'] = 'red';
            header('Location: http://localhost/bankasu2/sukurti.php');
            die;
        }
    }
}
$user = [
    'id' => $id,
    'name' => $_POST['name'],
    'surname' => $_POST['surname'],
    'personal_id' => $_POST['personal_id'],
    'funds' => 0,
];
file_put_contents('id.json', ++$id);
$users[] = $user;

file_put_contents('users.json', json_encode( $users));
$_SESSION['msg'] = 'Vartotojas sukurtas sekmingai';
$_SESSION['color'] = 'green';
header('Location: http://localhost/bankasu2/sukurti.php');