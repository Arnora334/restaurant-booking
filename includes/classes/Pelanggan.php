<?php
class Pelanggan {
    //Properti privat untuk menyimpan data pelanggan
    private $id;
    private $nama;
    private $email;
    private $telepon;

    //Konstruktor untuk membuat objek Pelanggan
    public function __construct($nama, $email = null, $telepon = null, $id = null) {
        $this->id = $id;
        $this->nama = $nama;
        $this->email = $email;
        $this->telepon = $telepon;
    }

    // Getter untuk mengakses properti privat dari luar class
    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getEmail() { return $this->email; }
    public function getTelepon() { return $this->telepon; }

    // Metode untuk menyimpan data pelanggan
    public function simpan($pdo) {
        if ($this->id) {//ID Sudah ada, berarti edit
            $stmt = $pdo->prepare("UPDATE pelanggan SET nama = ?, email = ?, telepon = ? WHERE id_pelanggan = ?");
            return $stmt->execute([$this->nama, $this->email, $this->telepon, $this->id]);
        } else {//ID belum ada, berarti tambah baru
            $stmt = $pdo->prepare("INSERT INTO pelanggan (nama, email, telepon) VALUES (?, ?, ?)");
            $stmt->execute([$this->nama, $this->email, $this->telepon]);
            $this->id = $pdo->lastInsertId();
            return true;
        }
    }

    // Metode untuk mengambil data pelanggan berdasarkan ID
    public static function findById($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM pelanggan WHERE id_pelanggan = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        if ($data) {
            return new self($data['nama'], $data['email'], $data['telepon'], $data['id_pelanggan']);
        }
        return null;
    }
}
?>