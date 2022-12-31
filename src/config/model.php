<?php
class Model
{
    private $server = 'localhost';
    private $username = 'scandiweb_admin';
    private $password = 'password';
    private $db = 'scandiweb_assignment';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();
        }
    }
    public function insert($sku, $name, $price, $size, $height, $width, $length, $weight)
    {

        $stm = $this->conn->prepare("INSERT INTO products (`SKU`, `Name`, `Price`, `Size`, `Height`, `Width`, `Length`, `Weight`) VALUES ('$sku', '$name', '$price', $size, $height, $width, $length, $weight)");
        if ($stm->execute())
            return true;
        else
            return false;
    }
    public function fetchAll()
    {
        $data = [];

        $stm = $this->conn->prepare("SELECT * FROM products ORDER BY ID ASC");
        if ($stm->execute())
            $data = $stm->fetchAll();

        return $data;
    }
    public function delete($sku)
    {
        $stm = $this->conn->prepare("DELETE FROM products WHERE SKU = $sku");
        if ($stm->execute()) {
            return true;
        } else {
            return;
        }
    }
}