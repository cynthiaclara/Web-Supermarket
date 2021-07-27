<?php

include_once '../include/db.php';

class Item extends DBH
{
    public function allItems()
    {
        $query = $this->db->prepare("SELECT * FROM `item`");
        $query->execute();
        return $query->fetchAll();
    }

    public function specificItem($item_id)
    {
        $query = $this->db->prepare("SELECT * FROM `item` WHERE `item_id` = ?");
        $query->execute([$item_id]);
        return $query->fetch();
    }

    public function latest()
    {
        $query = $this->db->prepare("SELECT * FROM `item` ORDER BY 1 DESC LIMIT 1");
        $query->execute();
        $result = $query->fetch();
        return $result['item_id'] + 1;
    }

    public function add($item_id, $item_name, $item_stock, $item_price, $item_desc)
    {
        $query = $this->db->prepare("INSERT INTO `item` (`item_id`, `item_name`, `item_stock`, `item_price`, `item_desc`) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$item_id, $item_name, $item_stock, $item_price, $item_desc]);
    }

    public function edit($item_id, $item_name, $item_stock, $item_price, $item_desc)
    {
        $query = $this->db->prepare("UPDATE `item` SET `item_name` = ?, `item_stock` = ?, `item_price` = ?, `item_desc` = ? WHERE `item_id` = ?");
        $query->execute([$item_name, $item_stock, $item_price, $item_desc, $item_id]);
    }

    public function delete($item_id)
    {
        $query = $this->db->prepare("DELETE FROM `item` WHERE `item_id` = ?");
        $query->execute([$item_id]);
    }
}

?>