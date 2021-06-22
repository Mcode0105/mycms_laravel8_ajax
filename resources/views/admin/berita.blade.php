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
                        <li class="breadcrumb-item"><a href="/berita">{{$title}}</a></li>
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
                                   <div class="col mb-3 text-center">
                                    <button id="tberita" type="button" class="btn  btn-primary btn-sm">Tambahkan Berita</button>
                                   </div>
                               </div>
                               {{-- form berita --}}
                               <div class="col-md-12">
                                <form id="fberita" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group fill">
                                        <label for="exampleInputEmail1">Judul</label>
                                        <input type="text" name="judul" class="form-control" id="judul"  placeholder="Judul">
                                    </div>
                                    <div class="form-group  fill">
                                        <label for="inputState">Kontent</label>
                                        <select id="id_konten" name="id_konten" class="form-control">
                                            <option disabled>Pilih Konten</option>
                                            @foreach ($konten as $kn)
                                            <option value="{{$kn->id_konten}}">{{$kn->konten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group fill">
                                        <a id="tag" href="#">Tambahkan Tag </a>  
                                          <br>
                                          <div id="dtag" class="form-check">
                                          @foreach ($tag as $t)    
                                          <input name="id_tag" id="id_tag" class="form-check-input" type="checkbox" value="{{$t->tag}}">
                                          <label class="form-check-label" for="gridCheck">{{$t->tag}}</label><br>
                                          @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group fill">
                                        <label for="exampleInputPassword1">Berita</label>
                                       <textarea name="berita" id="berita"></textarea>
                                    </div>
                                    <div class="form-group fill">
                                        <label for="gambar">Gambar/Foto</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Gambar</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                                <label class="custom-file-label" for="gambar">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button id="tutup" type="button" class="btn  btn-danger">Tutup</button>
                                </form>
                            </div>
                               {{-- end from --}}
                                <div id="dberita" class="row">
                                    <div  class="col-xl-12">
                                            <h5 class="mt-4 text-center">Daftar Berita</h5>
                                            <hr>
                                            <div id="brt" class="card-columns">
                                               
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

    $.ajaxSetup({
           headers : {
               'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
           }
       });
    CKEDITOR.replace( 'berita' );
    $('#fberita').hide();
    $('#dtag').hide();
    $('#tberita').click(function(){
        $('#fberita').slideDown('slow');
        $('#dberita').hide();
    })
    $('#tutup').click(function(){
        $('#fberita').slideUp('slow');
        $('#dberita').show('slow');
    })
    $('#tag').click(function () { 
       $('#dtag').toggle('slow');
    });

// lihat data
    showberita();
    function showberita(){
        let card = '';
        $.ajax({
            type: "GET",
            url: "/berita/showberita",
            dataType: "JSON",
            success: function (response) {
             $.each(response, function (key, val) { 
                card += `<div class="card">
                          <div class="card-body">
                            <img class="img-fluid card-img-top" src="img_berita/${val.gambar}" alt="Card image cap">
                                <h5 class="card-title">${val.judul}</h5>
                                <p class="card-text">${val.konten}, ${val.id_tag}</p>
                                <p class="card-text">add ${val.created_at}|updated ${val.updated_at}</p>
                                <input type="hidden" id="id_berita" value="${val.id_berita}">
                              <div class="text-center">
                             <button id="lihat" type="button" class="btn  btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                             <button id="lihat" onclick= editberita(${val.id_berita}) type="button" class="btn  btn-success btn-sm"><i class="fas fa-edit"></i></button>
                            <button id="btnhapus" onclick= hapusberita(${val.id_berita}) type="button" class="btn  btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
               </div>`;
             });
             $('#brt').html(card);
            }
        });
             
    }
    // submit
    $("#fberita").submit(function(e){
        e.preventDefault();
        let formdata = new FormData(this);
        let berita = $('#berita').val();
        $.ajax({
            type: "POST",
            url: "/berita/tambahberita",
            data: formdata, berita,
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data Berhasil di Tambahkan',
                showConfirmButton: false,
                timer: 1000
                });
                $('#fberita').hide();
                $('#dberita').show();
                showberita();
            }
        });
    });

function hapusberita(id_berita){
    $.ajax({
        type: "GET",
        url: "/berita/hapusberita/"+id_berita,
        dataType: "JSON",
        success: function (response) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data Berhasil di hapus',
                showConfirmButton: false,
                timer: 1000
                });
                showberita();
                
        }
    });
}

function editberita(id_konten){
    $.ajax({
        type: "GET",
        url: "/berita/editberita/"+id_konten,
        dataType: "JSON",
        success: function (response) {
            $('#dberita').slideUp('slow');
            $('#fberita').slideDown('slow');
            $('#dtag').show();
            $('#judul').val(response.judul);
            $('#id_konten').val(response.id_konten);
            $('#id_tag').val(response.id_tag);
            $('#berita').val(response.judul);
            $('#gambar').val(response.gambar);
        }
      
    });
}
 </script>
@endsection
