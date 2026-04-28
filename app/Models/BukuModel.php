<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table            = 'books'; // Sesuaikan dengan nama tabel di DB kamu
    protected $primaryKey       = 'id_buku';
    protected $allowedFields    = ['judul', 'id_penulis', 'penerbit', 'stok', 'cover', 'id_kategori'];

    // Fungsi untuk join ke tabel kategori agar muncul nama kategorinya
    public function getBukuWithKategori()
    {
        return $this->select('books.*, categories.nama_kategori')
                    ->join('categories', 'categories.id_kategori = books.id_kategori')
                    ->findAll();
    }
    // Di BukuModel.php
public function getBukuWithPenulis()
{
    return $this->select('books.*, penulis.nama_penulis')
                ->join('penulis', 'penulis.id_penulis = books.id_penulis')
                ->findAll();
}
}