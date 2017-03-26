<?php
    
    namespace App\Model;

    abstract class Mapper
    {
        protected $_pdo;

        public function __construct($db)
        {
            $this->db = $db;
        }
    }