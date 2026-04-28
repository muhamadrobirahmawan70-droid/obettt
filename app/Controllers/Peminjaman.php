<?php
namespace App\Controllers;
use App\Models\PeminjamanModel;
use App\Models\BukuModel;
use App\Models\UserModel; // Sesuaikan nama model user kamu

class Peminjaman extends BaseController {
    public function index() {
    $model = new PeminjamanModel();
    $data_pinjam = $model->getPeminjaman();
    
    // Logika hitung denda berjalan di sini
    foreach ($data_pinjam as &$p) {
        if ($p['status'] == 'dipinjam') {
            $tgl_kembali = new \DateTime($p['tgl_kembali']);
            $hari_ini = new \DateTime(date('Y-m-d'));
            
            if ($hari_ini > $tgl_kembali) {
                $selisih = $hari_ini->diff($tgl_kembali)->days;
                $p['denda_sekarang'] = $selisih * 1000; // Misal denda 1000/hari
            } else {
                $p['denda_sekarang'] = 0;
            }
        } else {
            $p['denda_sekarang'] = $p['denda']; // Jika sudah balik, ambil denda yang tersimpan
        }
    }

    $data = [
        'title' => 'Data Peminjaman',
        'pinjam' => $data_pinjam
    ];
    return view('peminjaman/index', $data);
}

    public function create() {
    $UsersModel = new \App\Models\UsersModel(); // Sesuaikan nama model user kamu
    $BukuModel = new \App\Models\BukuModel();
    
    $data = [
        'title'  => 'Tambah Peminjaman',
        'users'  => $UsersModel->findAll(),
        'books'   => $BukuModel->where('stok >', 0)->findAll() // Hanya buku yang ada stoknya
    ];
    return view('peminjaman/create', $data);
}
        public function kembali($id)
{
    $model = new PeminjamanModel();
    $bukuModel = new \App\Models\BukuModel();

    // 1. Ambil data pinjaman
    $pinjam = $model->find($id);

    if ($pinjam && $pinjam['status'] == 'dipinjam') {
        // 2. Update status jadi dikembalikan
        $model->update($id, ['status' => 'dikembalikan']);

        // 3. Kembalikan stok buku (+1)
        $buku = $bukuModel->find($pinjam['id_buku']);
        $bukuModel->update($pinjam['id_buku'], [
            'stok' => $buku['stok'] + 1
        ]);

        return redirect()->to('/peminjaman')->with('success', 'Buku berhasil dikembalikan, stok bertambah!');
    }

    return redirect()->to('/peminjaman')->with('error', 'Data tidak valid!');
}
        
        
    public function store() {
        $model = new PeminjamanModel();
        $bukuModel = new \App\Models\BukuModel();
        
        $id_buku = $this->request->getPost('id_buku');
        
        // Simpan transaksi
        $model->save([
            'id_user' => $this->request->getPost('id_user'),
            'id_buku' => $id_buku,
            'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
            'tgl_kembali' => $this->request->getPost('tgl_kembali'),
            'status' => 'dipinjam'
        ]);

        // Kurangi stok buku
        $buku = $bukuModel->find($id_buku);
        $bukuModel->update($id_buku, ['stok' => $buku['stok'] - 1]);

        return redirect()->to('/peminjaman')->with('success', 'Peminjaman berhasil dicatat!');
    }
}