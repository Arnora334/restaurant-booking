<?php
class Meja {
    //Properti privat untuk menyimpan data meja
    private $id;
    private $nomor;
    private $kapasitas;

    //Konstruktor untuk membuat objek Meja
    public function __construct($nomor, $kapasitas, $id = null) {
        $this->id = $id;
        $this->nomor = $nomor;
        $this->kapasitas = $kapasitas;
    }

    // Getter untuk mengakses properti privat dari luar class
    public function getId() { return $this->id; }
    public function getNomor() { return $this->nomor; }

    //Mengambil semua meja yang statusnya 'tersedia' dari database.
    public static function getTersedia($pdo) {
        $stmt = $pdo->query("SELECT * FROM meja WHERE status = 'tersedia'");
        return $stmt->fetchAll();
    }

    //Mengambil semua data meja dari database (tanpa filter status).
    public static function getAll($pdo) {
        $stmt = $pdo->query("SELECT * FROM meja");
        return $stmt->fetchAll();
    }

    //Mencari satu meja berdasarkan ID-nya.
    public static function findById($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM meja WHERE id_meja = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    //Mencari satu meja berdasarkan ID-nya.
    public static function setStatus($pdo, $id_meja, $status) {
        $stmt = $pdo->prepare("UPDATE meja SET status = ? WHERE id_meja = ?");
        return $stmt->execute([$status, $id_meja]);
    }
}
?>