<?php
include '../model/user.php';
$user = new User();
if (isset($_GET['id']))
{
    if (!empty($_POST))
    {
        $user->edit($_GET['id'], $_POST['password'], $_POST['nama'], $_POST['role_id'], $_POST['address']);
        header('Location: ../view/admin.php');
    }
}
else
{
    header('Location: ../');
}
?>