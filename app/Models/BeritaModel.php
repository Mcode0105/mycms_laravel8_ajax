<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BeritaModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_berita',
        'judul',
        'id_konten',
        'id_tag',
        'berita',
        'gambar',
        'created_at',
        'updated_at'
    ];

    public function tambahberita($data)
    {
        return DB::table('berita')->insert($data);
    }

    public function showberita()
    {
        return DB::table('berita')
            ->join('konten', 'konten.id_konten', '=', 'konten.id_konten')
            ->get();
    }

    public function hapusberita($id_berita)
    {
        return DB::table('berita')->where('id_berita', $id_berita)->delete();
    }

    public function editberita($id_berita)
    {
        return DB::table('berita')->where('id_berita', $id_berita)->first();
    }
}
