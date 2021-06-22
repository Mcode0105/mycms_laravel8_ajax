<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Foto extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Foto'
        ];
        return view('admin.foto', $data);
    }
}
