<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DasborController extends Controller
{
    // index
    public function index()
    {
        $data = [   'title'     => 'Selamat Datang di Halaman Dashboard',
                    'content'   => 'admin/dasbor/index'
                ];
        return view('admin/layout/wrapper', $data);
    }
}
