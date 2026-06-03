<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    // index
    public function index()
    {
        $data = [   'title'     => 'Akun Saya',
                    'content'   => 'admin/akun/index'
                ];
        return view('admin/layout/wrapper', $data);
    }
}
