<?php
include '../model/user.php';
$user = new User();
if (isset($_GET['id']))
{
    $user->delete($_GET['id']);
    header('Location: ../view/admin.php');
}
else
{
    header('Location: ../');
}
?>