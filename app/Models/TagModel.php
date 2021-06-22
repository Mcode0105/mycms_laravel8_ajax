<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TagModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tag',
        'tag',
        'created_at',
        'updated_at'
    ];

    public function alldata()
    {
        return DB::table('tag')->get();
    }

    public function adddata($data)
    {
        return DB::table('tag')->insert($data);
    }
    public function hapusdata($id_tag)
    {
        return DB::table('tag')->where('id_tag', $id_tag)->delete();
    }
    public function editdata($id_tag)
    {
        return DB::table('tag')->where('id_tag', $id_tag)->first();
    }

    public function updatedata($id_tag, $data)
    {
        return DB::table('tag')->where('id_tag', $id_tag)->update($data);
    }
}
