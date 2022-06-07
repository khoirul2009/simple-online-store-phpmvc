<?php


class Category_model
{
    protected $db;
    protected $table = 'kategori';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCategory()
    {
        $this->db->query("SELECT * FROM " . $this->table . " ");
        return $this->db->resultSet();
    }
}
