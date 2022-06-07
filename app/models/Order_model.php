<?php


class Order_model
{
    protected $db;
    protected $table = 'orders';
    protected $table2 = 'products';

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getCarts($id_user)
    {
        $this->db->query("SELECT * FROM " . $this->table . " JOIN " . $this->table2 . " ON " . $this->table . ".id_products=" . $this->table2 . ".id WHERE status=:status AND id_users=:id_users");
        $this->db->bind('status', 'inCart');
        $this->db->bind('id_users', $id_user);
        return $this->db->resultSet();
    }
    public function addToCart($data)
    {
        $cek = $this->db->query("SELECT * FROM " . $this->table . " WHERE id_products=:id_product AND id_users=:id_user AND status!='ordered'");
        $this->db->bind('id_product', $data['id_product']);
        $this->db->bind('id_user', $data['id_user']);
        $cek = $this->db->single();

        if ($cek != false) {
            $this->db->query("UPDATE " . $this->table . " SET jumlah=jumlah+1 WHERE id_products=:id_product AND id_users=:id_user AND status!='ordered'");
            $this->db->bind('id_product', $data['id_product']);
            $this->db->bind('id_user', $data['id_user']);
            $this->db->execute();
            return $this->db->rowCount();
        }

        $this->db->query("INSERT INTO " . $this->table . " VALUES (:id_product, :id_user, '', :jumlah, :status) ");
        $this->db->bind('id_product', $data['id_product']);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('jumlah', 1);
        $this->db->bind('status', 'inCart');
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteCart($data)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id_products=:id_products AND id_users=:id_users");
        $this->db->bind('id_products', $data['id_products']);
        $this->db->bind('id_users', $data['id_users']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function orderCart($kode, $id)
    {
        $this->db->query("UPDATE " . $this->table . " SET kode_transaksi=:kode_transaksi, status=:status WHERE id_users=:id_user AND kode_transaksi='' AND status='inCart'");
        $this->db->bind('kode_transaksi', $kode);
        $this->db->bind('status', 'ordered');
        $this->db->bind('id_user', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getProducts($kode_transaksi)
    {
        $this->db->query("SELECT nama, harga, jumlah FROM " . $this->table . " JOIN " . $this->table2 . " ON " . $this->table . ".id_products=" . $this->table2 . ".id WHERE kode_transaksi=:kode_transaksi ");
        $this->db->bind('kode_transaksi', $kode_transaksi);
        return $this->db->resultSet();
    }
    public function getProductsOrder($kt, $id)
    {
        $this->db->query("SELECT id_products, jumlah FROM " . $this->table . " WHERE kode_transaksi=:kode_transaksi AND id_users=:id_users");
        $this->db->bind('kode_transaksi', $kt);
        $this->db->bind('id_users', $id);
        return $this->db->resultSet();
    }
}
