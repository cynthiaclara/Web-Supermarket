<?php
include '../model/user.php';
$user = new User();
if (!empty($_POST))
{
    $user->register($_POST['user_id'], $_POST['password'], $_POST['nama'], $_POST['role_id'], $_POST['address']);
    header('Location: ../view/admin.php');
}
?>