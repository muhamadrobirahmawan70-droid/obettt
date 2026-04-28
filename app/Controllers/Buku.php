<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\PenulisModel;

class Buku extends BaseController
{
    protected $bukuModel;
    protected $kategoriModel;
    protected $penulisModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->bukuModel = new BukuModel();
        $this->kategoriModel = new KategoriModel();
        $this->penulisModel = new PenulisModel();
    }

    public function index()
    {
        // "buku.*" diganti jadi "books.*" sesuai nama tabel database kamu
        $data['buku'] = $this->bukuModel->select('books.*, penulis.nama_penulis')
                         ->join('penulis', 'penulis.id_penulis = books.id_penulis')
                         ->findAll();
        
        $data['title'] = 'Daftar Buku';
        return view('buku/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Buku',
            'penulis' => $this->penulisModel->findAll(),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('buku/create', $data);
    }

    public function store()
    {
        $fileCover = $this->request->getFile('cover');
        $namaCover = ($fileCover->getError() == 4) ? 'no_image.png' : $fileCover->getRandomName();
        if ($fileCover->getError() != 4) $fileCover->move('uploads/buku', $namaCover);

        $this->bukuModel->save([
            'judul'       => $this->request->getPost('judul'),
            'id_penulis'  => $this->request->getPost('id_penulis'), // Sudah dibetulkan
            'penerbit'    => $this->request->getPost('penerbit'),
            'stok'        => $this->request->getPost('stok'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'cover'       => $namaCover
        ]);

        return redirect()->to('/buku')->with('success', 'Buku berhasil ditambah!');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Buku',
            'buku'     => $this->bukuModel->find($id),
            'kategori' => $this->kategoriModel->findAll(),
            'penulis'  => $this->penulisModel->findAll() // Tambahkan ini agar dropdown penulis muncul
        ];
        
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data buku tidak ditemukan!');
        }

        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $fileCover = $this->request->getFile('cover');
        $bukuLama = $this->bukuModel->find($id);

        if ($fileCover->getError() == 4) {
            $namaCover = $bukuLama['cover'];
        } else {
            $namaCover = $fileCover->getRandomName();
            $fileCover->move('uploads/buku', $namaCover);
            if ($bukuLama['cover'] != 'no_image.png' && file_exists('uploads/buku/' . $bukuLama['cover'])) {
                unlink('uploads/buku/' . $bukuLama['cover']);
            }
        }

        $this->bukuModel->update($id, [
            'judul'       => $this->request->getPost('judul'),
            'id_penulis'  => $this->request->getPost('id_penulis'),
            'penerbit'    => $this->request->getPost('penerbit'),
            'stok'        => $this->request->getPost('stok'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'cover'       => $namaCover
        ]);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil diubah!');
    }

    public function delete($id)
    {
        $buku = $this->bukuModel->find($id);
        if ($buku['cover'] != 'no_image.png' && file_exists('uploads/buku/' . $buku['cover'])) {
            unlink('uploads/buku/' . $buku['cover']);
        }
        $this->bukuModel->delete($id);
        return redirect()->to('/buku')->with('success', 'Buku telah dihapus!');
    }
}