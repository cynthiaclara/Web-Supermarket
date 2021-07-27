<?php
include '../model/item.php';
$item = new Item();
session_start();
if (!empty($_POST))
{
    $_SESSION['modal'] = 'insert';
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
        $item->add($_POST['item_id'], $_POST['item_name'], $_POST['item_stock'], $_POST['item_price'], $_POST['item_desc']);
        header('Location: ../view/manager.php');
    }
}
?>