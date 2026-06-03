<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    // index
    public function index()
    {
        return redirect('testing/halo/Andoyo-Cakep');
    }

    // halo
    public function halo($nama)
    {
        echo 'Halo <strong>' . $nama . '</strong>. Selamat datang di websiteku.';
    }
}
