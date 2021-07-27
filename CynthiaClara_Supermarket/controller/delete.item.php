<?php
include '../model/item.php';
$item = new Item();
if (isset($_GET['id']))
{
    $item->delete($_GET['id']);
    header('Location: ../view/manager.php');
}
else
{
    header('Location: ../');
}
?>