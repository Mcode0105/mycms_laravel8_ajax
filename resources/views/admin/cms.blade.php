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
                <div class="row">
                    <div class="col-xl-12 mt-3 ml-2">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <h5>Seting Nama Logo</h5>
                                <hr>
                                <div class="card text-left">
                                    <div class="card-body">
                                        <h4><span id="namalg" class="badge badge-primary"></span></h4>
                                       <div class="row">
                                           <div class="col-md-12 mt-3">
                                                <div id="flg" class="row mb-5">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="floating-label" for="Email">Nama Logo</label>
                                                            <input type="text" class="form-control" id="nama" name="nama">
                                                            <input type="hidden" id="id_lg" name="id_lg">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <button id="logo" type="submit" onclick="editlogo()" class="btn btn-primary"></i> Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                           </div>
                                       </div>
                                        <a id="lg" href="#!" class="btn  btn-primary">Update Nama</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <h5>Gambar Header</h5>
                                <hr>
                                <div class="card ">
                                    <div class="card-body">
                                       <div class="row">
                                           <div class="col-md-4">
                                            <h5 class="card-title">Gambar 1</h5>
                                            <img src="{{asset('asset_admin')}}/images/slider/img-slide-2.jpg" height="80" width="120" alt=""></p>
                                            <a href="#!" class="btn  btn-primary">Edit</a>
                                           </div>
                                           <div class="col-md-4">
                                            <h5 class="card-title">Gambar 2</h5>
                                            <img src="{{asset('asset_admin')}}/images/slider/img-slide-2.jpg" height="80" width="120" alt=""></p>
                                            <a href="#!" class="btn  btn-primary">Edit</a>
                                           </div>
                                           <div class="col-md-4">
                                            <h5 class="card-title">Gambar 3</h5>
                                            <img src="{{asset('asset_admin')}}/images/slider/img-slide-2.jpg" height="80" width="120" alt=""></p>
                                            <a href="#!" class="btn  btn-primary">Edit</a>
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
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
</div>
@endsection
@section('script')
    <script>
 
     $('#flg').hide();
     $('#lg').click(function(){
       $('#flg').show('slow');
    });

    $.ajaxSetup({
           headers : {
               'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
           }
       })

function data(){
    $.ajax({
        type: "GET",
        url: "/cms/alldata",
        dataType: "JSON",
        success: function (response) {
            $('#namalg').text(response.nama);
            $('#nama').val(response.nama);
            $('#id_lg').val(response.id_lgname);
        }
    });
}
data();

function editlogo(){
    let nama = $('#nama').val();
    let id_lg = $('#id_lg').val();
    $.ajax({
        type: "POST",
        url: "/cms/editlg/"+id_lg,
        data: {nama : nama},
        dataType: "JSON",
        success: function (response) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data Berhasil di EDit',
                showConfirmButton: false,
                timer: 1000
                });
                data();
                $('#flg').hide();
        }
        
    });
}


    </script>
@endsection
 