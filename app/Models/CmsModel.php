<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CmsModel extends Model
{
    protected $fillable = [
        'id_lgname',
        'nama',
        'created_at',
        'updated_at'
    ];
    use HasFactory;

    public function alldata()
    {
        return DB::table('logo_name')->first();
    }

    public function editlg($id_lg, $data)
    {
        return DB::table('logo_name')->where('id_lgname', $id_lg)->update($data);
    }
}
