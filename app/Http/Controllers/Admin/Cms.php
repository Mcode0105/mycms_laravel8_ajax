<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsModel;
use Illuminate\Http\Request;

class Cms extends Controller
{
    protected $CmsModel;

    public function __construct()
    {
        $this->CmsModel = new CmsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Seting CMS'
        ];
        return view('admin.cms', $data);
    }

    public function alldata()
    {
        $data = $this->CmsModel->alldata();
        return response()->json($data);
    }

    public function editlg(Request $request, $id_lg)
    {

        $data = [
            'nama' => $request->nama
        ];
        $response = $this->CmsModel->editlg($id_lg, $data);
        return response()->json($response);
    }
}
