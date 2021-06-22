<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class File extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'File'
        ];
        return view('admin.file', $data);
    }
}
