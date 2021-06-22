<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KontenModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_konten',
        'konten',
        'created_at',
        'updated_at'
    ];

    public function alldata()
    {
        return DB::table('konten')->orderBy('id_konten', 'DESC')->get();
    }

    public function addkonten($data)
    {
        return DB::table('konten')->insert($data);
    }

    public function editkonten($id_konten)
    {
        return DB::table('konten')->where('id_konten', $id_konten)->first();
    }

    public function updatedata($id_konten, $data)
    {
        return DB::table('konten')->where('id_konten', $id_konten)->update($data);
    }

    public function hapus($id_konten)
    {
        return DB::table('konten')->where('id_konten', $id_konten)->delete();
    }
}
