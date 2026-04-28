<?php
namespace App\Models;
use CodeIgniter\Model;

class PeminjamanModel extends Model {
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_pinjam';
    protected $allowedFields = ['id_user', 'id_buku', 'tgl_pinjam', 'tgl_kembali', 'status'];

    public function getPeminjaman() {
        return $this->select('peminjaman.*, users.nama, books.judul')
                    ->join('users', 'users.id_user = peminjaman.id_user')
                    ->join('books', 'books.id_buku = peminjaman.id_buku')
                    ->findAll();
    }
}