<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TagModel;
use Illuminate\Http\Request;

class Tag extends Controller
{
    protected $TagModel;

    public function __construct()
    {
        $this->TagModel = new TagModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tag'
        ];
        return view('admin.tag', $data);
    }

    public function alldata()
    {
        $data = $this->TagModel->alldata();
        return response()->json($data);
    }
    public function adddata(Request $request)
    {
        $request->validate(
            [
                'tag' => 'required'
            ],
            [
                'tag.required' => 'tag harus di isi'
            ]
        );
        $data = [
            'tag' => $request->tag
        ];
        $response = $this->TagModel->adddata($data);
        return response()->json($response);
    }

    public function hapusdata($id_tag)
    {
        $data = $this->TagModel->hapusdata($id_tag);
        return response()->json($data);
    }

    public function editdata($id_tag)
    {
        $data = $this->TagModel->editdata($id_tag);
        return response()->json($data);
    }

    public function updatedata(Request $request, $id_tag)
    {
        $request->validate(
            [
                'tag' => 'required'
            ],
            [
                'tag.required' => 'tag harus di isi'
            ]
        );
        $data = [
            'tag' => $request->tag
        ];
        $response = $this->TagModel->updatedata($id_tag, $data);
        return response()->json($response);
    }
}
