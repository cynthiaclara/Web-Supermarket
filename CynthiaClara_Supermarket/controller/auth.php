<?php
include '../model/user.php';
$user = new User();
session_start();
if (!empty($_POST))
{
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $result = $user->login($user_id, $password);
    if ($result)
    {
        $_SESSION['username'] = $result['first_name'];
        $_SESSION['user'] = $result['user_id'];
        $_SESSION['role'] = $result['role_id'];
        $role = $user->role($result['role_id']);
        if ($role == 'Admin')
        {
            header('Location: ../view/admin.php');
        }
        else if ($role == 'Manager')
        {
            header('Location: ../view/manager.php');
        }
        else if ($role == 'Kasir')
        {
            header('Location: ../view/cashier.php');
        }
        else if ($role == 'Pembeli')
        {
            header('Location: ../view/customer.php');
        }
        else
        {
            // Do Something???
        }
    }
    else
    {
        $_SESSION['msg'] = 'ID atau Password salah';
        header('Location: ../view/index.php');
    }
}

?>