<?php

if($_POST['name'] == '' || $_POST['surname'] == '' || $_POST['personal_id'] == '') {
    header('Location: http://localhost/bankasu2/sukurti.php?empty_fields=1');
}

$content = file_get_contents('users.json');

if($content == '') {
    $users = [];
} else {
    $users = json_decode($content);
}

$user = [
    'name' => $_POST['name'],
    'surname' => $_POST['surname'],
    'personal_id' => $_POST['personal_id'],
];

$users[] = $user;

file_put_contents('users.json', json_encode( $users));

header('Location: http://localhost/bankasu2/sukurti.php?success=1');