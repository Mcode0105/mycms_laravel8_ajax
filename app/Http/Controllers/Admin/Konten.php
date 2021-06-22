<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KontenModel;

class Konten extends Controller
{
    protected $KontenModel;

    public function __construct()
    {
        $this->KontenModel = new KontenModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Konten'
        ];
        return view('admin/konten', $data);
    }

    public function getdata()
    {
        $data = $this->KontenModel->alldata();
        return response()->json($data);
    }

    public function addkonten(Request $request)
    {
        $request->validate(
            [
                'konten' => 'required'
            ],
            [
                'konten.required' => 'konten harus di isi'
            ]
        );
        $data = [
            'konten' => $request->konten
        ];
        $response = $this->KontenModel->addkonten($data);
        return response()->json($response);
    }

    public function editdata($id_konten)
    {
        $data = $this->KontenModel->editkonten($id_konten);
        return response()->json($data);
    }

    public function updatedata(Request $request, $id_konten)
    {
        $request->validate(
            [
                'konten' => 'required'
            ],
            [
                'konten.required' => 'konten harus di isi'
            ]
        );
        $data = [
            'konten' => $request->konten
        ];
        $data = $this->KontenModel->updatedata($id_konten, $data);
        return response()->json($data);
    }

    public function hapusdata($id_konten)
    {
        $data = $this->KontenModel->hapus($id_konten);
        return response()->json($data);
    }
}
