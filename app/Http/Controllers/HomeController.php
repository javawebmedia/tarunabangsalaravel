<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // index
    public function index()
    {
        $data = [   'title'         => 'SMK Taruna Bangsa - 
                                        Disiplin, Terampil, Berakhlak Mulia',
                    'description'   => 'SMK Taruna Bangsa - 
                                        Disiplin, Terampil, Berakhlak Mulia',
                    'keywords'      => 'smk di bekasi, smk taruna bangsa, sekolah smk, 
                                        sekolah favorit, smk di bekasi utara',
                    'content'       => 'home/index'
                ];
        return view('layout/wrapper', $data);
    }
}
