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
                    <h5>Data Tag</h5>
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
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                               <div class="row">
                                   <div class="col mb-3">
                                    <button id="ttag" type="button" class="btn  btn-primary btn-sm">Tambahkan Tag</button>
                                   </div>
                               </div>
                                
                                    <div class="row" id="ftag">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label" for="Email">Nama Tag</label>
                                                <input type="text" class="form-control" id="tag" name="tag">
                                                <input type="hidden" name="id_tag" id="id_tag">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <button id="tombol" onclick="addtag()" type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i> Simpan</button>
                                                <button  onclick="updatedata()" id="tomboledit" type="submit" class="btn btn-primary"><i class="fas fa-edit mr-2"></i> Edit</button>
                                            </div>
                                        </div>
                                    </div>
                        
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-inverse">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tag</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
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
        $('#tomboledit').hide();
       $("#ftag").hide();
       $("#ttag").click(function(){
           $("#ftag").slideDown('slow');
           $("#tombol").show();
           $('#tomboledit').hide();
       })

       $.ajaxSetup({
           headers : {
               'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
           }
       })
 
       function alldata(){
           $.ajax({
               type: "GET",
               url: "/Tag/alldata",
               dataType: "JSON",
               success: function (response) {
                let data = "";
              $.each(response, function(key,value){
                data = data + "<tr>"
                data = data + "<td>"+value.id_tag+"</td>"
                data = data + "<td>"+value.tag+"</td>"
                data = data + "<td>"
                data = data + " <button type='button' onclick ='editdata("+value.id_tag+")' class='btn  btn-icon btn-primary btn-sm'><i class='fas fa-edit'></i></button>"
                data = data + " <button type='button' onclick ='deletedata("+value.id_tag+")'  class='btn  btn-icon btn-danger btn-sm'><i class='fas fa-trash'></i></button>"
                data = data + "</td>"
                data = data + "</tr>"
              });
              $('tbody').html(data);
               }
           });
       }
alldata();

function addtag(){
    let tag = $('#tag').val();
    $.ajax({
        type: "POST",
        url: "/Tag/adddata",
        data: {tag : tag},
        dataType: "JSON",
        success: function (response) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data Berhasil di tambahkan',
                showConfirmButton: false,
                timer: 1000
                })
                $("#ftag").hide();
        },
        error : function (error){
            Swal.fire({
                icon: 'error',
                text: `${error.responseJSON.errors.tag}`, 
                timer : 1000
            });
        }
    });
    alldata();
}

function deletedata(id_tag){
    $.ajax({
        type: "GET",
        url: "/Tag/hapusdata/"+id_tag,
        dataType: "JSON",
        success: function (response) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data Berhasil di Hapus',
                showConfirmButton: false,
                timer: 1000
                });
        }
    });
    alldata();
}


function editdata(id_tag){
   $.ajax({
       type: "GET",
       url: "/Tag/editdata/"+id_tag,
       dataType: "JSON",
       success: function (response) {
           $('#ftag').slideDown('slow');
           $('#tombol').hide();
           $('#tomboledit').show();
           $('#tag').val(response.tag);
           $('#id_tag').val(response.id_tag);
       }
   });
}

function updatedata(){
    let tag = $('#tag').val();
    let id_tag = $('#id_tag').val();
    $.ajax({
        type: "POST",
        url: "/Tag/updatedata/"+id_tag,
        data: {tag : tag},
        dataType: "JSON",
        success: function (response) {
          
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data Berhasil di Edit',
                showConfirmButton: false,
                timer: 1000
                });
        },
        error : function(error){
            Swal.fire({
                icon: 'error',
                text: `${error.responseJSON.errors.tag}`, 
                timer : 1000
            });
        }
    });
        alldata();
}


    </script>
@endsection
 