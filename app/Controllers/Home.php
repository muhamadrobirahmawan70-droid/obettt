<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
         $bukuModel = new \App\Models\BukuModel();
    // ... kode yang lama tetap ada ...

    $data['stok_limit'] = $bukuModel->where('stok <=', 3)->findAll();
        return view('layouts/dashboard');
    }
    
}
