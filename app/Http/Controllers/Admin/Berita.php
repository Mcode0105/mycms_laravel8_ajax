<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use App\Models\KontenModel;
use App\Models\TagModel;
use Illuminate\Http\Request;

class Berita extends Controller
{
    protected $KontenModel;
    protected $TagModel;
    protected $BeritaModel;

    public function __construct()
    {
        $this->KontenModel = new KontenModel();
        $this->TagModel = new TagModel();
        $this->BeritaModel = new BeritaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Berita',
            'konten' => $this->KontenModel->alldata(),
            'tag' => $this->TagModel->alldata()
        ];
        return view('admin.berita', $data);
    }

    public function tambahberita(Request $request)
    {
        $filegambar = $request->file('gambar');
        $namagambar = time() . '.' . $filegambar->getClientOriginalExtension();
        $request->file('gambar')->move(public_path('img_berita'), $namagambar);
        $data = [
            'judul' => $request->judul,
            'id_konten' => $request->id_konten,
            'id_tag' => $request->id_tag,
            'berita' => $request->berita,
            'gambar' => $namagambar
        ];
        $response = $this->BeritaModel->tambahberita($data);
        return response()->json($response);
    }

    public function showberita()
    {
        $data = $this->BeritaModel->showberita();
        return response()->json($data);
    }

    public function hapusberita($id_berita)
    {
        $data = $this->BeritaModel->hapusberita($id_berita);
        return response()->json($data);
    }

    public function editberita($id_berita)
    {
        $data = $this->BeritaModel->editberita($id_berita);
        return response()->json($data);
    }
}
