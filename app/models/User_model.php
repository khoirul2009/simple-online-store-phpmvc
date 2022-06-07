<?php


class User_model
{
    protected $db;
    protected $table = 'users';

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getUsers()
    {
        $this->db->query("SELECT * FROM " . $this->table . " ");
        return $this->db->resultSet();
    }
    public function getEmail($email)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE email='$email'");
        return $this->db->single();
    }
    public function delete($data)
    {
        $id = $data['id'];
        $image = $data['image'];
        if ($image != 'defaultUser.png') {
            $target_dir = "../public/img/" . $image;
            if (file_exists($target_dir)) {
                unlink($target_dir);
            }
        }
        $this->db->query("DELETE FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function save($data)
    {


        $query = "INSERT INTO " . $this->table . " VALUES ('', '', :email, :password, :role, :image, :created_at)";
        $this->db->query($query);

        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $password);
        $this->db->bind('role', 'user');
        $this->db->bind('image', 'defaultUser.png');
        $this->db->bind('created_at', time());

        $this->db->execute();

        return $this->db->rowCount();
    }
}
