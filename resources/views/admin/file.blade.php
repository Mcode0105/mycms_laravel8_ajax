@extends('layout/template')
@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{$title}}</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/konten">{{$title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data {{$title}}</h5>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                               <div class="row">
                                   <div class="col mb-3">
                                    <button id="tfile" type="button" class="btn  btn-primary btn-sm">Tambahkan File</button>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <form id="ffile" action="" method="POST">
                                                @csrf
                                                <div class="col-md-6">
                                                    <form method="POST" action="" enctype="multipart/form-data">
                                                        <div class="form-group fill">
                                                            <label for="exampleInputEmail1">Nama File</label>
                                                            <input type="text" class="form-control" name="namafile" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Foto">       
                                                        </div>
                                                        <div class="form-group fill">
                                                            <label for="gambar">File</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Upload File</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="file" class="custom-file-input" id="gambar">
                                                                    <label class="custom-file-label" for="gambar">Pilih file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn  btn-primary">Simpan</button>
                                                        <button id="tfc" type="button" class="btn  btn-danger">Cancel</button>
                                                    </form>
                                                </div>
                                            </form>   
                                        </div>
                                    </div>
                                 </div>
                               </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-inverse">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama File</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Mark</td>
                                                            <td>
                                                                <button type="button" class="btn  btn-icon btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
</div>
@endsection
@section('script')
    <script>
   $(document).ready(function () {
       $("#ffile").hide();
       $("#tfile").click(function(){
           $("#ffile").toggle('slow');
       })
       $('#tfc').click(function(){
           $('#ffile').hide('slow');
       })
   });
    </script>
@endsection
 