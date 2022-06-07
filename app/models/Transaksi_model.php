<?php


class Transaksi_model
{
    protected $db;
    protected $table = 'transaksi';

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getTransaksi($id = null)
    {
        if ($id == null) {
            $this->db->query("SELECT * FROM " . $this->table . "");
            return $this->db->resultSet();
        }
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getTransaksiByIdUsers($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_users=:id");
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
    public function insertTransaksi($data, $id_user)
    {
        $this->db->query("INSERT INTO " . $this->table . " VALUES ('', :id_user, :kode_transaksi, :nama, :alamat, :provinsi, :kota, :kecamatan, :pembayaran, :no_pembayaran, :pengiriman, :biaya_pengiriman,'',:ordered_at,'','', :status)");
        $this->db->bind('id_user', $id_user);
        $this->db->bind('kode_transaksi', $data['kode']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('provinsi', $data['provinsi']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('kecamatan', $data['kecamatan']);
        $this->db->bind('pembayaran', $data['pembayaran']);
        $this->db->bind('no_pembayaran', $data['no_pembayaran']);
        $this->db->bind('pengiriman', $data['pengiriman']);
        $this->db->bind('biaya_pengiriman', 16000);
        $this->db->bind('ordered_at', time());
        $this->db->bind('status', 'ordered');
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function kirimOrder($data)
    {
        $this->db->query("UPDATE " . $this->table . " SET resi=:resi, sent_at=:sent_at, status=:status WHERE id=:id");
        $this->db->bind('resi', $data['resi']);
        $this->db->bind('status', 'sending');
        $this->db->bind('sent_at', time());
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function terimaOrder($data)
    {
        $this->db->query("UPDATE " . $this->table . " SET received_at=:received_at ,status=:status WHERE id=:id");
        $this->db->bind('received_at', time());
        $this->db->bind('status', 'received');
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
