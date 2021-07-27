<?php

include_once '../include/db.php';

class User extends DBH
{
    public function login($user_id, $password)
    {
        $query = $this->db->prepare("SELECT * FROM `user` WHERE `user_id` = ? AND `password` = ?");
        $query->execute([$user_id, md5($password)]);
        return $query->fetch();
    }

    public function register($user_id, $password, $name, $role_id, $address)
    {
        $query = $this->db->prepare("INSERT INTO `user` (`user_id`, `password`, `first_name`, `last_name`, `role_id`, `address`) VALUES (?, ?, ?, ?, ?, ?)");
        if (($pos = strpos($name, ' ')) !== FALSE)
        {
            $first_name = strtok($name, ' ');
            $last_name = substr($name, $pos + 1); 
        }
        else
        {
            $first_name = $name;
            $last_name = '';
        }
        $query->execute([$user_id, md5($password), $first_name, $last_name, $role_id, $address]);
    }

    public function edit($user_id, $password, $name, $role_id, $address)
    {
        $query = $this->db->prepare("UPDATE `user` SET `first_name` = ?, `last_name` = ?, `password` = ?, `role_id` = ?, `address` = ? WHERE `user_id` = ?");
        if (($pos = strpos($name, ' ')) !== FALSE)
        {
            $first_name = strtok($name, ' ');
            $last_name = substr($name, $pos + 1); 
        }
        else
        {
            $first_name = $name;
            $last_name = '';
        }
        $query->execute([$first_name, $last_name, md5($password), $role_id, $address, $user_id]);
    }

    public function delete($user_id)
    {
        $query = $this->db->prepare("DELETE FROM `user` WHERE `user_id` = ?");
        $query->execute([$user_id]);
    }

    public function role($role_id)
    {
        $query = $this->db->prepare("SELECT * FROM `role` WHERE `role_id` = ?");
        $query->execute([$role_id]);
        $result = $query->fetch();
        return $result['role_name'];
    }

    public function specificUser($user_id)
    {
        $query = $this->db->prepare("SELECT * FROM `user` WHERE `user_id` = ?");
        $query->execute([$user_id]);
        return $query->fetch();
    }

    public function allUsers()
    {
        $query = $this->db->prepare("SELECT * FROM `user`");
        $query->execute();
        return $query->fetchAll();
    }

    public function latest()
    {
        $query = $this->db->prepare("SELECT * FROM `user` ORDER BY 1 DESC LIMIT 1");
        $query->execute();
        $result = $query->fetch();
        return $result['user_id'] + 1;
    }
}

?>