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
                                    <button id="tfoto" type="button" class="btn  btn-primary btn-sm">Tambahkan Foto</button>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <form id="ffoto" action="" method="POST">
                                                @csrf
                                                <div class="col-md-6">
                                                    <form method="POST" action="" enctype="multipart/form-data">
                                                        <div class="form-group fill">
                                                            <label for="exampleInputEmail1">Nama Foto</label>
                                                            <input type="text" class="form-control" name="namafoto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Foto">       
                                                        </div>
                                                        <div class="form-group fill">
                                                            <label for="gambar">Gambar/Foto</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Upload Gambar</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="foto" class="custom-file-input" id="gambar">
                                                                    <label class="custom-file-label" for="gambar">Pilih file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn  btn-primary">Simpan</button>
                                                        <button id="tcc" type="button" class="btn  btn-danger">Cancel</button>
                                                    </form>
                                                </div>
                                            </form>   
                                        </div>
                                    </div>
                                </div>                              
                               </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card-deck">
                                    <div class="card">
                                        <img class="img-fluid card-img-top" src="{{asset('asset_admin')}}/images/slider/img-slide-2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <img class="img-fluid card-img-top" src="{{asset('asset_admin')}}/images/slider/img-slide-1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                        
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <img class="img-fluid card-img-top" src="{{asset('asset_admin')}}/images/slider/img-slide-4.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                        
                                        <div class="card-footer">
                                            <small class="text-muted">Last updated 3 mins ago</small>
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
      $('#ffoto').hide();
      $('#tcc').click(function(){
          $('#ffoto').hide('slow');
      })
      $('#tfoto').click(function(){
         $('#ffoto').toggle('slow');
      });
   });
    </script>
@endsection
 