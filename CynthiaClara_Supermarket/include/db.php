<?php

    class DBH
    {
        public function __construct()
        {
            $this->db = new PDO("mysql:host=localhost;dbname=ushop;charset=gbk", "root", "");
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
    }

?>