<?php


class Product_model
{
    protected $db;
    protected $table = 'products';
    protected $relasiTable = 'kategori';

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getStock()
    {
        $this->db->query("SELECT stock FROM " . $this->table . "");
        return $this->db->resultSet();
    }
    public function getProducts($id = null)
    {
        if ($id == null) {
            $this->db->query("SELECT " . $this->table . ".id , nama, harga, gambar, stock, id_kategori, nama_kategori, deskripsi 
                FROM " . $this->table . " 
                    JOIN " . $this->relasiTable . " 
                        ON " . $this->table . ".id_kategori = " . $this->relasiTable . ".id");
            return $this->db->resultSet();
        }
        $this->db->query("SELECT " . $this->table . ".id , nama, harga, gambar, stock, id_kategori, nama_kategori ,deskripsi
                FROM " . $this->table . " 
                    JOIN " . $this->relasiTable . " 
                        ON " . $this->table . ".id_kategori = " . $this->relasiTable . ".id WHERE " . $this->table . ".id='$id'");
        return $this->db->single();
    }
    public function save($data, $gambar)
    {
        $this->db->query("INSERT INTO " . $this->table . " VALUES('', :nama, :harga, :gambar, :stock, :id_kategori, :deskripsi, :createdAt,'')");
        $namePict = uniqid();
        $ext = pathinfo($gambar['name'], PATHINFO_EXTENSION);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar', $namePict . "." . $ext);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('createdAt', date('Y-m-d H:i:s'), time());



        if (Helper::upload_foto($gambar, $namePict)) {
            $this->db->execute();
        }
        return $this->db->rowCount();
    }
    public function delete($data)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $oldImg = $data['gambar'];
        $target_dir = "../public/img/" . $oldImg;
        if (file_exists($target_dir)) {
            unlink($target_dir);
        }
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function update($data, $gambar = null)
    {
        $oldImg = $data['gambar_lama'];
        $target_dir = "../public/img/" . $oldImg;

        if ($gambar == null) {
            $namePict = $oldImg;
        } else {
            if (file_exists($target_dir)) {
                unlink($target_dir);
            }
            $namePict = uniqid();
            $ext = pathinfo($gambar['name'], PATHINFO_EXTENSION);
            Helper::upload_foto($gambar, $namePict);
            $namePict = $namePict . "." . $ext;
        }

        $this->db->query("UPDATE " . $this->table . " SET nama=:nama, gambar=:gambar, harga=:harga, stock=:stock, id_kategori=:id_kategori, deskripsi=:deskripsi, updatedAt=:updatedAt WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('gambar', $namePict);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('updatedAt', date('Y-m-d H:i:s'), time());


        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateStock($data)
    {
        $this->db->query("UPDATE " . $this->table . " SET stock=stock-:jumlah WHERE id=:id");
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('id', $data['id_products']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
