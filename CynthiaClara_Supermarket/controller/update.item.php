<?php
include '../model/item.php';
$item = new Item();
session_start();
if (isset($_GET['id']))
{
    $_SESSION['modal'] = 'edit';
    $_SESSION['last'] = $_GET['id'];
    if ($_POST['item_stock'] == 0 && $_POST['item_price'] == 0)
    {
        $_SESSION['respond'] = 'Stok dan Harga tidak boleh 0';
        header('Location: ../');
    }
    else if ($_POST['item_stock'] == 0)
    {
        $_SESSION['respond'] = 'Stok tidak boleh 0';
        header('Location: ../');
    }
    else if ($_POST['item_price'] == 0)
    {
        $_SESSION['respond'] = 'Harga tidak boleh 0';
        header('Location: ../');
    }
    else
    {
        if (!empty($_POST))
        {
            $item->edit($_GET['id'], $_POST['item_name'], $_POST['item_stock'], $_POST['item_price'], $_POST['item_desc']);
            if ($_SESSION['role'] == 2)
            {
                header('Location: ../view/manager.php');
            }
            else if ($_SESSION['role'] == 3)
            {
                header('Location: ../view/cashier.php');
            }
            else
            {
                header('Location: ../');
            }
        }
    }
}
else
{
    header('Location: ../');
}
?>