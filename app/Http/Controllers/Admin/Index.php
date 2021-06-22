<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Index extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dhasboard'
        ];
        return view('admin.index', $data);
    }
}
